<?php
  include("header.php");
?>


<?php
  require_once '../Classes/PHPExcel/IOFactory.php';
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,"atg");

$f=0;
if(isset($_FILES['c_f']) || isset($_FILES['excelfile']))
{
  $allowed = array("xlsx","xls","xlsm");
  $filename = $_FILES['c_f']['name'];
  $filename1 = $_FILES['excelfile']['name'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
  if(!in_array($ext,$allowed) || !in_array($ext1,$allowed)  ) {
     $errormsg = "Please select only excel file";
     $f =1;
  }
}


if($f==0)
{
if(isset($_FILES['c_f']))
{
  $sql = mysqli_query($con,"delete from day_time_classroom");
  $sql = mysqli_query($con,"delete from day_time_course");
  $sql = mysqli_query($con,"delete from slot_course");
  $sql = mysqli_query($con,"delete from course_faculty");
  $excelfile_obj = PHPExcel_IOFactory::load($_FILES['c_f']['tmp_name']);
    $getsheet = $excelfile_obj->getActiveSheet()->toArray(null);
    $total_course_fac=count(array_filter($getsheet[0]));
    $i=0;

    foreach ($getsheet as $key => $value) 
    {
      $sql = mysqli_query($con,"insert into course_faculty values('".$getsheet[$i][0]."', '".$getsheet[$i][1]."')");

      $i++;
    }
}  
  if(isset($_FILES['excelfile']))
  {
   
    $excelfile_obj = PHPExcel_IOFactory::load($_FILES['excelfile']['tmp_name']);
    $getsheet = $excelfile_obj->getActiveSheet()->toArray(null);
    $i=0;
    $total_course=count(array_filter($getsheet[0]));

    while($i<$total_course){
      $a[$i]=array();
      $i++;
    }

    foreach ($getsheet as $key => $value) 
    {
      for($i=0;$i<$total_course;$i++)
      { 
        if($value[$i])
          array_push($a[$i],$value[$i]);
      }
    }

 
    
    $i=0;
    while($i<8){
      $slots[$i]=array();
      $i++;
    }

    for($j=0;$j<$total_course;$j++)
    {
      for($k=0;$k<8;$k++)
      {
        if($slots[$k]==null)
        { 
          array_push($slots[$k], $a[$j][0]);
          break;
        }
        else
        {
          $flag = 0;
          for($l=0;$l<count($slots[$k]);$l++)
          {
            $result = array_intersect($a[$j], $a[array_search($slots[$k][$l], array_column($a, 0))]);
            $get_faculty="select distinct c_facultyid from course_faculty where c_courseid like '".$a[$j][0]."' or c_courseid like '".$slots[$k][$l]."'";
            $res_fac=mysqli_query($con, $get_faculty);
        

            if($result!=null || mysqli_num_rows($res_fac)==1 )
            {
              $flag=1;
              break;
            }
          }

          if($flag==0)
          {
            array_push($slots[$k], $a[$j][0]);
            break;
          }
        }
      }
    }

    for($i=0;$i<count($slots);$i++)
    {
      for($j=0;$j<count($slots[$i]);$j++)
      {
        $ins_slots_course = mysqli_query($con,"insert into slot_course values(".($i+1).",'".$slots[$i][$j]."')");
      }
    }

    for($i=0;$i<8;$i++)
    {

      if($slots[$i]!=null)
      {

      $arr_course = array();
      for($z=0;$z<count($slots[$i]);$z++)
        array_push($arr_course,$slots[$i][$z] );
      $arr_credit = array();
      $arr_class_count = array();
      for($j=0;$j<count($arr_course);$j++)
      {
          $cnt_credit = mysqli_query($con,"select i_coursecredit,i_programid from course where c_courseid like '".$arr_course[$j]."' ");

          
          $credit_fetch = mysqli_fetch_assoc($cnt_credit);
         
          array_push($arr_credit, $credit_fetch['i_coursecredit']);

          $cnt_class = mysqli_query($con,"select count(*) as count_class from program_classroom where i_programid = ".$credit_fetch['i_programid']);


          $sql ="select count(*) as count_class from program_classroom where i_programid = ".$credit_fetch['i_programid'];

          $class_fetch = mysqli_fetch_assoc($cnt_class);
          array_push($arr_class_count, $class_fetch['count_class']);
      }

      $max_credit = max($arr_credit);
      $arr_day = array();
      $day;
      $time;
      for($k=0;$k<$max_credit;$k++)
      {
        while(true)
        {
          $day = (rand()%5)+1;
          if(in_array($day, $arr_day))
            continue;
          for($l=0;$l<5;$l++)
          {
            $tmp_time = (rand()%5)+1;
            $find_slot_query = mysqli_query($con,"select * from day_time_course where i_dayid =".$day." and i_timeid=".$tmp_time." ");
            $find_slot_fetch = mysqli_fetch_assoc($find_slot_query);
            if($find_slot_fetch==null)
            {
              $time = $tmp_time;
              array_push($arr_day, $day);
              break;
            }
          }
          if($time!=null)
            break;
        }
        for($m=0;$m<count($arr_course);$m++)
        {
          $arr_class_room=array();
         
          if($arr_credit[$m]>=1)
          {
            $query_class = mysqli_query($con,"select i_programid from course where c_courseid like '".$arr_course[$m]."' ");
            $prog_fetch = mysqli_fetch_assoc($query_class);

            $query_classroom = mysqli_query($con,"select c_classroomid from program_classroom where i_programid = ".$prog_fetch['i_programid']);
            
            while($class_fetch_all = mysqli_fetch_assoc($query_classroom))
            {
              array_push($arr_class_room, $class_fetch_all['c_classroomid']);
            }
            $flag=false;
            for($n=0;$n<count($arr_class_room);$n++)
            {
              $check_for_class = mysqli_query($con,"select c_courseid from day_time_classroom where i_dayid=".$day." and i_timeid=".$time." and c_classroomid='".$arr_class_room[$n]."' ");
              $fetch_check_for_class = mysqli_fetch_assoc($check_for_class);
              if($fetch_check_for_class==null)
              {
                $ins_day_time_course = mysqli_query($con,"insert into day_time_course values(".$day.",".$time.",'".$arr_course[$m]."')");
                $ins_day_time_classromm = mysqli_query($con,"insert into day_time_classroom values(".$day." ,".$time.",'".$arr_class_room[$n]."','".$arr_course[$m]."')");
                $arr_credit[$m]=$arr_credit[$m]-1;
                $flag=true; 
                break;

              }
            }
            if($flag==false)
            {
              $student_strength=count($a[array_search($arr_course[$m], array_column($a, 0))])-1;
              $find_class_asc = mysqli_query($con,"select c_classroomid,i_classcapacity from classroom where i_classcapacity>=".$student_strength);
              
              $classid = array();
              $class_capacity = array();
              while($fetch_find_class_asc = mysqli_fetch_assoc($find_class_asc))
              {
                array_push($classid, $fetch_find_class_asc['c_classroomid']);
                array_push($class_capacity, $fetch_find_class_asc['i_classcapacity']);
              }
              
              for($o=0;$o<count($classid);$o++)
              {
                $min = min($class_capacity);
                $index = array_search($min, $class_capacity);
                $search_class = mysqli_query($con,"select c_courseid from day_time_classroom where i_dayid=".$day." and i_timeid=".$time." and c_classroomid='".$classid[$index]."' ");
                $fetch_search_class=mysqli_fetch_assoc($search_class);
                if($fetch_search_class==null)
                {
                  $ins_day_time_course = mysqli_query($con,"insert into day_time_course values(".$day.",".$time.",'".$arr_course[$m]."')");
                  $ins_day_time_classromm = mysqli_query($con,"insert into day_time_classroom values(".$day." ,".$time.",'".$classid[$index]."','".$arr_course[$m]."')");
                  $arr_credit[$m]=$arr_credit[$m]-1;
                  break;
                }
                else
                  unset($classid[$index]);
                  unset($class_capacity[$index]);
              }
            }
          }
        }
      }
      }
    }
 
    header("location:lecture.php");
  //------------main issset
}
}
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div>
                  <div class="x_title">
                    <h2>Add Course and Student Details </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" id="excel">
                     
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Course-faculty data : </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <input type="file" name="c_f"  class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Student Data : </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <input type="file" name="excelfile"  class="form-control" required>
                        </div>
                      </div>

                     <?php
                      if(isset($errormsg))
                      { ?>
                         <div class="alert alert-danger alert-dismissible fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error!</strong> <?php echo $errormsg;  ?>
                        </div>
                     <?php }
                     ?>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-6" style="padding-top: 250px;">
                          <button type="submit" class="btn btn-success" style="padding: 10px 30px;" name="time-table">Generate Time-Table</button>
                          <button type="reset" class="btn btn-primary" style="padding: 10px 25px;">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


<?php
  include("footer.php");
?>
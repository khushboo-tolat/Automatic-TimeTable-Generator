<?php
	include("header.php");
?>


<?php
  require_once '../Classes/PHPExcel/IOFactory.php';
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,"atg");

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
        /*    $get_class="select distinct c_classroomid from course_classroom where c_courseid like '".$a[$j][0]."' or c_courseid like '".$slots[$k][$l]."'";
            $res_class=mysqli_query($con, $get_class);*/

            if($result!=null || mysqli_num_rows($res_fac)==1 )//|| mysqli_num_rows($res_class)==1)
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
  
 //-----------------------------------------------------------khyati---------------


 
  for($i=1;$i<=8;$i++){
    $query="select * from slot_course where i_slotid=".$i;
    $result=mysqli_query($con,$query);

    $flag=true;
    while($flag){
      $day=(rand()%5)+1;
      $time=(rand()%5)+1;
     
      $q1="select count(*) as cnt from day_time_course where i_dayid=".$day." and i_timeid=".$time;
      $rescnt=mysqli_query($con,$q1);
      $cnt=mysqli_fetch_assoc($rescnt);

      if($cnt['cnt']>=1){
        continue;
      }
      else{
        while($r=mysqli_fetch_assoc($result)){         
          $getcredit="select i_coursecredit from course where c_courseid like '".$r['c_courseid']."'";
          $getcredit_res=mysqli_query($con,$getcredit);
          $res_getcredit=mysqli_fetch_assoc($getcredit_res);
          $arr_day=[];
          $d=$day;
          $t=$time;
          for($j=1;$j<=$res_getcredit['i_coursecredit'];){
           // echo $j;
             $get_slot=mysqli_query($con,"select i_slotid from slot_course join day_time_course on slot_course.c_courseid=day_time_course.c_courseid and day_time_course.i_dayid=".$d." and day_time_course.i_timeid=".$t);
            $slot_data=mysqli_fetch_assoc($get_slot);
            if($slot_data!=null){
              if(!in_array($d, $arr_day) && $slot_data['i_slotid']==$i){
                $ins="insert into day_time_course values(".$d.",".$t.",'".$r['c_courseid']."')";          
                $ins_res=mysqli_query($con,$ins);
                array_push($arr_day, $d);
                
                $j++;
              }
              else{
                $t=(rand()%5)+1;
              }
            }
            else{
              if(!in_array($d, $arr_day)){
                $ins="insert into day_time_course values(".$d.",".$t.",'".$r['c_courseid']."')";          
                $ins_res=mysqli_query($con,$ins);
                array_push($arr_day, $d);
                $j++;
              }
            }
            $d=(rand()%5)+1;
          }
        }
        $flag=false;
      }
    }
  }


//----------------------------------------new-------------------------------------------------

$qry=mysqli_query($con,"select * from day_time_course");
while($r=mysqli_fetch_assoc($qry))
{
  $prog_qry=mysqli_query($con,"select i_programid from course where c_courseid like '".$r['c_courseid']."'");
  $prog_res=mysqli_fetch_assoc($prog_qry);

  $prog_class=mysqli_query($con,"select c_classroomid from program_classroom where i_programid = ".$prog_res['i_programid']);

  while($res=mysqli_fetch_assoc($prog_class))
  {
    $cdata=mysqli_query($con,"select i_classcapacity from classroom where c_classroomid like '".$res['c_classroomid']."'");
    $capacity=mysqli_fetch_assoc($cdata);
    $student_strength=count($a[array_search($r['c_courseid'], array_column($a, 0))])-1;

    if($student_strength<=$capacity['i_classcapacity'])
    {
      $dtc_qry=mysqli_query($con,"select * from day_time_classroom where i_dayid=".$r['i_dayid']." and i_timeid=".$r['i_timeid']." and c_classroomid='".$res['c_classroomid']."'");
      $cnt_dtc=mysqli_num_rows($dtc_qry);
      if($cnt_dtc==0)
      {
        $ins=mysqli_query($con,"insert into day_time_classroom values(".$r['i_dayid'].",".$r['i_timeid'].",'".$res['c_classroomid']."','".$r['c_courseid']."')");
        break;
      }
    }
  }
}


header("location:lecture.php");
  //------------main issset
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

                     

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-6" style="padding-top: 250px;">
                          <button type="submit" class="btn btn-primary" style="padding: 10px 30px;" name="time-table">Generate Time-Table</button>
                          <button type="reset" class="btn btn-primary" style="padding: 10px 25px;">Reset</button>
                          <button type="submit" class="btn btn-success" style="padding: 10px 25px;">Submit</button>
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
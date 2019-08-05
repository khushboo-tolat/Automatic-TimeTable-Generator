<?php
  include('header.php');
?>       
<?php
   $con=mysqli_connect('localhost','root','') or die("connection not established");
    mysqli_select_db($con,'atg') or die("no db found");
    $sel_course = mysqli_query($con,"select * from course,program where course.i_programid = program.i_programid");
     $id = @$_GET['id'];
    @$action = $_GET['action'];
    if($action=="delete")
    {
      
      $del_course = mysqli_query($con,"delete from course where c_courseid like '".$id."' ");
      if($del_course)
      {
        $msg = "Course Deleted Successfully";
        header("location:course.php");
      }
    }
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Course</h3>
              </div>

              <div class="title_right">
                <div class="col-md-1 col-sm-1 col-xs-12 form-group pull-right top_search">
                   <div class="title_left" style="padding-bottom: 15px;"><a href="add_course.php"><button type="button" class="btn"><i class="fa fa-plus-square" style="font-size: 25px"></i></button></a></div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Course ID</th>
                          <th>Course Name</th>
                          <th>Course Credit</th>
                          <th>Program Name</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while($res = mysqli_fetch_array($sel_course))
                          { ?>
                            <tr>
                              <td><?php echo $res['c_courseid']?></td>
                              <td><?php echo $res['c_coursename']?></td>
                              <td><?php echo $res['i_coursecredit']?></td>
                              <td><?php echo $res['c_programname']?></td>
                              <td style="text-align: center;">
                                <div class="title_left"><a href="update_course.php?action=update&id=<?php echo $res['c_courseid']; ?>"><button type="button" class="btn"><i class="fa fa-edit" style="font-size: 25px"></i></button></a></div>
                              </td>
                              <td style="text-align: center;">
                                <div class="title_left"><a href="course.php?action=delete&id=<?php echo $res['c_courseid']; ?>"><button type="button" class="btn"><i class="fa fa-trash" style="font-size: 25px"></i></button></a></div>
                              </td>
                            </tr>
                          <?php }
                        ?>
                        
                      </tbody> 
                    </table>

                  </div>
                </div>
              </div>  
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php
  include('footer.php');
?>
<?php
	include("header.php");
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'atg');
?>
	 
        
  


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lecture TimeTable</h3>
              </div>

              <div class="title_right">
                <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div style="margin-top: -5px;">
                     <!--<a href="pdf_php.php"><button class="btn" id="cmd" style="background-color: #2A3F54; color: white; border-radius: 10px;"><i class="fa fa-download" style="font-size: 17px; padding-top: 3px;"></i> DOWNLOAD</button></a>-->
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
              <div class="col-md-12">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div id="editor">
                  </div>
                  <div class="x_content">
                  
                  	<!-- Monday -->
                    <?php
                      $mon_qry=mysqli_query($con,"select * from day_time_classroom where i_dayid=1");
                    ?>

                    <table class="table table-bordered" id="content">
                      <thead>
                        <tr>
                          <th colspan="2" style="text-align: center">Time Slot</th>
                          <th colspan="5" style="text-align: center">Monday</th>
                        </tr>
                        <tr>
                        	<th>From</th>
                        	<th>To</th>
                        	<th>Program</th>
                        	<th>Course</th>
                        	<th>Course Name</th>
                        	<th>Faculty</th>
                        	<th>Class</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($mon_cnt=mysqli_fetch_assoc($mon_qry))
                          {
                            $mon_time=mysqli_query($con,"select * from timeslot where i_timeid=".$mon_cnt['i_timeid']);
                            $time=mysqli_fetch_assoc($mon_time);
                            $course_qry=mysqli_query($con,"select * from course where c_courseid like '".$mon_cnt['c_courseid']."'");
                            $course_data=mysqli_fetch_assoc($course_qry);
                            $prog_qry=mysqli_query($con,"select c_programname from program where i_programid=".$course_data['i_programid']);
                            $prog_data=mysqli_fetch_assoc($prog_qry);

                            $fac_qry=mysqli_query($con,"select c_facultyid from course_faculty where c_courseid like '".$course_data['c_courseid']."'");
                            $fac_data=mysqli_fetch_assoc($fac_qry);
                        ?>
                          <tr>
                            <th scope="row"><?=$time['i_timeslot'].":00"?></th>
                            <th scope="row"><?=$time['i_timeslot'].":55"?></th>
                            <td><?=$prog_data['c_programname'];?></td>
                            <td><?=$course_data['c_courseid'];?></td>
                            <td><?=$course_data['c_coursename'];?></td>
                            <td><?=$fac_data['c_facultyid'];?></td>
                            <td><?=$mon_cnt['c_classroomid'];?></td>
                          </tr>
                          <?php
                          }
                        ?>
                      </tbody>
                    </table>

                    <!-- Tuesday -->
                    <?php
                      $mon_qry=mysqli_query($con,"select * from day_time_classroom where i_dayid=2");
                    ?>

                    <table class="table table-bordered" id="content2">
                      <thead>
                        <tr>
                          <th colspan="2" style="text-align: center">Time Slot</th>
                          <th colspan="5" style="text-align: center">Tuesday</th>
                        </tr>
                        <tr>
                          <th>From</th>
                          <th>To</th>
                          <th>Program</th>
                          <th>Course</th>
                          <th>Course Name</th>
                          <th>Faculty</th>
                          <th>Class</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($mon_cnt=mysqli_fetch_assoc($mon_qry))
                          {
                            $mon_time=mysqli_query($con,"select * from timeslot where i_timeid=".$mon_cnt['i_timeid']);
                            $time=mysqli_fetch_assoc($mon_time);
                            $course_qry=mysqli_query($con,"select * from course where c_courseid like '".$mon_cnt['c_courseid']."'");
                            $course_data=mysqli_fetch_assoc($course_qry);
                            $prog_qry=mysqli_query($con,"select c_programname from program where i_programid=".$course_data['i_programid']);
                            $prog_data=mysqli_fetch_assoc($prog_qry);

                            $fac_qry=mysqli_query($con,"select c_facultyid from course_faculty where c_courseid like '".$course_data['c_courseid']."'");
                            $fac_data=mysqli_fetch_assoc($fac_qry);
                        
                        ?>
                          <tr>
                            <th scope="row"><?=$time['i_timeslot'].":00"?></th>
                            <th scope="row"><?=$time['i_timeslot'].":55"?></th>
                            <td><?=$prog_data['c_programname'];?></td>
                            <td><?=$course_data['c_courseid'];?></td>
                            <td><?=$course_data['c_coursename'];?></td>
                            <td><?=$fac_data['c_facultyid'];?></td>
                            <td><?=$mon_cnt['c_classroomid'];?></td>
                          </tr>
                          <?php
                          }
                        ?>
                      </tbody>
                    </table>
                                      <!-- Wednesday -->
                    <?php
                      $mon_qry=mysqli_query($con,"select * from day_time_classroom where i_dayid=3");
                    ?>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" style="text-align: center">Time Slot</th>
                          <th colspan="5" style="text-align: center">Wednesday</th>
                        </tr>
                        <tr>
                          <th>From</th>
                          <th>To</th>
                          <th>Program</th>
                          <th>Course</th>
                          <th>Course Name</th>
                          <th>Faculty</th>
                          <th>Class</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($mon_cnt=mysqli_fetch_assoc($mon_qry))
                          {
                            $mon_time=mysqli_query($con,"select * from timeslot where i_timeid=".$mon_cnt['i_timeid']);
                            $time=mysqli_fetch_assoc($mon_time);
                            $course_qry=mysqli_query($con,"select * from course where c_courseid like '".$mon_cnt['c_courseid']."'");
                            $course_data=mysqli_fetch_assoc($course_qry);
                            $prog_qry=mysqli_query($con,"select c_programname from program where i_programid=".$course_data['i_programid']);
                            $prog_data=mysqli_fetch_assoc($prog_qry);

                            $fac_qry=mysqli_query($con,"select c_facultyid from course_faculty where c_courseid like '".$course_data['c_courseid']."'");
                            $fac_data=mysqli_fetch_assoc($fac_qry);
                           
                        ?>
                          <tr>
                            <th scope="row"><?=$time['i_timeslot'].":00"?></th>
                            <th scope="row"><?=$time['i_timeslot'].":55"?></th>
                            <td><?=$prog_data['c_programname'];?></td>
                            <td><?=$course_data['c_courseid'];?></td>
                            <td><?=$course_data['c_coursename'];?></td>
                            <td><?=$fac_data['c_facultyid'];?></td>
                            <td><?=$mon_cnt['c_classroomid'];?></td>
                          </tr>
                          <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    
                    <?php
                      $mon_qry=mysqli_query($con,"select * from day_time_classroom where i_dayid=4");
                    ?>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" style="text-align: center">Time Slot</th>
                          <th colspan="5" style="text-align: center">Thursday</th>
                        </tr>
                        <tr>
                          <th>From</th>
                          <th>To</th>
                          <th>Program</th>
                          <th>Course</th>
                          <th>Course Name</th>
                          <th>Faculty</th>
                          <th>Class</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($mon_cnt=mysqli_fetch_assoc($mon_qry))
                          {
                            $mon_time=mysqli_query($con,"select * from timeslot where i_timeid=".$mon_cnt['i_timeid']);
                            $time=mysqli_fetch_assoc($mon_time);
                            $course_qry=mysqli_query($con,"select * from course where c_courseid like '".$mon_cnt['c_courseid']."'");
                            $course_data=mysqli_fetch_assoc($course_qry);
                            $prog_qry=mysqli_query($con,"select c_programname from program where i_programid=".$course_data['i_programid']);
                            $prog_data=mysqli_fetch_assoc($prog_qry);

                            $fac_qry=mysqli_query($con,"select c_facultyid from course_faculty where c_courseid like '".$course_data['c_courseid']."'");
                            $fac_data=mysqli_fetch_assoc($fac_qry);
                    
                        ?>
                          <tr>
                            <th scope="row"><?=$time['i_timeslot'].":00"?></th>
                            <th scope="row"><?=$time['i_timeslot'].":55"?></th>
                            <td><?=$prog_data['c_programname'];?></td>
                            <td><?=$course_data['c_courseid'];?></td>
                            <td><?=$course_data['c_coursename'];?></td>
                            <td><?=$fac_data['c_facultyid'];?></td>
                            <td><?=$mon_cnt['c_classroomid'];?></td>
                          </tr>
                          <?php
                          }
                        ?>
                      </tbody>
                    </table>

                    <!-- Friday -->

                    <?php
                      $mon_qry=mysqli_query($con,"select * from day_time_classroom where i_dayid=5");
                    ?>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" style="text-align: center">Time Slot</th>
                          <th colspan="5" style="text-align: center">Friday</th>
                        </tr>
                        <tr>
                          <th>From</th>
                          <th>To</th>
                          <th>Program</th>
                          <th>Course</th>
                          <th>Course Name</th>
                          <th>Faculty</th>
                          <th>Class</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($mon_cnt=mysqli_fetch_assoc($mon_qry))
                          {
                            $mon_time=mysqli_query($con,"select * from timeslot where i_timeid=".$mon_cnt['i_timeid']);
                            $time=mysqli_fetch_assoc($mon_time);
                            $course_qry=mysqli_query($con,"select * from course where c_courseid like '".$mon_cnt['c_courseid']."'");
                            $course_data=mysqli_fetch_assoc($course_qry);
                            $prog_qry=mysqli_query($con,"select c_programname from program where i_programid=".$course_data['i_programid']);
                            $prog_data=mysqli_fetch_assoc($prog_qry);

                            $fac_qry=mysqli_query($con,"select c_facultyid from course_faculty where c_courseid like '".$course_data['c_courseid']."'");
                            $fac_data=mysqli_fetch_assoc($fac_qry);
                    
                        ?>
                          <tr>
                            <th scope="row"><?=$time['i_timeslot'].":00"?></th>
                            <th scope="row"><?=$time['i_timeslot'].":55"?></th>
                            <td><?=$prog_data['c_programname'];?></td>
                            <td><?=$course_data['c_courseid'];?></td>
                            <td><?=$course_data['c_coursename'];?></td>
                            <td><?=$fac_data['c_facultyid'];?></td>
                            <td><?=$mon_cnt['c_classroomid'];?></td>
                          </tr>
                          <?php
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
              </div>

              <div class="clearfix"></div>

            </div>
          </div>
        </div>
        
<?php
	include("footer.php");
?>
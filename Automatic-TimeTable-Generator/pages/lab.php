<?php
	include("header.php");
?>
	
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lab TimeTable</h3>
              </div>

              <div class="title_right">
                <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div style="margin-top: -5px;">
                    <a href=""><button class="btn" style="background-color: #2A3F54; color: white; border-radius: 10px;"><i class="fa fa-download" style="font-size: 17px; padding-top: 3px;"></i> DOWNLOAD</button></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
              <div class="col-md-12">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" style="text-align: center">Time Slot</th>
                          <th rowspan="2" style="text-align: center">Monday</th>
                          <th rowspan="2" style="text-align: center">Tuesday</th>
                          <th rowspan="2" style="text-align: center">Wednesday</th>
                          <th rowspan="2" style="text-align: center">Thursday</th>
                          <th rowspan="2" style="text-align: center">Friday</th>
                          <th rowspan="2" style="text-align: center">Lab</th>
                          <th rowspan="2" style="text-align: center">Course</th>
                          <th rowspan="2" style="text-align: center">Faculty</th>
                        </tr>
                        <tr>
                        	<th>From</th>
                        	<th>To</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">00:00</th>
                          <th scope="row">00:00</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>

              <div class="clearfix"></div>

            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
	include("footer.php");
?>
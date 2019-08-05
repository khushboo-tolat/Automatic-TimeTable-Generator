<?php
	include("header.php");
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
                    <h2>Add Lab Details </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select File : </label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <input type="file" name="excelfile"  class="form-control">
                        </div>
                      </div>

                     

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-6" style="padding-top: 250px;">
                          <button type="submit" class="btn btn-primary" style="padding: 10px 30px;" name="time-table">Generate Lab Time-Table</button>
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
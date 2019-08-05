<?php
	include("header.php");
?>

<?php
  require_once '../Classes/PHPExcel/IOFactory.php';
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,"atg");
  
  if(isset($_FILES['excelfile']))
  {
    
    $excelfile_obj = PHPExcel_IOFactory::load($_FILES['excelfile']['tmp_name']);
    $getsheet = $excelfile_obj->getActiveSheet()->toArray(null);
    $i=0;
    $total_course_fac=count(array_filter($getsheet[0]));
    $i=0;
    foreach ($getsheet as $key => $value) 
    {
      $sql = mysqli_query($con,"insert into course_faculty values('".$getsheet[$i][0]."', '".$getsheet[$i][1]."')");
      $i++;
    }
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
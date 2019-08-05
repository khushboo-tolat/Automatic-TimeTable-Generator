<?php
    include('header.php');
?>
<?php
  $con=mysqli_connect('localhost','root','') or die("connection not established");
  mysqli_select_db($con,'atg') or die("no db found");
  $action = $_GET['action'];
  if($action=="update")
  {
    $id = $_GET['id'];
    $sel_rec = mysqli_query($con,"select * from faculty where c_facultyid = '".$id."' ");
    $res = mysqli_fetch_array($sel_rec);
  }
  if(isset($_POST['update']))
  {
    $fid = $_POST['fid'];
    $fname = $_POST['fname'];
   /* $f_type = $_POST['f_type'];
    if($f_type=="Visiting")
      $f = 0;
    else
      $f=1;*/
    $update_fac = mysqli_query($con,"update faculty set c_facultyid='".$fid."' ,c_facultyname='".$fname."' where c_facultyid='".$id."' ");
    if($update_fac)
    {
      $msg ="Faculty Updated Successfully";
      header("location:faculty.php");
    }
  }
?>
  


        <!-- page content -->
        <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Faculty</h2>
                  <div class="clearfix"></div>
                  </div>
        <div class="col-md-12 col-xs-12">
            <div class="x_content">
            <br />
            <script type="text/javascript">
              function validate()
              {
                var id=document.getElementById("fid").value;
                var name=document.getElementById("fname").value;
                var patt1=/^[A-Z]{2,3}$/;
                var flag=true;
                var msg="";
                var result1=id.match(patt1);
                if(result1==null)
                {
                  msg=msg+"\nEnter valid Faculty ID";
                  flag=false;
                }
                patt1=/^[a-zA-Z ]+$/;
                result1=name.match(patt1)
                if(result1==null)
                {
                  msg=msg+"\nEnter valid Faculty Name";
                  flag=false;
                }
                if(!flag)
                {
                  alert(msg);
                  return false;
                }
                return true;
              }
            </script>
                <form class="form-horizontal form-label-left" method="post" action="" onsubmit="return validate();">
                  <?php if(isset($msg)){ ?>
                  <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo $msg; ?>
                  </div>
                  <?php } ?>
                    <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Update Faculty ID :</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Update Faculty ID" name="fid" value = "<?php if(isset($res['c_facultyid'])) echo $res['c_facultyid'];?>" required id="fid">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Update Faculty Name :</label>
                        <div class="col-md-6 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Update Faculty Name" name="fname" value = "<?php if(isset($res['c_facultyname'])) echo $res['c_facultyname'];?>" required id="fname">
                        </div>
                      </div>
                      <!--<div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Update Faculty Type :</label>
                          <div class="radio">
                                <label>

                                  <input type="radio" class="flat" name="f_type" <?php if(isset($res['b_facultytype']) && $res['b_facultytype']==1) { ?> checked <?php } ?> value="Permanent"> Permanent
                                </label>
                                <label>
                                  <input type="radio" class="flat" name="f_type"  <?php if(isset($res['b_facultytype']) && $res['b_facultytype']==0) { ?> checked <?php } ?> value="Visiting"> Visiting
                                </label>
                              </div>
                       </div>-->
                   <br><br>
                   <div class="form-group">
                        <div class="form-group">
                          <div class="col-md-4 col-md-offset-8" style="padding-top: 270px;">
                          <a href="faculty.php"><button type="button" class="btn btn-primary">Cancel</button></a>
                          <button type="submit" class="btn btn-success" name="update">Upadate</button>
                          </div>
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
    include('footer.php');
?>
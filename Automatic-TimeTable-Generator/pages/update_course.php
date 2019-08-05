<?php
include('header.php');
?>
<?php
  $con=mysqli_connect('localhost','root','') or die("connection not established");
  mysqli_select_db($con,'atg') or die("no db found");
  $action = @$_GET['action'];
  if($action=="update")
  {
    $id = $_GET['id'];
    $sel_rec = mysqli_query($con,"select * from course where c_courseid = '".$id."' ");
    $res = mysqli_fetch_array($sel_rec);
  }
  if(isset($_POST['update']))
  {
    $cid = $_POST['cid'];
    $cnm = $_POST['cname'];
    $cc = $_POST['ccredit'];
    $pid = $_POST['pname'];
    $update_course = mysqli_query($con,"update course set c_courseid='".$cid."' ,c_coursename='".$cnm."', i_coursecredit=".$cc.", i_programid=".$pid." where c_courseid='".$id."' ");
    if($update_course)
    {
      $msg ="Faculty Updated Successfully";
      header("location:course.php");
    }
  }
?>

<!-- page content -->
<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Update Course</h2>
<div class="clearfix"></div>
</div>
<div class="col-md-12">
<div class="x_content">
<br />
<script type="text/javascript">
  function validate()
  {
    var id=document.getElementById("cid").value;
    var name=document.getElementById("cname").value;
    var credit=document.getElementById("ccredit").value;
    var pid=document.getElementById("cpid").value;
    var patt1=/^[A-Z]{2}[0-9]{3}$/;
    var flag=true;
    var msg="";
    var result1=id.match(patt1);
    if(result1==null)
    {
      msg=msg+"\nEnter valid Course ID";
      flag=false;
    }
    patt1=/^[a-zA-Z ]+$/;
    result1=name.match(patt1)
    if(result1==null)
    {
      msg=msg+"\nEnter valid Course Name";
      flag=false;
    }
    patt1=/^[0-9][.]*[0-9]*$/;
    result1=credit.match(patt1)
    if(result1==null)
    {
      msg=msg+"\nEnter valid Course Credit";
      flag=false;
    }
    patt1=/^Choose Program$/;
    result1=pid.match(patt1)
    if(result1!=null)
    {
      msg=msg+"\nPlease Select a Program";
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
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Update Course ID :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<input type="text" class="form-control" placeholder="Update Course ID" name="cid" value="<?php if(isset($res['c_courseid'])) echo $res['c_courseid']; ?>" id="cid" required>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Update Course Name :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<input type="text" class="form-control" placeholder="Update Course Name" name="cname"  value="<?php if(isset($res['c_coursename'])) echo $res['c_coursename']; ?>" id="cname" required>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Update Course Credit :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<input type="text" class="form-control" placeholder="Update Course Credit" name="ccredit"  value="<?php if(isset($res['i_coursecredit'])) echo $res['i_coursecredit']; ?>" id="ccredit" required>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Update Program Name :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<select class="form-control" name="pname" required id="cpid">
<option>Choose Program</option>
<?php
  $get_prog = mysqli_query($con,"select * from program");
  while($res = mysqli_fetch_array($get_prog))
  { ?>
    <option value="<?php echo $res['i_programid']; ?>"><?php echo $res['c_programname'];?></option>
  <?php }
?>
</select>
</div>
</div>
<!--<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Update Course Type :</label>
<div class="radio">
<label>
<input type="radio" class="flat" name="radio_type"> Core
</label>
<label>
<input type="radio" class="flat" name="radio_type"> Elective
</label>
</div>
</div>-->
<br><br>
<div class="form-group">
<div class="col-md-4 col-md-offset-8" style="padding-top: 200px;">
<a href="course.php"><button type="button" class="btn btn-primary">Cancel</button></a>
<button type="submit" class="btn btn-success" name="update">Update</button>
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
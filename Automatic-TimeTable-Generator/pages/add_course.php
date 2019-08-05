<?php
include('header.php');
	$con=mysqli_connect('localhost','root','') or die("connection not established");	
	mysqli_select_db($con,'atg') or die("no db found");
?>
<?php
	if(isset($_POST['add']))
	{
		$cid = $_POST['cid'];
		$cnm = $_POST['cname'];
		$cc = $_POST['ccredit'];
		$pid = $_POST['pname'];
		$add_course = mysqli_query($con,"insert into course values('".$cid."' , '".$cnm."' , '".$cc."' , '".$pid."')");
		if($add_course)
		{
			$msg ="Course Added Successfully";
			header("location:course.php");
		}
	}
?>
<!-- page content -->
<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Add Course</h2>
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
<form class="form-horizontal form-label-left" action="" method="post" onsubmit="return validate();">
	<?php if(isset($msg)){ ?>
	<div class="alert alert-success alert-dismissible">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Success!</strong> <?php echo $msg; ?>
	</div>
	<?php } ?>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Course ID :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<input type="text" class="form-control" placeholder="Enter Course ID" name="cid" required id="cid">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<input type="text" class="form-control" placeholder="Enter Course Name" name="cname" required id="cname">
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Course Credit :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<input type="text" class="form-control" placeholder="Enter Course Credit" name="ccredit" required id="ccredit">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Program Name :</label>
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


<br><br>
<div class="form-group">
<div class="col-md-4 col-md-offset-8" style="padding-top: 200px;">
<a href="course.php"><button type="button" class="btn btn-primary">Cancel</button></a>
<button type="reset" class="btn btn-primary">Reset</button>
<button type="submit" class="btn btn-success" name="add">Add</button>
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
<?php
include('header.php');
?>
<?php
	$con=mysqli_connect('localhost','root','') or die("connection not established");
    mysqli_select_db($con,'atg') or die("no db found");
	$action = @$_GET['action'];
	if($action=="update")
	{
	$id = @$_GET['id'];
	$sel_rec = mysqli_query($con,"select * from program where i_programid = '".$id."' ");
	$res = mysqli_fetch_array($sel_rec);
	}
	if(isset($_POST['update']))
	{
		$pname = $_POST['pname'];
		$update_prog = mysqli_query($con,"update program set c_programname ='".$pname."' where i_programid=".$id." ");
		if($update_prog)
	    {
	      $msg ="Program Updated Successfully";
	      header("location:program.php");
	    }

	}
?>


<!-- page content -->
<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Update Program</h2>
<div class="clearfix"></div>
</div>
<div class="col-md-12">
<div class="x_content">
<br />
<script type="text/javascript">
  function validate()
  {
    var name=document.getElementById("pname").value;
    var patt1=/^[A-Za-z]{1}[A-Za-z. ]+\([0-9][a-z]{2}\)$/;
    var flag=true;
    var msg="";
    var result1=name.match(patt1);
    if(result1==null)
    {
      msg=msg+"\nEnter valid Program Name";
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
<form id="myform" class="form-horizontal form-label-left" method="post" action="" onsubmit="return validate();">
<?php if(isset($msg)){ ?>
	<div class="alert alert-success alert-dismissible">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Success!</strong> <?php echo $msg; ?>
	</div>
<?php } ?>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Program Name :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<input type="text" class="form-control" placeholder="Enter Program Name" name="pname" value="<?php if(isset($res['c_programname'])) echo $res['c_programname']; ?>" required id="pname">
</div>
</div>


<div class="form-group">
<div class="col-md-4 col-md-offset-8" style="padding-top: 400px;">
<a href="program.php"><button type="button" class="btn btn-primary">Cancel</button></a>
<button type="reset" class="btn btn-primary">Reset</button>
<a href=""><button type="submit" class="btn btn-success" name="update">Update</button></a>
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
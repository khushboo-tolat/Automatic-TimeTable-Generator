<?php
include('header.php');
	if(isset($_POST['add']))
	{
		$con=mysqli_connect('localhost','root','') or die("connection not established");
 		mysqli_select_db($con,'atg') or die("no db found");
		$pname= $_POST['pname'];
		$add_prog = mysqli_query($con,"insert into program(c_programname) values('".$pname."')");
		if($add_prog)
		{
			//$msg ="Program Added Successfully";
			header("location:program.php");
		}
	}
?>
<!-- page content -->
<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Add Program</h2>
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

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Program Name :</label>
<div class="col-md-6 col-sm-9 col-xs-12">
<input type="text" class="form-control" placeholder="Enter Program Name" name="pname" required id="pname">
</div>
</div>


<div class="form-group">
<div class="col-md-4 col-md-offset-8" style="padding-top: 400px;">
<a href="program.php"><button type="button" class="btn btn-primary">Cancel</button></a>
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
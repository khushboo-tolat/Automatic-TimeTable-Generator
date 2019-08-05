<?php
  include('header.php');
?>       
<?php
   $con=mysqli_connect('localhost','root','') or die("connection not established");
    mysqli_select_db($con,'atg') or die("no db found");
    $id = @$_GET['id'];
    $sel_fac = mysqli_query($con,"select * from faculty");
    @$action = $_GET['action'];
    if($action=="delete")
    {
      $del_fac = mysqli_query($con,"delete from faculty where c_facultyid='".$id."' ");
      if($del_fac)
      {
        $msg = "Faculty Deleted Successfully";
        header("location:faculty.php");
      }
    }
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Faculty</h3>
              </div>
              <div class="title_right">
                <div class="col-md-1 col-sm-1 col-xs-12 form-group pull-right top_search">
                   <div class="title_left" style="padding-bottom: 15px;"><a href="add_faculty.php"><button type="button" class="btn"><i class="fa fa-plus-square" style="font-size: 25px"></i></button></a></div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <?php if(isset($msg)){ ?>
              <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> <?php echo $msg; ?>
              </div>
              <?php } ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Faculty ID</th>
                          <th>Faculty Name</th>
                          <!--<th>Faculty Type</th>-->
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($res = mysqli_fetch_array($sel_fac))
                          { ?><tr>
                              <td><?php echo $res['c_facultyid'];?></td>
                              <td><?php echo $res['c_facultyname'];?></td>
                             <!-- <td><?php echo $res['b_facultytype'];?></td>-->
                              <td style="text-align: center;">
                                <div class="title_left"><a href="update_faculty.php?action=update&id=<?php echo $res['c_facultyid']; ?>"><button type="button" class="btn"><i class="fa fa-edit" style="font-size: 25px"></i></button></a></div>
                              </td>
                              <td style="text-align: center;">
                                <div class="title_left"><a href="faculty.php?action=delete&id=<?php echo $res['c_facultyid']; ?>"><button type="button" class="btn"><i class="fa fa-trash" style="font-size: 25px"></i></button></a></div>
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
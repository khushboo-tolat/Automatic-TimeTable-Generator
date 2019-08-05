
<?php
  
  // Include autoloader
require_once '../dompdf/autoload.inc.php';

// Reference the Dompdf namespace
use Dompdf\Dompdf;

// Instantiate and use the dompdf class
$dompdf = new Dompdf();

// Load HTML content
$msg="";
$msg.='<html>';
$msg.='<head>
<title>DAIICT | LECTURE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    $msg.='<body style="border:1px solid black">';

  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'atg');

$msg.='<table class="table table-bordered" id="content">
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
                      <tbody>';
                      $mon_qry=mysqli_query($con,"select * from day_time_classroom where i_dayid=1");
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

                       $msg.='<tr><th scope="row">';
                       $msg.='<h6>'. $time['i_timeslot'].":00".'</h6>';
                       $msg.='</th>
                        <th scope="row">';
                        $msg.='<h6>'. $time['i_timeslot'].":55".'</h6>';
                       $msg.='</th>
                            <td>';
                        $msg.='<h6>'. $prog_data['c_programname'] .'</h6></td>
                            <td>';
                        $msg.='<h6>'.$course_data['c_courseid'].'</h6></td>
                            <td>';
                        $msg.='<h6>'.$course_data['c_coursename'].'</h6></td>
                            <td>';
                         $msg.='<h6>'.$fac_data['c_facultyid'].'</h6></td>
                            <td>';
                         $msg.='<h6>'.$mon_cnt['c_classroomid'].'</h6></td>
                            <td></tr>';
                        }
                   $msg.='</tbody>
                    </table>';

$msg.="</body>";
$msg.='</html>';
$dompdf->loadHtml($msg);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$name = "Expense_revenue";
$dompdf->stream($name,array("Attachment"=>0));
?>
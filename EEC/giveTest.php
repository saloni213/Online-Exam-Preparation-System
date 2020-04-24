<?php
session_start();
error_reporting(1);
include("database2.php");
extract($_POST);
extract($_GET);
extract($_SESSION);



if(!isset($_SESSION[login]) || $_SESSION[stu]!='student')
{
	header("location: index.php");
}

if(isset($testid))
{
//$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:giveTest.php");
}
/*if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
}*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="style/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="style/images/favicon.png" />


</head>

<body>
<?php
include("header.php");


$query="select * from question";
//$_SESSION[trueans1]=0;
$rs=mysqli_query($cn,"select * from question where test_id=$tid") or die(mysqli_error());
		if($submit=='Next Question')
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($cn,"insert into useranswer(sess_id, test_id, que_des, true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$ans')") or die(mysqli_error());
				if($ans==$row[3])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
 				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Get Result')
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($cn,"insert into useranswer(sess_id, test_id, que_des,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$ans')") or die(mysqli_error());
				if($ans==$row[3])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
                                echo '<div class="container">
                                    <div class="card mt-5">
                                    <div class="card-header" style="background: #D0D0D0">
                                     <h2 align="center">Result</h2>
                                    </div>
                                    <div class="card-body">';

				//echo "<h1 class=head1> Result</h1>";
 				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr class=tot><td>Total Question :<td> $_SESSION[qn]";
				echo "<tr class=tans><td>True Answer:-<td>$_SESSION[trueans]";
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr class=fans><td>Wrong Answer : <td> ". $w;
                                echo "</table>";
				mysqli_query($cn,"insert into result(login,test_id,score) values('$login',$tid,$_SESSION[trueans])") or die(mysqli_error());
				echo "<br><h1 align=center><a href=review.php> Review Question</a> </h1>";
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
$rs=mysqli_query($cn,"select * from question where test_id=$tid") or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>No Quiz is available Here</h1>";
session_destroy();
echo "Please <a href=Menu.php> Start Again</a>";

exit;
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
?><div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center" style="font-size: 35px; font-style: bold;">Questions</h2>
    </div>
    <div class="card-body">

<?php

echo "<form name=myfm method=post action=giveTest.php class='box'>";

echo "<div align='center'>Time:<span id='count'>10</span></div>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tR><td style='font-size: 20px; font-style: bold;'><span class=style2 id='hello'>Que ".  $n .": $row[2]</style>";
echo "<tr><td class=style8><div class='form-group'>
        <input type=text name='ans' id='hii' class='form-control'></div></td></tr>";

if($_SESSION[qn]<mysqli_num_rows($rs)-1)
{
echo "<tr><td><input type=submit class='btn btn-info' name=submit value='Next Question'></form>";
}
else
{
echo "<tr><td><input type=submit name=submit value='Get Result' class='btn btn-info'></form>";
}
echo "</table></table>";
?>
    
    
    <script type="text/javascript">
        var counter =10;
        
        setInterval(function(){
            counter--;
            
            if(counter>=0){
                id= document.getElementById("count");
                id.innerHTML=counter;
            }
            
            if(counter===0){
              //  id.innerHTML="COMPLETED";
                document.getElementById('hii').style.display="none";
                document.getElementById('hello').innerHTML="TIME IS UP";
                
            }
        },1000);
        
        </script>    

<script src="style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="style/js/off-canvas.js"></script>
  <script src="style/js/hoverable-collapse.js"></script>
  <script src="style/js/template.js"></script>
  
    
</body>
</html>
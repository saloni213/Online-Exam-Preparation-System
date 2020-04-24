<html>  
    
    <head>

        <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: lightblue;
}

li {
  float: right;
}

li a {
  display: block;
  color: darkblue;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: lightblue;
}
</style>

        
    <style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;   
}
-->


            body  {
                 background: url(mark2.jpg);
            }
    
</style>
     
    </head>
<body>
<!--    <ul>
			
	<li>	<a href="signout.php" class="start">SignOut</a></li>
			
        <li>	<a href="index.php" class="start">Home</a></li>
        			
    			
</ul>
    
<table border="0" width="100%" cellspacing="0" cellpadding="0" background="image/blue.jpg">
  <tr>
  
    <td width="10%">
     <img border="0" src="image/blue2.jpg" width="203" height="68" align="right"></td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" background="image/blackbar.jpg">
  <tr>
    <td width="100%" align="right"><img border="0" src="image/blackbar.jpg" width="89" height="15"></td>
  </tr>
  </table>
  <table width="100%">
  <tr>
  <td>
  <?php @$_SESSION['login']; 
  error_reporting(1);
  ?>
  </td>
    <td>
	<?php
	if(isset($_SESSION['login']))
	{
    }
	else
	{
	 	echo "&nbsp;";
	}
	?>
	</td>
	
  </tr>
  
</table>
--></body>
</html>
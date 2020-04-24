<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php


try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=EEC2','root','');
	echo "Connection is established...<br/>";
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}

$sql1= "CREATE TABLE user (
  user_id int(5) NOT NULL auto_increment,
  login varchar(20) NOT NULL unique,
  pass varchar(20) NOT NULL,
  username varchar(30) NOT NULL,
  address varchar(50) default NULL,
  city varchar(15) default NULL,
  phone int(10) NOT NULL,
  email varchar(30) NOT NULL unique,
  isStudent boolean not null,
  isTutor boolean not null,
  PRIMARY KEY  (user_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";

$dbhandler->exec($sql1);


$sql2= "CREATE TABLE topic (
  top_id int(5) NOT NULL auto_increment,
  top_name varchar(25) default NULL,
  top_desc varchar(20000) default NULL,
  PRIMARY KEY  (top_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";


$dbhandler->exec($sql2);

$sql3= "CREATE TABLE category (
  cat_id int(5) NOT NULL auto_increment,
  cat_name varchar(25) default NULL,
  PRIMARY KEY  (cat_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";


$dbhandler->exec($sql3);


 
 $sql4= "CREATE TABLE test (
  test_id int(5) NOT NULL auto_increment,
  test_name varchar(25) default NULL,
  top_id int(5) default NULL,
  cat_id int(5) default NULL,
  PRIMARY KEY  (test_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";

 
 
$dbhandler->exec($sql4);



$sql5 ="CREATE TABLE question (
  que_id int(5) NOT NULL auto_increment,
  test_id int(5) default NULL,
  que_desc varchar(15000) default NULL,
  true_ans varchar(750) default NULL,
  PRIMARY KEY  (que_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;

$dbhandler->exec($sql5);


$sql6 ="CREATE TABLE useranswer (
  sess_id varchar(80) default NULL,
  test_id int(5) default NULL,
  que_des varchar(15000) default NULL,
  true_ans varchar(750) default NULL,
  your_ans varchar(750) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1";

$dbhandler->exec($sql6);


$sql7= "CREATE TABLE result (
  login varchar(20) default NULL,
  test_id int(5) default NULL,
  score int(3) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1";


$dbhandler->exec($sql7);

/*
$sql10="CREATE TABLE feedback (
login varchar(20) default NULL,
info varchar(500) default NULL
)ENGINE=MyISAM DEFAULT CHARSET=latin1";

*/
//$dbhandler->exec($sql10);


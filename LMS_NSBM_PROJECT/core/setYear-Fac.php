<?php
require_once 'db_connect.php';

function gotocourse($fac , $year){
	unset($_SESSION['FAC']);
	unset($_SESSION['YEAR']);
	$_SESSION['FAC'] = $fac;
	$_SESSION['YEAR'] = $year;
	header('location:./page_2.php');
}


function getYear(){
	return $YEAR;
}

function getFac(){
	return $FAC;
}

function getFacName(){
	global $connect;
	$query = $connect->query("SELECT FacName FROM facdetail WHERE FacID = ".$_SESSION['FAC']);
	if($query->num_rows == 1) {
		$resultFacName = $query->fetch_assoc();
		return $resultFacName['FacName'];
	} else {
		return false;
	}
	return ;
	
	$connect->close();
}

function getYearName(){
	global $connect;
	$query = $connect->query("SELECT YearName FROM yeardetails WHERE YearID = ".$_SESSION['YEAR']);
	if($query->num_rows == 1) {
		$resultYearName = $query->fetch_assoc();
		return $resultYearName['YearName'];
	} else {
		return false;
	}
	return ;
	
	$connect->close();
}

?>
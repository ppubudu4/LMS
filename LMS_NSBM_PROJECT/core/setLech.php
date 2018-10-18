<?php 
require_once 'db_connect.php';
include 'setYear-Fac.php';


function setLecth($lech){
	unset($_SESSION['COURSE']);
	$_SESSION['COURSE'] = $lech;
	header('location:./page_3.php');
}

function getCourseName(){
	global $connect;
	$queryC = $connect->query("SELECT CourseName FROM coursedetail WHERE (FacID = ".$_SESSION['FAC']." AND YearID = ".$_SESSION['YEAR'].") AND CourseID = ".$_SESSION['COURSE']);
	if($queryC->num_rows == 1) {
		$resultCourseName = $queryC->fetch_assoc();
		return $resultCourseName['CourseName'];
	} else {
		return false;
	}
	return ;
	
	$connect->close();
}

function setLectureCont(){
	$resultLechArray = null;
	global $connect;
	$queryLech = $connect->query("SELECT * FROM lecturedetail WHERE  (FacID = ".$_SESSION['FAC']." AND  YearID = ".$_SESSION['YEAR'].") AND CourseID = ".$_SESSION['COURSE']);
	if($queryLech->num_rows>0){
		$x=0; 
		while($row = $queryLech->fetch_assoc()){
			$resultLechArray[$x++] = array(array($row['LechID']),array($row['LechName']));
		}
	}
	if($resultLechArray==null){
		return null;
	}else{
		return $resultLechArray;
	}
	$connect->close();
}
?>
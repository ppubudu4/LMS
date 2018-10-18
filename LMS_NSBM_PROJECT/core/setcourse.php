<?php 
require_once 'db_connect.php';
$resultCourse;
function setCourse($yearID , $facID){
	global $connect;
	$query = $connect->query("SELECT * FROM coursedetail WHERE  FacID = ".$facID." AND  YearID = ".$yearID."");
	if($query->num_rows>0){
		$x=0; 
		while($row = $query->fetch_assoc()){
			$resultCoursearray[$x++] = array(array($row['CourseID']),array($row['CourseName'])); // set lessons as array
			
		}
		return $resultCoursearray;
	}else{
		return null;
	}
	
	$connect->close();
}





?>
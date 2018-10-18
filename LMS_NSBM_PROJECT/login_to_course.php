<?php
session_start();

if(isset($_SESSION['id'])){
	header('location:page_1.php');
}





?>
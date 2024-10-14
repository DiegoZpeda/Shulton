<?php

include "db.php";
session_start();
if($_POST)
{
	$name=$_SESSION['correo'];
    $msg=$_POST['msg'];
    
	$sql="INSERT INTO `chat`(`nombre`, `message`) VALUES ('".$name."', '".$msg."')";

	$query = mysqli_query($conexion,$sql);
	if($query)
	{
		header('Location: chatpage_admin.php');
	}
	
	
	}
?>
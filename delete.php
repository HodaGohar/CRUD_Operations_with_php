<?php
include 'db.php';
$id = $_GET['delete'];
$dele="DELETE FROM `tasks` WHERE id='$id'";
mysqli_query($conn ,$dele );
header('location:add_task.php');
mysqli_close($conn);
?>
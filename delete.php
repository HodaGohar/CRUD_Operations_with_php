<?php
include 'db.php';
$id = $_GET['delete'];
$del="DELETE FROM `tasks` WHERE id='$id'";
mysqli_query($conn ,$del );
header('location:add_task.php');
mysqli_close($conn);

?>
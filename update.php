<?php
include'db.php';
$id = $_GET['edit'];
if (isset($_POST['update'])) {
  $title = $_POST['title'];
  $description =$_POST['description'];
  $upd = "UPDATE `tasks` SET title='$title' , description='$description' WHERE id='$id'";
  $result = mysqli_query($conn , $upd );
  if ($result) {
    $message[] = 'task updated successfully.';
  } else {
    $message[] = 'Could not update this task.';
  }
   header('location:add_task.php');
}
?>
<?php 
$read=mysqli_query($conn , "SELECT * FROM `tasks` WHERE id = '$id'");
while ($row =mysqli_fetch_assoc($read)) {
  $title =$row['title'];
  $description =$row['description'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css">
    <link rel="stylesheet" href="list.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="text-capitalize">
<div class="update-con centered d-flex justify-content-between align-items-center">
    <div class="container">
            <div class="title fs-4 fw-medium">Update task</div>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <?php
               if(isset($message)){
               foreach($message as $message){
               echo '<span class="error-msg">' .$message. '</span>';
              }
             }
            ?>
            <div class="user-details d-flex flex-column">
                        <div class="input-box">
                             <span class="details">Task title</span>
                             <input type="text" placeholder="Enter the title of task" id="taskName" value="<?php echo $title ; ?>" name="title" required>
                         </div>
                         <div class="input-box">
                             <span class="details">Description</span>
                             <input type="text" placeholder="Enter Task Description" id="description" value="<?php echo $description;?>" name="description" required>
                         </div>
            </div>
            <div class="button">
                        <input type="submit" class="btn" name="update" value="update task">
                        <a class="d-flex justify-content-center mt-3"href="add_task.php">go back</a>
            </div>
        </form>

        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
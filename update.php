<?php
include'db.php';
$id = $_GET['id_edit'];
if (isset($_POST['update'])) {
  $title = $_POST['title'];
  $description =$_POST['description'];
  $upd = "UPDATE `tasks` SET title='$title' , description='$description' WHERE id='$id'";
  $result = mysqli_query($conn , $upd );
  header('location:index.php');
  mysqli_close($conn);
}
?>
<?php 
$read=mysqli_query($conn , "SELECT * FROM `tasks` WHERE id = '$id'");
while ($row =mysqli_fetch_assoc($read)) {
  $title =$row['title'];
  $description =$row['description'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">
    <title>Document</title>
</head>
<body class=" bg-secondary">
  <div class="container">
    <div class="title" >
       <h3 class="text-center text-white fst-italic mt-3 mb-5"> Edit Task</h3>
    </div>
    <div class="">
     <form method="post" action="" class="mb-5 ps-5 rounded-pill border border-whiteborder border-2" >
      <div class="form-group  d-flex justify-content-center mt-5 mb-4 ">
        <label for="title"class="fs-5 text text-white me-2" >title:</label>
        <input type="text" class="form-control w-75 ms-2 " id="title" placeholder="enter title" name="title" value="<?php echo $title ; ?>" require/>
      </div>
     <div class="form-group d-flex justify-content-center  ">
       <label for="description" class="fs-5 text  text-white me-1 ">Description:</label>
       <input class="form-control w-75 me-5"  name="description" placeholder="enter task" id="description" value="<?php echo $description;?>" require />
     </div>
     <div class="button text-center">
      <button type="submit" name="update" onclick='return confirm("Do you really want to update task")' class=" btn btn-outline-primary my-5  border border-white border border-2 rounded-pill text-white">update</button>
     </div>
     
     </form>
    </div>
   
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
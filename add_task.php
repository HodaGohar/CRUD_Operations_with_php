<?php
@include 'db.php';

if (isset($_POST['add_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (empty($title) || empty($description)) {
        $message[] = 'Please fill out all fields.';
    } else {
        
            $insert = "INSERT INTO tasks(title, description) VALUES('$title','$description')";
            $upload = mysqli_query($conn, $insert);

            if ($upload) {
                $message[] = 'New task added successfully.';
            } else {
                $message[] = 'Could not add this task.';
            }
        }
    }
?>


<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>To Do List</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="list.css">
 </head>
 <body class="add-container p-1 text-capitalize">
     <div class="container mt-4">
             <div class="title fs-4 fw-medium">Add a task to your to-do-list</div>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <?php
                if(isset($message)){
                foreach($message as $message){
                echo '<span class="error-msg">' .$message. '</span>';
               }
              }
             ?>
                 <div class="user-details d-flex justify-content-between flex-wrap">
                         <div class="input-box mb-2">
                             <span class="details">Task Title</span>
                             <input type="text" placeholder="Enter the title of task" id="title" name="title" required>
                         </div>
                         <div class="input-box">
                             <span class="details">Description</span>
                             <input type="text" placeholder="Enter Task Description" id="description" name="description" required>
                         </div>
                 </div>
                 <div class="button my-4">
                         <input type="submit" name="add_task" value="Add a task to your to-do list">
                 </div>
             </form>
         </div>
         <?php
         $select = mysqli_query($conn, "SELECT * FROM tasks");
          ?>
              <div class="display my-5 d-flex justify-content-center">
                 <table class="display-table">
                     <thead>
                         <tr>
                             <th>name</th>
                             <th>description</th>
                             <th>update date</th>
                             <th>action</th>
                         </tr>
                     </thead>
                     <?php
                     while($row = mysqli_fetch_assoc($select)){
                         ?>
                        <tr>
                           <td><?php echo $row['title'];?></td>
                           <td><?php echo $row['description'];?></td>
                           <td><?php echo $row['updated_at'];?></td>
                           <td>
                               <a href="read.php?read=<?php echo $row['id'];?>" class="btn"><i class="fa-solid fa-eye"></i>   view</a>
                               <a href="update.php?edit=<?php echo $row['id'];?>" class="btn mt-0"> <i class="fas fa-edit"></i>  edit</a>
                               <a href="delete.php?delete=<?php echo $row['id'];?>" class="btn mb-0"> <i class="fas fa-trash"></i>  delete</a>
                           </td>
                       </tr>
                       <?php };?>
               </table>
              </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
 </body>
</html>
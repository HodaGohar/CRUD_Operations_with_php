<?php
include('db.php'); 

$id =  $_GET['read'];
$row = null;

if ($id > 0) {
    $query = "SELECT * FROM tasks WHERE id = $id";


    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Failed: ' . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
</head>
<body>
    <div class="container">
        <h1>Tasks</h1>
        <div class="task-list">
            <?php if ($row): ?>
                <div class="task-item">
                    <div class="task-header">
                        <span class="task-id"><?php echo $row['id']; ?></span>
                        <span class="task-title"><?php echo $row['title']; ?></span>
                    </div>
                    <div class="task-body">
                        <p class="task-description"><?php echo $row['description']; ?></p>
                        <p class="task-dates">
                            Created At: <span class="task-createdAt"><?php echo $row['createdAt']; ?></span><br>
                            Updated At: <span class="task-updatedAt"><?php echo $row['updatedAt']; ?></span>
                        </p>
                    </div>
                </div>
            <?php else: ?>
                <p>No task found with the given ID.</p>
            <?php endif; ?>
        </div>
    </div>
    <style>
    
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}
.task-list {
    list-style: none;
    padding: 0;
}

.task-item {
    background: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 10px;
    padding: 15px;
    border: 2px solid rgb(21, 56, 92);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.task-header {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 10px;
   background: linear-gradient(135deg,#fff,rgb(5, 37, 72));
}

.task-id {
    font-weight: bold;
    color: #555;
}

.task-title {
    font-size: 1.2em;
    font-weight: bold;
    color: #fff;
}

.task-body {
    font-size: 1.2em;
    color: #555;
}

.task-description {
    margin-bottom: 10px;
}

.task-dates {
    font-size: 0.7em;
    color: #999;
}

.task-createdAt, .task-updatedAt {
    font-weight: bold;
    color: #333;
}

@media (max-width: 600px) {
    .task-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .task-title {
        margin-top: 10px;
    }
}

        </style>
</body>
 <?php 
mysqli_close($conn);
?>  
</html>

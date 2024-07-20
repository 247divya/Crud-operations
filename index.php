<?php
  include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
   <style>
    th{
        font-size: 20px;
    }
   </style>
</head>

<body>
<nav class="navbar navbar-dark bg-primary justify-content-center" >
  <span class="navbar-brand mb-0 h1"><h2>USER DETAILS</span></h2>
</nav>
    <div class="container">
        <button1 class="btn btn-info my-5 btn-lg float-right"><a href="user.php" class="text-light">Add User</a> </button>
    </div>
    
    <table  class="table table-striped">
        <thead>
        <tr>
        <th scope="col">id</th>
        <th  scope="col">Name</th>
        <th  scope="col">Email</th>
        <th  scope="col">Mobile</th> 
        <th  scope="col">password</th>
        <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php 
    $sql = "SELECT * FROM `crud`";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = isset($row['password']) ? $row['password'] : 'Not available';
    
            echo '<tr>
               <th scope="row">'.$id.'</th>
               <td>'.$name.'</td>
               <td>'.$email.'</td>
               <td>'.$mobile.'</td>
               <td>'.$password.'</td>
                <td>
                    <button class="btn btn-success">
                        <a href="update.php?updateid='.$id.'" class="text-light" <?php echo "update successfully"?>Update</a>
                    </button>
                    <button class="btn btn-danger">
                        <a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a>
                    </button>
                </td>
               </tr>';
        }
    }
    ?>
    
    

    
        </tbody>

    </table>
    
    
</body>
</html>
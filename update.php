<?php
include 'connection.php';
$message = '';
$messageType = '';
$id=$_GET['updateid'];
$sql="SELECT * FROM `crud` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];

if(isset($_POST['submit'])) {
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

$sql="update crud set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";

$result=mysqli_query($conn,$sql);

if ($result) {
    $message = "Data Updated successfully";
    $messageType = "success";
} else {
    $message = "Error: " . mysqli_error($con);
    $messageType = "error";
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            crud operations
        </title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript" src="update validate.js"></script>
  
    <style>
            label.error{
                font-weight:700;
                display: block;
                color: #f00;
                font-size:14px;
            }
            
        .required::after {
            content: " *";
            color: red;
            
        }
        label{
            font-size: 20px;
        }
    
        </style> 
    </head>
    <body>
    <nav class="navbar navbar-light bg-light justify-content-center" >
  <span class="navbar-brand mb-0 h1"><h2>Update Page</span></h2>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <div class="container my-5">
        <form method="post" action="" id="validate">
            <div class="from-group">
            <label class="required" >Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value="<?php echo $name;?>">
        </div><br>
        <div class="from-group">
            <label class="required" >Email</label>
            <input type="text" class="form-control" placeholder="Enter your Email" name="email"autocomplete="off" value="<?php echo $email;?>">
        </div><br>
        <div class="from-group">
            <label class="required" >Mobile</label>
            <input type="tel" class="form-control" placeholder="Enter your mobile" name="mobile" autocomplete="off" value="<?php echo $mobile;?>">
        </div><br>
        <div class="from-group">
            <label class="required" >password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" value="<?php echo $password;?>">
        </div><br>
        
        <button type="submit" class="btn btn-primary" name="submit">update</button>
        
        </form>
    </div>
    <?php if ($message): ?>
        <script>
            Swal.fire({
                icon: '<?php echo $messageType; ?>',
                title: '<?php echo $message; ?>'
            }).then(function() {
                <?php if ($messageType === 'success'): ?>
                    window.location.href = 'index.php';
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>
</body>

</html>

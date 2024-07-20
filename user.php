<?php
include 'connection.php';
$message = '';
$messageType = '';


if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

   

    $sql = "INSERT INTO crud (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $message = "Data inserted successfully";
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript" src="validation.js"></script>
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
  <span class="navbar-brand mb-0 h1"><h2>Insert  Page</span></h2>
</nav>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
   
    <div class="container my-5">
        
        <form method="post" action="" id="formvalidation">
            <div class="from-group">
            <label class="required">Name</label>
            <input type="text" class="form-control" required placeholder="Enter your name"  name="name" autocomplete="off">
        </div><br>
        <div class="from-group">
            <label class="required">Email</label>
            <input type="email" class="form-control" required placeholder="Enter your Email" name="email"autocomplete="off">
        </div><br>
        <div class="from-group">
            <label class="required">Mobile</label>
            <input type="tel" class="form-control"  required placeholder="Enter your mobile" name="mobile" autocomplete="off">
        </div><br>
        <div class="from-group">
            <label class="required">password</label>
            <input type="password" class="form-control" required placeholder="Enter your password"  name="password" autocomplete="off">
        </div><br>
        
        <button type="submit" class="btn btn-primary" name="submit">submit</button>
        
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
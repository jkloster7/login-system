<?php include('includes/header.php'); ?>
<?php include('classes/User.php'); ?>
<?php session_start(); ?>

<?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailCheck = "SELECT * FROM users WHERE email = '$email' AND password = $password";
    $emailResult = $mysqli->query($emailCheck);

    if(!empty($emailResult) && $emailResult->num_rows > 0){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("Location: admin/index.php");
    } else {
        echo "<div class='container'>
                <div class='alert alert-danger mt-5'>
                    Email or password are invalid. Please login.
                </div>
              </div>";
    }
    
}

?>

<div class="container">
    <h1 class="text-center">Login</h1>
    <form method="POST" action="">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
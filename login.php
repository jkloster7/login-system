<?php include('includes/header.php'); ?>
<?php session_start(); ?>

<?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailCheck = "SELECT * FROM users WHERE email = '$email'";
    $result = $mysqli->query($emailCheck);

    if(!empty($result) && $result->num_rows > 0){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("Location: admin/index.php");
    } else {
        echo "<div class='container'>
                <div class='alert alert-danger mt-5'>
                    That email does not exist in our database. Please register for an account
                </div>
              </div>";
    }

    $query = "SELECT * FROM users WHERE email = $email AND password = $password";
    $result = $mysqli->query($query);
    
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
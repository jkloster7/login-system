<?php include('includes/header.php'); ?>
<?php include('classes/User.php'); ?>
<?php session_start(); ?>

<?php

$user = new User();
$user->login();

?>
<div class="wrapper">
    <div class="container">
        <div class="login-container">
            <h2 class="text-center secondary-color pt-4">Please Login</h2>
            <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-custom">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php include('includes/header.php'); ?>
<?php include('classes/User.php'); ?>
<?php session_start(); ?>

<?php
    
    $user = new User();
    $user->register();

?>

<div class="container">
    <h1 class="text-center">Register</h1>
    <form method="POST" action="">
    <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
        <?php 
            if(empty($firstName)){
                echo $user->empty_firstName;
            };
        ?>
    </div>
    <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
        <?php 
            if(empty($lastName)){
                echo $user->empty_lastName;
            };
        ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
        <?php 
            if(empty($email)){
                echo $user->empty_email;
            };
        ?>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <?php 
            if(empty($password)){
                echo $user->empty_password;
            };
        ?>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
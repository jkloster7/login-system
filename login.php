<?php include('includes/header.php'); ?>

<?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $email . ' ' . $password;
}

?>

<div class="container">
    <h1 class="text-center">Login</h1>
    <form method="POST" action="">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
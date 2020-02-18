<?php include('includes/header.php'); ?>
<?php include('classes/User.php'); ?>

<?php
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $empty_firstName = '';
    $empty_lastName = '';
    $empty_email = '';
    $empty_password = '';

        if(isset($_POST['submit']) ){
            if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
                $firstName = $mysqli->real_escape_string(trim($_POST['first_name']));
            } else {
                $empty_firstName = "First name can not be empty you idiot!";
            }
        
            if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
                $lastName = $mysqli->real_escape_string(trim($_POST['last_name']));
            } else {
                $empty_lastName = "Last name can not be empty you idiot!";
            }
        
            if(isset($_POST['email']) && !empty($_POST['email'])){
                $email = $mysqli->real_escape_string(trim($_POST['email']));
            } else {
                $empty_email = "Email can not be empty you idiot!";
            }
        
            if(isset($_POST['password']) && !empty($_POST['password'])){
                $password = $mysqli->real_escape_string(trim($_POST['password']));
                $password = md5($password);
            } else {
                $empty_password = "Password can not be empty you idiot!";
            }
        
            $emailCheck = "SELECT * FROM users WHERE email = $email";
            $row = $mysqli->query($emailCheck);
            echo $row;
            $rowCount = mysqli_num_rows($row);
            if($rowCount > 0){
                echo "Sorry that email already exists";
            } else {
                $query = "INSERT INTO users (first_name, last_name, email, password, admin, created_at) VALUES ('$firstName', '$lastName', '$email', '$password', 0, NOW())";
                $result = $mysqli->query($query);
            }
          
            if($result > 0){
              echo "User created";
            } else {
              echo "Please try again";
            }
        
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo($email . " is a valid email address");
            } else {
                echo $email . " is not a valid email address";
            }
            
        }
?>

<div class="container">
    <h1 class="text-center">Register</h1>
    <form method="POST" action="">
    <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
        <?php 
            if(empty($firstName)){
                echo $empty_firstName;
            };
        ?>
    </div>
    <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
        <?php 
            if(empty($lastName)){
                echo $empty_lastName;
            };
        ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
        <?php 
            if(empty($email)){
                echo $empty_email;
            };
        ?>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <?php 
            if(empty($password)){
                echo $empty_password;
            };
        ?>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
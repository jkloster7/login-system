<?php include('../includes/admin-header.php'); ?>
<?php include('../classes/User.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1 class="text-center">Admin Panel</h1>
    <p><?php  echo "Hello " . $_SESSION['email']; ?></p>
</body>
</html>

<?php include('../includes/footer.php');
<?php
 
class User {

    public $email;
    public $password;

    public function __construct(){
        
    }

    public function login(){
        global $database;
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $emailCheck = "SELECT * FROM users WHERE email = '$email' AND password = $password";
            $emailResult = $database->connection->query($emailCheck);
        
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
    }

    public function register(){
        
    }
}

?>
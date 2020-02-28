<?php
 
class User {

    public $email;
    public $password;

    public $empty_firstName = '';
    public $empty_lastName = '';
    public $empty_email = '';
    public $empty_password = '';

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
        global $database;
            
        if(isset($_POST['submit']) ){

            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
                $firstName = $database->connection->real_escape_string(trim($_POST['first_name']));
            } else {
                $this->empty_firstName = "First name can not be empty you idiot!";
            }
        
            if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
                $lastName = $database->connection->real_escape_string(trim($_POST['last_name']));
            } else {
                $this->empty_lastName = "Last name can not be empty you idiot!";
            }
        
            if(isset($_POST['email']) && !empty($_POST['email'])){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $email = $database->connection->real_escape_string(trim($_POST['email']));
                }
            } else {
                $this->empty_email = "Email can not be empty you idiot!";
            }
        
            if(isset($_POST['password']) && !empty($_POST['password'])){
                $password = $database->connection->real_escape_string(trim($_POST['password']));
                $password = md5($password);
            } else {
                $this->empty_password = "Password can not be empty you idiot!";
            }

            if($this->empty_firstName || $this->empty_lastName || $this->empty_email || $this->empty_password){
                die("All fields are required. Please fill out all fields.");
            }
        
            $emailCheck = "SELECT * FROM users WHERE email = '$email'";
            $emailResult = $database->connection->query($emailCheck);
            
            if(!empty($emailResult) && $emailResult->num_rows === 0){
                $query = "INSERT INTO users (first_name, last_name, email, password, admin, created_at) VALUES ('$firstName', '$lastName', '$email', '$password', 0, NOW())";
                $result = $database->connection->query($query);
                if(!empty($result) || $result->num_rows > 0){
                    echo "<div class='container'><div class='alert alert-warning mt-2'>User created</div></div>";
                } else {
                    echo "<div class='container'><div class='alert alert-danger mt-2'>We were not able to complete this request. Please try again</div></div>";
                }
            } else {
                echo "<div class='container'>
                        <div class='alert alert-danger mt-5'>
                            This email already exists in our database.
                        </div>
                    </div>";
            }

        }
    }
}

?>
<?php
include 'partials/db.php';
$table="users";
$alert=false;
$ealert=false;
if(isset($_POST['submit'])){
    $email=$mysqli -> real_escape_string($_POST['email']);
    $password=$mysqli -> real_escape_string($_POST['password']);
    $exist=$mysqli->query("SELECT * FROM $table WHERE `email`='$email'");
    if(mysqli_num_rows($exist)==1){
        $pass_v=mysqli_fetch_assoc($exist);
        $verify=password_verify($password,$pass_v['password']);
        if($verify){
            $alert=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['email']=$email;
            $_SESSION['name']=$pass_v['name'];
            $_SESSION['user_id']=$pass_v['id'];
        }
        else{
            $ealert="Wrong Credentials , Try again";
        }
    }
    else{
       $ealert="Account Doesn't Exist, Sign Up";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women Empowerment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include("./partials/header.php"); ?> 
<?php if($alert) {
    
    echo ' <div class="alert alert-success 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;;border-radius:0px;">

        <strong>Success!</strong> You are now logged in! 
        <button type="button" class="close"
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button> 
    </div> ';
     echo '<meta http-equiv="refresh" content="2;url=index.php" />';
     
   }
   if($ealert) {
    
    echo ' <div class="alert alert-danger 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;border-radius:0px;"> 
       <strong>Error!</strong> '. $ealert.'<button type="button" class="close" 
       data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">×</span> 
       </button> 
        </div> '; 
   }


?>

<div class="form">
    <form method="POST">
        <h4>Login Here!</h4><br>
        <input type="email" placeholder="Email " name="email" class="login" required><br><br>
        <input type="password" placeholder="Password" name="password" class="login" required><br><br>
        <button type="submit "  name="submit" class="btn btn-primary">Login</button><br><br>
        <p>Or</p><br>
        <a href="sign-up.php">Create New Account</a>
   </form>
</div>
<?php include("./partials/footer.php"); ?> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
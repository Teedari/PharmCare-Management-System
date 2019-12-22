<?php include("./admin/slice/function.php"); ?>
<?php include("./admin/slice/db.php"); ?>
<?php

   if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
//    
        global $connection;
    

    $error =[
            'email' => '',
            'password' => ''
        ];
       
        if(empty($email) || empty($password)){
            $error['password'] = 'Provide values for the inputs';
        }
       
        if(!is_emailFound($email) || !is_passwordFound($password)){
            $error['msg'] = "username and password does not exit";
        }
       
                
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){

            login($email,$password);  
        }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="signin">
       
    <form action="" method="post">

   <p class="alert"><?php echo isset($error['msg']) ? $error['msg']: '' ?></p>
        <h1>Login</h1>
     <p class="alert"><?php echo isset($error['password']) ? $error['password']: '' ?></p>
        <input type="email" name="email" placeholder="Enter email" class="txtb">
        <input type="password" name="password" placeholder="Enter password" class="txtb">
        <input type="submit" name="login" value="Login" class="signin-btn">
    </form>
   </div>
       
</body>
</html>
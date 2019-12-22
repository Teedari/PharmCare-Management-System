<?php include("../includes/admin_header.php");?>
<!-- /admin_header -->
  
<!-- /.adminSidebar --> 
<?php
if(isset($_POST['adminAdd'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    adminAdd($email,$password);
}


?>

<?php
$query = "SELECT * FROM users WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_assoc($result)){
    $admin_id = $row['id'];
    $username = $row['username'];
}

?>
<?php
    if(isset($_POST['save_pass'])){
        $admin_id = $_SESSION['admin_id'];
        $email = $_POST['email'];
        $oldpassword = trim($_POST['oldpassword']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $error =[
            'password' => '',
            'oldpassword' => '',
            'password2' => ''
            
        ];
        
        
        if(empty($password)){
            $error['password'] = 'Field is empty';
        }
    
        if(empty($password2)){
            $error['password2'] = 'Field is empty';
        }
        
        if(!validOldPass($oldpassword,$admin_id)){
           $error['oldpassword'] = 'old password incorrect'; 
        }
        
        if(strlen($password) < 8){
            $error['password'] = 'password cannot be less than 10';
        }
        
        if(strlen($password2) < 8){
            $error['password2'] = 'password cannot be less than 10';
        }
        
        if($password !== $password2){
            $error['password2'] = 'password does not match';
        }
        
        foreach($error as $key => $value) {
            if(empty($value)){
                
                unset($error[$key]);
                        }
        }//foreach 
        
        if(empty($error)){
        ValidPassword($email,$password2,$admin_id);
        echo"<script>alert('Password Successfully Updated');</script>";
        }
        
    }
?>
   

<?php include("../includes/admin_sidebar.php"); ?>


        <div class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
            <div class="col-md-6">
       
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Admin</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" role="form" class="form">
                    <div class="form-group">
                      <label for="email" class="form-control-label">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="username@test.com"
                      autocomplete="on" 
                    value="<?php echo $_SESSION['username']?>">
                    </div>
                        <div class="form-group">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" name="oldpassword" class="form-control" required>
                            <p><?php echo isset($error['oldpassword']) ? $error['oldpassword']: '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="newpassword">New Password</label>
                            <input type="password" name="password" class="form-control" required>
                          <p><?php echo isset($error['password']) ? $error['password']: '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" name="password2" class="form-control" required>
                            <p><?php echo isset($error['password2']) ? $error['password2']: '' ?></p>
                        </div>
                        <button type="submit" name="save_pass" class="btn btn-success btn-block md-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
           
        <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                    <h3 class="panel-title">Add Admin</h3>
              </div>
                  <div class="panel-body">
                    <form action="" method="post">
                         <div class="form-group">
                             <label for="email">Email:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" required value="domain@gmail.com">
                              </div>
                         </div>
                         <div class="form-group">
                             <label for="password">Password:</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="1234567890">
                              </div>
                         </div>
                         <input type="submit" name="adminAdd" value="Submit" class="btn btn-primary">
                    </form>
                  </div>
            </div>

        </div>
                
        <!-- out of bound -->
        
        </div>
        </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../data/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../data/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../data/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../data/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="../data/text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../data/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../data/assets/js/demo.js"></script>

</html>

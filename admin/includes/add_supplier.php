<?php
if(isset($_POST['addSupplier'])){
        
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];
 
        global $connection;
        if((!empty($name) || !empty($phone)) || !empty($address)){
            

        $query = "INSERT INTO supplier(name,email,phone,address,notes) VALUES ('{$name}','{$email}','{$phone}','{$address}','{$notes}')";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        if($result){
            
            echo"<div class='alert alert-success'><strong>Successfully Added</strong></div>";
}
            
        }else{
            echo "<div class='alert alert-warning'><strong>Fields cannot be empty!!</strong></div";
        }

}
?>
   

   
   
<ul class="nav nav-tabs">
    <li class="active"><a href="supplier.php?source=add_supplier">Add Supplier</a></li>
    <li><a href="supplier.php">View Supplier</a></li>
</ul>
<div class="row">
    <div class="col-md-8">
        <form action="" method="post">

            <div class="form-group">
                <label for="category">Name</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>

            <div class="form-group">
                <label for="house_type">Email</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
             <label for="name">Phone</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-language"></i></span>
                    <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                </div>
            </div>
            <div class="form-group">
                <label for="batchNo">Address</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-drupal"></i></span>
                    <textarea name="address" id="" cols="30" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-money"></i></span>
                    <textarea name="notes" id="" cols="30" class="form-control"></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" name="addSupplier">
        </form>



    </div>
</div>
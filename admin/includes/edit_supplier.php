<?php
if(isset($_GET['supplier_id'])){
$the_supplier_id = $_GET['supplier_id'];
global $connection;
$query = "SELECT * FROM supplier WHERE id = {$the_supplier_id}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_array($result)){
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];
$notes = $row['notes'];
}
}
?>

<?php
if(isset($_POST['updateSupplier'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$notes = $_POST['notes'];

global $connection;

if(!empty($name) || !empty($email) || !empty($phone) || !empty($address)){


$query = "UPDATE supplier SET name = '{$name}', email = '{$email}', phone = '{$phone}', notes = '{$notes}', address = '{$address}' WHERE id = {$the_supplier_id}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
        if($result){
    echo "<script>alert('Supplier successfully updated')</script>";
}
    }else{
    
    echo "<div class='alert alert-warning'><strong>Fields cannot be empty!!</strong></div";
    }
}






?>

<ul class="nav nav-tabs">
    <li><a href="supplier.php?source=add_supplier">Add Supplier</a></li>
    <li><a href="supplier.php">View Supplier</a></li>
    <li class="active"><a href="supplier.php">Edit Supplier</a></li>
</ul>
<div class="row">
    <div class="col-md-8">
        <form action="" method="post">

            <div class="form-group">
                <label for="category">Name</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name: '' ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="house_type">Email</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email: '' ?>">
                </div>
            </div>
            <div class="form-group">
             <label for="name">Phone</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-language"></i></span>
                    <input type="number" name="phone" class="form-control" placeholder="Enter phone number" value="<?php echo isset($phone) ? $phone: '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="batchNo">Address</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-drupal"></i></span>
                    <textarea name="address" id="" cols="30" class="form-control"><?php echo isset($address) ? $address: '' ?></textarea>
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-note"></i></span>
                    <textarea name="notes" id="" cols="30" class="form-control"><?php echo isset($notes) ? $notes: '' ?></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" name="updateSupplier">
        </form>



    </div>
</div>
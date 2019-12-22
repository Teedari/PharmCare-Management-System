<?php
if(isset($_GET['medicine_id'])){
$the_medicine_id = $_GET['medicine_id'];
global $connection;
$query = "SELECT * FROM medicine WHERE id = {$the_medicine_id}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
while($row = mysqli_fetch_array($result)){
$name = $row['name'];
$buy = $row['buyPrice'];
$sell = $row['sellPrice'];
$batchNo = $row['batchNo'];
$expDate = $row['expDate'];
}
}
?>

<?php
if(isset($_POST['updateMedicine'])){
$category = $_POST['category'];
$shelf = $_POST['shelf'];
$name = $_POST['name'];
$buy = $_POST['buy'];
$sell = $_POST['sell'];
$expDate = $_POST['expDate'];

global $connection;

if(!empty($category) || !empty($shelf) || !empty($name) || !empty($buy) || !empty($sell) || !empty($expDate)){


$query = "UPDATE medicine SET category = '{$category}', shelf = '{$shelf}', name = '{$name}', buyPrice = '{$buy}', sellPrice = '{$sell}', expDate = '{$expDate}' WHERE id = {$the_medicine_id}";
$result = mysqli_query($connection,$query);
confirmQuery($result);
        if($result){
    echo "<script>alert('Medicine successfully updated')</script>";
}
    }else{
    echo "<div class='alert alert-warning'><strong>Fields cannot be empty!!</strong></div";
    }
}






?>

<ul class="nav nav-tabs">
    <li class="active"><a href="medicine.php?source=add_medicine">Add Medicine</a></li>
    <li><a href="medicine.php">View Medicine</a></li>
</ul>
<div class="row">
    <div class="col-md-8">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="category">Category</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                     <select name="category" id="" class="form-control">
                         <option value="">Select category</option>
                         <?php echo category();?>
                     </select>
                </div>
            </div>

            <div class="form-group">
                <label for="house_type">House Type</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <select name="shelf" id="" class="form-control" required>
                        <option value="">Select Shelf</option>
                        <?php echo shelf();?>
                    </select>
                </div>
            </div>
            <div class="form-group">
             <label for="name">Name</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-language"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php echo isset($name) ? $name: '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="batchNo">Batch No</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-drupal"></i></span>
                    <input type="number" class="form-control" name="batchNo" placeholder="Enter batch number" value="<?php echo isset($batchNo) ? $batchNo: '' ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="buy">Buying price</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-money"></i></span>
                    <input id="" type="number" class="form-control" name="buy" placeholder="Enter buying price" value="<?php echo isset($buy) ? $buy: '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="buy">Selling price</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-money"></i></span>
                    <input id="" type="number" class="form-control" name="sell" placeholder="Enter selling price" value="<?php echo isset($sell) ? $sell: '' ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="buy">Expiring Date:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input id="" type="date" class="form-control" name="expDate" placeholder="Expire date" value="<?php echo isset($expDate) ? $expDate: '' ?>">
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" name="updateMedicine">
        </form>



    </div>
</div>
<?php
if(isset($_POST['addMedicine'])){
        
        $category = $_POST['category'];
        $shelf  = $_POST['shelf'];
        $name = $_POST['name'];
        $batchNo = $_POST['batchNo'];
        $buy = $_POST['buy'];
        $sell = $_POST['sell'];
        $expDate = $_POST['expDate'];
 
        global $connection;
        if((!empty($batchNo) || !empty($buy)) || !empty($sell)){
            
            if(!is_batchNoExit($batchNo)){

        $query = "INSERT INTO medicine(name,batchNo,category,shelf,buyPrice,sellPrice,expDate) VALUES ('{$name}',{$batchNo},'{$category}','{$shelf}',{$buy},{$sell},'{$expDate}')";
        $result = mysqli_query($connection,$query);
        confirmQuery($result);
        if($result){
            
            echo"<div class='alert alert-success'><strong>Successfully Added</strong></div>";
} 
                
            }else{
                 echo "<div class='alert alert-warning'><strong>Batch number already exit!!</strong></div";
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
                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label for="batchNo">Batch No</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-drupal"></i></span>
                    <input type="number" class="form-control" name="batchNo" placeholder="Enter batch number">
                </div>
            </div>

            <div class="form-group">
                <label for="buy">Buying price</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-money"></i></span>
                    <input id="" type="number" class="form-control" name="buy" placeholder="Enter buying price">
                </div>
            </div>
            <div class="form-group">
                <label for="buy">Selling price</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-money"></i></span>
                    <input id="" type="number" class="form-control" name="sell" placeholder="Enter selling price">
                </div>
            </div>
            <div class="form-group">
                <label for="expDate">Expiring Date:</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input id="" type="date" class="form-control" name="expDate" placeholder="Expire Date">
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" name="addMedicine">
        </form>



    </div>
</div>
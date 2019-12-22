<?php
if(isset($_GET['purchase_id'])){
$code = $_GET['purchase_id'];
global $connection;
$result = mysqli_query($connection,"SELECT grandTotal FROM purchase WHERE purchaseCode = {$code}");
$row = mysqli_fetch_assoc($result);
 $db_grand = $row['grandTotal'];

}

?>



<!-- check button -->
<?php
if(isset($_POST['check'])){
$code = $_POST['code'];
$category = $_POST['category'];
$supplier = $_POST['supplier'];
$date = $_POST['date'];
}
?>

<?php
if(isset($_POST['check2'])){
$code = $_POST['code'];
$category = $_POST['category'];
$supplier = $_POST['supplier'];
$date = $_POST['date'];
$medicine = $_POST['medicine'];

    if(!empty($category)){
global $connection;
        
    $query = "SELECT * FROM medicine WHERE name = '{$medicine}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $batchNo = $row['batchNo'];
        $buy = $row['buyPrice'];
        $sell = $row['sellPrice'];
        $expDate = $row['expDate'];
        
    }
    $_SESSION['batchNo'] = $batchNo;
    $_SESSION['buy'] = $buy;
    $_SESSION['expDate'] = $expDate;
    $_SESSION['sell'] = $sell;
    }
}
?>
  
<?php
if(isset($_POST['addList'])){
$code = $_POST['code'];
$category = $_POST['category'];
$supplier = $_POST['supplier'];
$date = $_POST['date'];
$medicine = $_POST['medicine'];
$quant = $_POST['quantity'];
$batchNo = $_SESSION['batchNo'];
$expDate = $_SESSION['expDate'];
$buy = $_SESSION['buy'];
$sell = $_SESSION['sell'];
// GET global as table

global $connection;
if((!empty($code) && !empty($quant))){
    
    $buy = $_SESSION['buy'];
//calculate for total amount
    $t_amnt = $buy * $quant;
    
    $query = "INSERT INTO stockList(name,batchNo,purchaseCode,supplier,quantity,amount,sellPrice,buyPrice,expDate) VALUES ('{$medicine}',{$batchNo},{$code},'{$supplier}',{$quant},{$t_amnt},{$sell},{$buy},'{$expDate}')";     
    
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($result){
        
    $_GET['table'] = $code;
    $db_grand = sumProduct($code);
    }
}else{
    echo "FIELDS CANNOT BE EMPTY";
}
}
?>
<?php
if(isset($_POST['updatePurchase'])){
$code = $_POST['code'];
$supplier = $_POST['supplier'];
$date = date('y-m-d');
$medicine = $_POST['medicine'];
$quant = $_POST['quantity'];
$payMethod = $_POST['payMethod'];
$grandT = $_POST['grandT'];
$status = $_POST['status'];

if(!empty($batchNo) || !empty($code)){
         global $connection;
       
       $query2 = "UPDATE purchase SET supName = '{$supplier}',paymentMethod = '{$payMethod}',grandTotal = {$grandT},status = '{$status}' WHERE purchaseCode = {$code} ";
       $result2 = mysqli_query($connection,$query2);
       
       confirmQuery($result2);
       
       if(result2){
           redirect("purchase.php");
       } 
    
    
}else{
    echo "EMPTY QUERY";
}



}


?>
   
<ul class="nav nav-tabs">
    <li class="active"><a href="purchase.php?source=add_purchase">Add Purchase</a></li>
    <li><a href="purchase.php">View Purchase</a></li>
</ul>
<div class="row">
<!--    <div class="col-md-">-->
        <form action="" method="post" style="padding:5px;">
            <div class="form-inline">
                <div class="form-group" style="margin:0 10px 0 50px;">
                  <label for="supplier">Supplier:</label>
                   <div class="input-group">
                      <select name="supplier" id="" class="form-control">
                          <option value="<?php echo isset($supplier) ? $supplier: '' ;?>"><?php echo isset($supplier) ? $supplier: 'Select supplier' ;?></option>
                          <?php supplier(); ?>
                      </select>
                   <span class="input-group-addon"><i class="fa fa-dropbox"></i></span>
                    </div>
                </div>
                <div class="form-group has-success has-feedback" style="margin:0 10px 0 50px;">
                  <label for="code">Code:</label>
                   <div class="input-group">
                  <input class="form-control" id="" type="number" name="code" value="<?php echo isset($code) ? $code: '' ;?>">
                   <span class="input-group-addon"><i class="fa fa-paper-plane-o"></i></span>
                    </div>
                </div>
                <div class="form-group" style="margin:0 10px 0 50px;">
                  <label for="date">Date:</label>
                  <div class="input-group">
                  <input type="date" class="form-control" name="date" value="<?php echo isset($date) ? $date: '' ;?>">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
               <div style="margin:50px 10px 0 0;">
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-codepen"></i></span>
                            <select name="category" id="" class="form-control">
                               <option value="<?php echo isset($category) ? $category: '' ;?>"><?php echo isset($category) ? $category: 'Select category' ;?></option>
                                <?php echo category(); ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="check" class="btn btn-info"><span><i class="fa fa-search-plus"></i></span></button>
                    </div>

                    <div class="form-group">
                        <label for="medicine">Medicine:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-codepen"></i></span>
                            <select name="medicine" id="" class="form-control">
                             <option value="<?php echo isset($medicine) ? $medicine: '' ;?>"><?php echo isset($medicine) ? $medicine: 'Select Medicine' ;?></option>  
                                <?php echo medicine($category); ?>
                            </select>
                        </div>
                        <small class="bg-primary">buying price:<?php echo isset($buy) ? $buy: '' ;?></small>
                        <small class="bg-info">batch number:<?php echo isset($batchNo) ? $batchNo: '' ;?></small>
                    </div>
                     <div class="form-group">
                        <button type="submit" name="check2" class="btn btn-info"><span><i class="fa fa-search-plus"></i></span></button>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-codepen"></i></span> 
                          <input type="number" name="quantity" class="form-control" value="<?php echo isset($quant) ? $quant: '' ;?>"> 
                        </div>
                    </div>
                   
               </div>
               <input type="submit" class="btn btn-primary" name="addList" value="Add To List">
            </div>
            <div class="col-md-8">
               <div style="margin:50px 10px;">
                <div class="panel panel-primary">
                      <div class="panel-heading">
                            <h3 class="panel-title" style="margin:5px;"><strong>Product List</strong></h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Unit</th>
                                <th>Qnt</th>
                                <th>Amnt</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
<?php
if(isset($_GET['purchase_id'])){
    $code = $_GET['purchase_id'];
    global $connection;
    $query = "SELECT * FROM stockList WHERE purchaseCode = {$code}";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        $db_id = $row['id'];
        $db_name = $row['name'];
        $db_unit = $row['sellPrice'];
        $db_qnt = $row['quantity'];
        $db_amnt = $row['amount'];
        $db_code = $row['purchaseCode'];
        
        ?><td><?php echo $db_id;?></td>
        <td><?php echo $db_name;?></td>
        <td><?php echo $db_unit;?></td>
        <td><?php echo $db_qnt;?></td>
        <td><?php echo $db_amnt;?></td>
        </tr><?php
    }

?>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Total:</td>
              <td><?php echo sumProduct($code);?></td>
              <td></td>
          </tr><?php
}                                  
?>
                            </tbody>
                          </table>
                      </div>
                </div>
<!-- /panel for tabel -->
                <div class="col-md-8">

                  <div class="form-group">
                      <label for="notes">Notes:</label>
                          <textarea name="notes" id="" cols="30" class="form-control"></textarea>
                  </div>
                  
                  <div class="form-inline">
                    <div class="form-group col-md-6">
                        <label for="payMethod">Payment Method:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-codepen"></i></span>
                            <select name="payMethod" id="" class="form-control">
                                <option value="">Select Payment</option>
                                <option value="cash">Cash</option>
                                <option value="check">Check</option>
                            </select>
                        </div>
                    </div>

                <div class="form-group col-md-6">
                        <label for="payMethod">Status:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-codepen"></i></span>
                            <select name="status" id="" class="form-control">
                                <option value="">Select Status</option>
                                <option value="due">Due</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                    </div>
                  </div>
               </div>
<!-- /col-md-8 -->
               <div class="col-md-4">
                <div class="form-group">
                  <label for="grandT">Grand Total:</label>
                  <div class="input-group">
                  <input type="number" class="form-control" name="grandT" value="<?php echo isset($db_grand) ? $db_grand: '';?>">
                  <span class="input-group-addon"><i class="fa fa-money"></i></span>
                  </div>
                </div> 
                <input type="submit" class="btn btn-primary btn-block" value="Update Purchase" name="updatePurchase">
               </div>
<!-- /col-md-4 -->
               </div>
            </div>
        </form>



<!--    </div>-->
</div>


<?php 
if(isset($_GET['delete'])){
$delete = $_GET['delete'];
global $connection;
$query = "DELETE FROM productList WHERE id = $delete";
$result = mysqli_query($connection,$query);
}




?>
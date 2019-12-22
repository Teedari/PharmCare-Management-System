<?php
$code = "";
?>
<!-- check button -->

<?php
if(isset($_POST['check'])){
$code = $_POST['code'];
$customer = $_POST['customer'];
$date = $_POST['date'];
$medicine = $_POST['medicine'];

    if(!empty($medicine)){
global $connection;
        
    $query = "SELECT * FROM products WHERE name = '{$medicine}'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_array($result)){
        $batchNo = $row['batchNo'];
        $buy = $row['buyPrice'];
        $sell = $row['sellPrice'];
        $tQuantity = $row['totalQuantity'];
        
    }
    $_SESSION['batchNo'] = $batchNo;
    $_SESSION['buy'] = $buy;
    $_SESSION['tQuant'] = $tQuantity;
    $_SESSION['sell'] = $sell;
    }
}
?>
  
<?php
if(isset($_POST['addList'])){
$code = $_POST['code'];
$customer = $_POST['customer'];
$date = $_POST['date'];
$medicine = $_POST['medicine'];
$quant = $_POST['quantity'];
$batchNo = $_SESSION['batchNo'];
$tQuant = $_SESSION['tQuant'];
$buy = $_SESSION['buy'];
$sell = $_SESSION['sell'];
// GET global as table

global $connection;
if((!empty($code) && !empty($quant))){
    if($quant < $tQuant){
    $buy = $_SESSION['buy'];
//calculate for total amount
    $t_amnt = $buy * $quant;
////continue to reduce stock amount ....
    $query = "INSERT INTO salesList(name,batchNo,salesCode,customer,quantity,amount,sellPrice,buyPrice,date) VALUES ('{$medicine}',{$batchNo},{$code},'{$customer}',{$quant},{$t_amnt},{$sell},{$buy},'{$date}')"; 
    
    purchaseSub($batchNo,$quant);
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($result){
        
    $_GET['table'] = $code;
    $db_grand = sumSalesProduce($code);
    }
    }else{echo "<div class='alert alert-warning'><strong>Warning!</strong> The number of quantity exceeds whats in stock.</div>";}
}else{
     echo "<div class='alert alert-warning'><strong>Warning!</strong> Fields cannot be empty.</div>";
}
   }
?>
<?php
if(isset($_POST['savePurchase'])){
$code = $_POST['code'];
$customer = $_POST['customer'];
$date = date('y-m-d');
$medicine = $_POST['medicine'];
$quant = $_POST['quantity'];
$payMethod = $_POST['payMethod'];
$grandT = $_POST['grandT'];
$status = $_POST['status'];
$batchNo = $_SESSION['batchNo'];

if(!empty($batchNo) || !empty($code)){
         global $connection;
    if(sales_batchNoExit($batchNo)){
     if(checkSales($batchNo,$name)){
         
        global $connection;
//        $querySearch = "SELECT totalQuantity FROM salesproducts WHERE batchNo = {$batchNo}";
//        $resultSearch = mysqli_query($connection,$querySearch);
//        $row = mysqli_fetch_assoc($resultSearch);
//        $db_grandTT = $row['totalQuantity'];
//        $newGrand = $db_grandTT + $quant;
//        confirmQuery($resultSearch);
//        $query4 = "UPDATE salesproducts SET totalQuantity = $newGrand WHERE batchNo = {$batchNo}";
//        $result = mysqli_query($connection,$query4);
//         confirmQuery($result);
         
                
        $query3 = "INSERT INTO sales(salesCode,customer,paymentMethod,grandTotal,status)  VALUES ($code,'{$supplier}','{$payMethod}',$grandT,'{$status}')";
       $result3 = mysqli_query($connection,$query3);
         confirmQuery($result3);
         
     }
    }else{

       $query2 = "INSERT INTO salesproducts(name, batchNo, totalQuantity, sellPrice, buyPrice)  VALUES ('{$medicine}',{$batchNo},{$quant},'{$_SESSION['sell']}','{$_SESSION['buy']}')";
       $result2 = mysqli_query($connection,$query2);
       
       confirmQuery($result2);
        
    $query3 = "INSERT INTO sales(salesCode,customer,paymentMethod,grandTotal,status)  VALUES ($code,'{$customer}','{$payMethod}',$grandT,'{$status}')";
       $result3 = mysqli_query($connection,$query3);
       
       confirmQuery($result3);
    
    
    
    }
       
       
       if(result2){
           redirect("sales.php");
       } 
    
    
}else{
    echo "EMPTY QUERY";
}



}


?>
   
<ul class="nav nav-tabs">
    <li class="active"><a href="sales.php?source=add_sales">Add Sales</a></li>
    <li><a href="sales.php">View Sales</a></li>
</ul>
<div class="row">
<!--    <div class="col-md-">-->
        <form action="" method="post" style="padding:5px;">
            <div class="form-inline">
                <div class="form-group" style="margin:0 10px 0 30px;">
                  <label for="supplier">Customer:</label>
                   <div class="input-group">
                          <input type="text" name="customer" class="form-control" value="<?php echo isset($customer) ? $customer: '' ;?>">
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
                        <label for="medicine">Medicine:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-codepen"></i></span>
                            <select name="medicine" id="" class="form-control">
                             <option value="<?php echo isset($medicine) ? $medicine: '' ;?>"><?php echo isset($medicine) ? $medicine: 'Select Medicine' ;?></option>  
                                <?php echo medInfo(); ?>
                            </select>
                        </div>
                        <small class="bg-primary">buying price:<?php echo isset($buy) ? $buy: '' ;?></small>
                        <small class="bg-info">batch number:<?php echo isset($batchNo) ? $batchNo: '' ;?></small>
                        <small class="bg-info">stock:<?php echo isset($tQuantity) ? $tQuantity: '' ;?></small>
                        
                    </div>
                     <div class="form-group">
                        <button type="submit" name="check" class="btn btn-info"><span><i class="fa fa-search-plus"></i></span></button>
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
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
<?php
if(isset($_GET['table'])){
    $code = $_GET['table'];
    global $connection;
    $query = "SELECT * FROM salesList WHERE salesCode = {$code}";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        $db_id = $row['id'];
        $db_name = $row['name'];
        $db_unit = $row['sellPrice'];
        $db_qnt = $row['quantity'];
        $db_amnt = $row['amount'];
        $db_code = $row['salesCode'];
        
        ?><td><?php echo $db_id;?></td>
        <td><?php echo $db_name;?></td>
        <td><?php echo $db_unit;?></td>
        <td><?php echo $db_qnt;?></td>
        <td><?php echo $db_amnt;?></td>
        <td> <?php echo "<a href='purchase.php?delete= $db_id'><button type='button' class='btn btn-primary input-sm'><span><i class='fa fa-trash''></i></span></button></a>";?></td>
        </tr><?php
    }

?>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Total:</td>
              <td><?php echo sumSalesProduce($code);?></td>
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
                <input type="submit" class="btn btn-primary btn-block" value="Save Purchase" name="savePurchase">
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
$query = "DELETE FROM stockList WHERE id = $delete";
$result = mysqli_query($connection,$query);
}

?>
<ul class="nav nav-tabs">
  <li><a href="purchase.php?source=add_purchase">Add Purhcase</a></li>
  <li class="active"><a href="purchase.php">View Purhcase</a></li>
</ul>
            
            <table class="table" id="myTable">
                <thead>
                  <tr>
                     
                      <th>Purchase Code</th>
                      <th>Name</th>
                      <th>Payment Method</th>
                      <th>Grand Total</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>      
                  <tr class="success">
<?php
    global $connection;
    $query = "SELECT * FROM purchase";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $purchaseCode = $row['purchaseCode'];
        $name = $row['supName'];
        $payM = $row['paymentMethod'];
        $grandT = $row['grandTotal'];
        $status = $row['status'];

       ?>
        <th><?php echo $purchaseCode ;?></th>
        
        <th><?php echo $name ;?></th>
        
        <th><?php echo $payM ;?></th>
        
        <th><?php echo $grandT ;?></th>
        
        <th><?php echo $status ;?></th>
        
        <th><?php echo"<div class='dropdown'>
          <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
          <span class='caret'></span></button>
          <ul class='dropdown-menu'>
            <li><a href='purchase.php?source=edit_purchase&purchase_id={$purchaseCode}'>Edit</a></li>
            <li><a href='../invoice.php?p_code={$purchaseCode}'>Invoice</a></li>
            <li><a href='purchase.php?delete={$purchaseCode}'>Delete</a></li>
          </ul>
        </div>" 
            ?></th>
        </tr><?php
    } 
?>
                  </tr>
                </tbody>
            </table>
<!-- Delete query -->
<?php
    
if(isset($_GET['delete'])){
  $delete = $_GET['delete'];
    global $connection;
    
    $query = "DELETE FROM purchase WHERE purchaseCode = {$delete}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    $query2 = "DELETE FROM stocklist WHERE purchaseCode = {$delete}";
    $result2 = mysqli_query($connection,$query2);
    redirect("purchase.php");
    

}



?>
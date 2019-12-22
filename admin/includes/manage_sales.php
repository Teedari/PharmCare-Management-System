<ul class="nav nav-tabs">
  <li><a href="sales.php?source=add_sales">Add Sales</a></li>
  <li class="active"><a href="sales.php">View Sales</a></li>
</ul>
            
            <table class="table" id="myTable">
                <thead>
                  <tr>
                     
                      <th>Sales Code</th>
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
    $query = "SELECT * FROM sales";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $salesCode = $row['salesCode'];
        $name = $row['customer'];
        $payM = $row['paymentMethod'];
        $grandT = $row['grandTotal'];
        $status = $row['status'];

       ?>
        <th><?php echo $salesCode ;?></th>
        
        <th><?php echo $name ;?></th>
        
        <th><?php echo $payM ;?></th>
        
        <th><?php echo $grandT ;?></th>
        
        <th><?php echo $status ;?></th>
        
        <th><?php echo"<div class='dropdown'>
          <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action
          <span class='caret'></span></button>
          <ul class='dropdown-menu'>
            <li><a href='../invoice2.php?p_code={$salesCode}'>Invoice</a></li>
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
    
    $query = "DELETE FROM sales WHERE salesCode = {$delete}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    $query2 = "DELETE FROM salesList WHERE salesCode = {$delete}";
    $result2 = mysqli_query($connection,$query2);
    redirect("purchase.php");
    

}



?>
<ul class="nav nav-tabs">
              <li><a href="medicine.php?source=add_medicine">Add Medicine</a></li>
              <li class="active"><a href="medicine.php">View Medicine</a></li>
            </ul>
            
            <table class="table" id="myTable">
                <thead>
                  <tr>
                      <th>Name</th>
                      <th>Batch Number</th>
                      <th>Shelf</th>
                      <th>Buying Price</th>
                      <th>Selling Price</th>
                      <th>Expire Date</th>
                  </tr>
                </thead>
                <tbody>      
                  <tr class="success">
<?php
    global $connection;
    $query = "SELECT * FROM medicine";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $batchNo = $row['batchNo'];
        $shelf = $row['shelf'];
        $buy = $row['buyPrice'];
        $sell = $row['sellPrice'];
        
        $expDate = $row['expDate'];

       ?><th><?php echo $name ;?></th>

        <th><?php echo $batchNo ;?></th>
        
        <th><?php echo $shelf ;?></th>
        
        <th><?php echo $buy ;?></th>
        
        <th><?php echo $sell ;?></th>
        
        <th><?php echo $expDate ;?></th>
        
        <th><?php echo "<a href='medicine.php?source=edit_medicine&medicine_id={$id}'><button type='button' class='btn btn-success input-sm'><span><i class='fa fa-pencil''></i></span></button></a>";?>
        <?php echo "<a href='medicine.php?delete={$row['id']}'><button type='button' class='btn btn-primary input-sm'><span><i class='fa fa-trash''></i></span></button></a>";?>
        </th>
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
    
    $query = "DELETE FROM medicine WHERE id = {$delete}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    
    redirect("medicine.php");
    

}



?>
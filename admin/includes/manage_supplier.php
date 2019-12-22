<ul class="nav nav-tabs">
  <li><a href="supplier.php?source=add_supplier">Add Supplier</a></li>
  <li class="active"><a href="supplier.php">View Supplier</a></li>
</ul>
            
            <table class="table" id="myTable">
                <thead>
                  <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>      
                  <tr class="success">
<?php
    global $connection;
    $query = "SELECT * FROM supplier";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];

       ?><th><?php echo $name ;?></th>

        <th><?php echo $email ;?></th>
        
        <th><?php echo $phone ;?></th>
        
        <th><?php echo "<a href='supplier.php?source=edit_supplier&supplier_id={$id}'><button type='button' class='btn btn-success input-sm'><span><i class='fa fa-pencil''></i></span></button></a>";?>
        <?php echo "<a href='supplier.php?delete={$row['id']}'><button type='button' class='btn btn-primary input-sm'><span><i class='fa fa-trash''></i></span></button></a>";?>
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
    
    $query = "DELETE FROM supplier WHERE id = {$delete}";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    
    redirect("supplier.php");
    

}



?>




<?php include("../includes/admin_header.php");?>
<!-- /admin_header -->
  
<?php include("../includes/admin_sidebar.php"); ?>
<!-- /.adminSidebar --> 
   
<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $numeric = $_POST['nNumber'];
    global $connection;
    
    if(!empty($name) || !empty($numeric)){

    $query = "INSERT INTO shelf(name,numericno) VALUES ('{$name}',{$numeric})";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    if($result){
        echo"<div class='alert alert-success'><strong>Successfully Added</strong></div>";
    }
    }else{
        echo"<div class='alert alert-warning'><strong>Fields cannot be empty</strong></div>";
    }
}




?>



<div class="content">
    <div class="container-fluid">
        <h4 class="page-header">
        Shelf
        </h4>
            <!-- /.row -->
        <div class="row">
            <!-- middle content -->
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="numeric number">Numeric Number</label>
                    <input type="number" class="form-control" name="nNumber">
                </div>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
         
         <div class="col-md-6">
            <div class="panel panel-default">
                  <div class="panel-heading">
                        <h3 class="panel-title">Shelf Table</h3>
                  </div>
                  <div class="panel-body">
                     <table class="table" id="myTable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>NumericNumber</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                            global $connection;
                            $result = mysqli_query($connection,"SELECT * FROM shelf ORDER BY numericno ASC");
                            confirmQuery($result);
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $num = $row['numericno'];

                              ?>
                              <td><?php echo $name; ?></td>
                              <td><?php echo $num ;?></td>
                            <td><?php echo "<a onClick=\"javascript: return confirm('Do you wish to delete it.') \" href='shelf.php?delete={$row['id']}'><button type='button' class='btn btn-primary input-sm'><span style='color:red;'><i class='fa fa-trash''></i></span></button></a>";?></td></tr><?php

                            }
                            ?>

                        </tbody>
                      </table>
                        
                  </div>
            </div>

         </div>
<?php
  if(isset($_GET['delete'])){
      $delete = $_GET['delete'];
      global $connection;
      $result = mysqli_query($connection,"DELETE FROM shelf WHERE id = $delete");
      confirmQuery($result);
      
      redirect("shelf.php");
    
  }          
            
            
?>
          
          
          
          
           <!-- /middle content --> 
            <!-- out of bound -->
        </div>
    </div>
</div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../data/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../data/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../data/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../data/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="../data/text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../data/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../data/assets/js/demo.js"></script>
	
	<!-- dataTables jss -->
	<script src="../data/assets/js/jquery.dataTables.min.js"></script>
	<script src="../data/assets/js/dataTables.bootstrap.min.js"></script>
	
	<script>$("#myTable").dataTable();</script>

</html>

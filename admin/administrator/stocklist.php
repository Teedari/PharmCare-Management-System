<?php include("../includes/admin_header.php");?>
<!-- /admin_header -->
  
<?php include("../includes/admin_sidebar.php"); ?>
<!-- /.adminSidebar --> 


<div class="content">
    <div class="container-fluid">
        <h4 class="page-header">
        <a href="purchase.php?source=add_purchase"><button class="btn btn-success">New Purchase</button></a>
        </h4>
            <!-- /.row -->
        <div class="row">
            <!-- middle content -->
         
         <div class="col-md-12">
            <div class="panel panel-default">
                  <div class="panel-heading">
                        <h3 class="panel-title">Stock List</h3>
                  </div>
                  <div class="panel-body">
                     <table class="table" id="myTable">
                        <thead>
                          <tr>
                             <th>#</th>
                            <th>Name</th>
                            <th>Batch No</th>
                            <th>Total Quantity</th>
                            <th>Selling Price</th>
                            <th>Buying Price</th>
                            <th>Purchase Code</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                            global $connection;
                            $result = mysqli_query($connection,"SELECT * FROM stockList ORDER BY id ASC");
                            confirmQuery($result);
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $bathNo = $row['batchNo'];
                                $quantity = $row['quantity'];
                                $sell = $row['sellPrice'];
                                $buy = $row['buyPrice'];
                                $purchaseCode = $row['purchaseCode'];

                              ?>
                               <td><?php echo $id; ?></td>
                              <td><?php echo $name; ?></td>
                              <td><?php echo $bathNo ;?></td>
                              <td><?php echo $quantity ;?></td>
                              <td><?php echo $sell ;?></td>
                              <td><?php echo $buy ;?></td>
                              <td><?php echo $purchaseCode ;?></td>
                              <td><?php echo "<a href='stocklist.php?delete= $id'><button type='button' class='btn btn-primary input-sm'><span><i class='fa fa-trash''></i></span></button></a>";?></td>
                              </tr><?php
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
      $result = mysqli_query($connection,"DELETE FROM stockList WHERE id = $delete");
      confirmQuery($result);
      
      redirect("stocklist.php");
    
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

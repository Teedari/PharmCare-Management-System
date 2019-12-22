<?php include("../includes/admin_header.php");?>
<!-- /admin_header -->
  
<?php include("../includes/admin_sidebar.php"); ?>
<!-- /.adminSidebar --> 
   



        <div class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
           
<?php include("../includes/admin_dashboard.php");?>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dropbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
global $connection;
$query = "SELECT * FROM purchase";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
echo "<span class='badge'>$row</span>";                    
?>
                                    </div>
                                    <div>Number of Purchase</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">

                                        <?php 
global $connection;
$query = "SELECT SUM(grandTotal) AS grandAmnt FROM purchase";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$data = mysqli_fetch_array($result);
$row = $data['grandAmnt'];
echo "<span class='badge'>GH¢ $row</span>";               
?>
                                    </div>
                                    <div>Total Purchase Amount</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-warning">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-dropbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
global $connection;
$query = "SELECT * FROM sales";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
echo "<span class='badge'>$row</span>";  
?>
                                    </div>
                                    <div>No of Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
global $connection;
$query = "SELECT SUM(grandTotal) AS grandAmnt FROM sales";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$data = mysqli_fetch_array($result);
$row = $data['grandAmnt'];
echo "<span class='badge'>GH¢ $row</span>";                   
?>
                                    </div>
                                    <div>Total Sales Amount</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- NOtification panels -->
<div class="col-md-6">
<div class="panel panel-primary">
	  <div class="panel-heading">
			<h3 class="panel-title">Out of stock medicines</h3>
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
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                            global $connection;
                            $result = mysqli_query($connection,"SELECT * FROM products WHERE totalQuantity < 20 ORDER BY id ASC");
                            confirmQuery($result);
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $bathNo = $row['batchNo'];
                                $quantity = $row['totalQuantity'];
                                $sell = $row['sellPrice'];
                                $buy = $row['buyPrice'];

                              ?>
                               <td><?php echo $id; ?></td>
                              <td><?php echo $name; ?></td>
                              <td><?php echo $bathNo ;?></td>
                              <td><?php echo $quantity ;?></td>
                              <td><?php echo $sell ;?></td>
                              <td><?php echo $buy ;?></td>
                              </tr><?php
                            }
                            ?>
                            
                        </tbody>
                      </table>
	  </div>
</div>
</div>
<!-- /md-6 for panel table out of stock medicines -->
  
<div class="col-md-6">
    <div class="panel panel-danger">
	  <div class="panel-heading">
			<h3 class="panel-title">Expired Drug List</h3>
	  </div>
	  <div class="panel-body">
<table class="table" id="myTable1">
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
    $date = date('y-m-d');
    $query = "SELECT * FROM medicine WHERE date(expDate) <= '{$date}'";
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
        </tr><?php
    } 
?>
                  </tr>
                </tbody>
            </table>
	  </div>
</div>

</div>
   
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
    <script>$("#myTable1").dataTable();</script>

</html>





<?php include("../includes/admin_header.php");?>
<!-- /admin_header -->
  
<?php include("../includes/admin_sidebar.php"); ?>
<!-- /.adminSidebar --> 

   
<?php
if(isset($_POST['search'])){
    $startFrm = $_POST['startFrm'];
    $end = $_POST['end'];
    global $connection;
    
    if(!empty($end) || !empty($start)){
        $_SESSION['startFrm'] = $startFrm;
        $_SESSION['end'] = $end;
        $_GET['table'] = $startFrm;
    $query = "SELECT * FROM saleslist WHERE date between '{$startFrm}' AND '{$end}' ORDER BY date";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
        
    }else{
        echo"<div class='alert alert-warning'><strong>Fields cannot be empty</strong></div>";
    }
}




?>


<div class="content">
    <div class="container-fluid">
        <h4 class="page-header">
        SALES RECORDS
        </h4>
            <!-- /.row -->
        <div class="row">
            <!-- middle content -->
            <form action="" method="post">
               <div class="form-inline">
                   
                <div class="form-group">
                    <label for="name">Start from:</label>
                    <input type="date" name="startFrm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="numeric number">End</label>
                    <input type="date" class="form-control" name="end">
                </div>
                <input type="submit" name="search" value="Search" class="btn btn-primary">
               </div>
            </form>
    
         <div class='panel panel-success' style='margin-top:20px;'>
              <div class='panel-heading'>
                    <h3 class='panel-heading'>Sales Record</h3>
              </div>
              <div class='panel-body'>
                
<table class="table" id="myTable">
                        <thead>
                          <tr>
                             <th>#</th>
                             <th>Customer Name</th>
                            <th>Medicine</th>
                            <th>Batch No</th>
                            <th>Total Quantity</th>
                            <th>Amount</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                             if(isset($_GET['table'])){
                                 
                            $startFrm = $_SESSION['startFrm'];
                            $end = $_SESSION['end'];
                            global $connection;
                            $result = mysqli_query($connection,"SELECT * FROM saleslist WHERE date between '{$startFrm}' AND '{$end}' ORDER BY date");
                            confirmQuery($result);
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $customer = $row['customer'];
                                $name = $row['name'];
                                $bathNo = $row['batchNo'];
                                $quantity = $row['quantity'];
                                $amount = $row['amount'];
                                $date = $row['date'];

                              ?>
                               <td><?php echo $id; ?></td>
                               <td><?php echo $customer; ?></td>
                              <td><?php echo $name; ?></td>
                              <td><?php echo $bathNo ;?></td>
                              <td><?php echo $quantity ;?></td>
                              <td><?php echo $amount ;?></td>
                              <td><?php echo $date ;?></td>
                              </tr><?php
                            }
                                 ?>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <th>Total sales:</th>
                              <th><?php echo sumQuery($startFrm,$end);?></th>
                          </tr><?php
                             } 
                            ?>
                            
                        </tbody>
                      </table>
              </div>
            </div>
    
    
    
    
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

<?php include("../includes/admin_header.php");?>
<!-- /admin_header -->
  
<?php include("../includes/admin_sidebar.php"); ?>
<!-- /.adminSidebar --> 
   



<div class="content">
    <div class="container-fluid">
        <h6 class="">
        Purchase
        </h6>
            <!-- /.row -->
        <div class="row">
            <!-- middle content -->
        <div class="col-md-12 m-6">

            <?php           
            if(isset($_GET['source'])){
$source = $_GET['source'];
}else{
$source = '';
}
switch($source){

case 'add_purchase';
include("../includes/add_purchase.php");
break;

case 'manage_purchase';
include("../includes/manage_purchase.php");
break;

case 'edit_purchase';
include("../includes/edit_purchase.php");
break;

//case 'view_employee';
//include("../includes/view_employee.php");
//break;
    default:
include("../includes/manage_purchase.php");
break;        
}           
?>
        </div>
          
          
          
          
          
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

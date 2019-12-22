                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">

                                        <?php 
global $connection;
$query = "SELECT * FROM shelf";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
echo "<span class='badge'>$row</span>";                     
?>
                                    </div>
                                    <div>Total Shelfs</div>
                                </div>
                            </div>
                        </div>
                        <a href="shelf.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-medkit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
global $connection;
$query = "SELECT * FROM medicine";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
echo "<span class='badge'>$row</span>";                    
?>
                                    </div>
                                    <div>Total Medicine</div>
                                </div>
                            </div>
                        </div>
                        <a href="medicine.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-area-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
global $connection;
$query = "SELECT * FROM stockList";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
   echo "<span class='badge'>$row</span>";                    
?>
                                    </div>
                                    <div>Total Stocks</div>
                                </div>
                            </div>
                        </div>
                        <a href="stocklist.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
global $connection;
$query = "SELECT * FROM supplier";
$result = mysqli_query($connection,$query);
confirmQuery($result);
$row = mysqli_num_rows($result);
   echo "<span class='badge'>$row</span>";                     
?>
                                    </div>
                                    <div>Total Suppliers</div>
                                </div>
                            </div>
                        </div>
                        <a href="suppliers.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    <div class="sidebar" data-color="red" data-image="../data/assets/img/staff2.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    PharmCAre
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="shelf.php">
                        <i class="fa fa-columns"></i>
                        <p>Shelf</p>
                    </a>
                </li>
                <li>
                    <a href="category.php">
                        <i class="fa fa-list"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li>
                    <a href="medicine.php">
                        <i class="fa fa-medkit"></i>
                        <p>Medication</p>
                    </a>
                </li>
                <li>
                    <a href="supplier.php">
                        <i class="fa fa-users"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li>
                    <a href="purchase.php">
                        <i class="fa fa-codepen"></i>
                        <p>Purchase</p>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                        <i class="fa fa-credit-card"></i>
                        <p>Stock List</p>
                    </a>
                </li>
                <li>
                    <a href="sales.php">
                        <i class="fa fa-paper-plane"></i>
                        <p>Sales</p>
                    </a>
                </li>
                <li>
                    <a href="sales_record.php">
                        <i class="fa fa-book"></i>
                        <p>Sales Record</p>
                    </a>
                </li>
				<li>
                    <a href="../logout.php">
                        <i class="fa fa-plug"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    <!-- /.sidebar -->
    
<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="../administrator/profile.php">
                               <p> <?php echo $_SESSION['username']; ?></p>
                            </a>
                        </li>
                        <li>
                            <a href="../logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

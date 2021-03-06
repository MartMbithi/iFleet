<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    require_once('partials/_analytics.php');
    check_login();
    require_once('partials/_head.php')
?>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Navbar -->
                <?php require_once('partials/_nav.php');?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
                <?php require_once('partials/_staffnav.php');?>
            <!--  /. Main Sidebar Container -->

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Main Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="subordinate_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Main Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">

                <div class="row">
                <!-- Staffs -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Staffs</span>
                            <span class="info-box-number">
                                <?php echo $staff;?>
                            </span>
                        </div>
                    </div>
                </div>
                <!--./  Staffs -->

                <!-- Fleet Categories-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-car"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Fleet Categories</span>
                            <span class="info-box-number"><?php echo $category;?></span>
                        </div>
                    </div>
                </div>
                <!-- Fleet Categories-->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <!-- Fleet-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-truck"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Fleets</span>
                            <span class="info-box-number"><?php echo $fleet;?></span>
                        </div>
                    </div>
                </div>
                <!-- Fleet-->

                <!-- Fleet Routes-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-truck-moving"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total AutoMobiles</span>
                            <span class="info-box-number"><?php echo $vehicles;?></span>
                        </div>
                    </div>
                </div>
                <!-- ./ Fleet Routes-->

                <!--Total Handled Shipments -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-pallet"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Handled Shipments</span>
                            <span class="info-box-number"><?php echo $shipments;?></span>
                        </div>
                    </div>
                </div>
                <!--Total Handled Shipments -->

                <!-- Pending Shipments -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dolly-flatbed"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Pending Shipments</span>
                            <span class="info-box-number"><?php echo $pendingshipments;?></span>
                        </div>
                    </div>
                </div>
                <!-- ./ Pending Shipments -->

                <!-- On Transit-->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shipping-fast"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">On Transit Shipments</span>
                            <span class="info-box-number"><?php echo $onTransitshipments;?></span>
                        </div>
                    </div>
                </div>
                <!-- ./ On Transit -->

                <!-- Delivered Shipments -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dolly"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Delivered Shipments</span>
                            <span class="info-box-number"><?php echo $deliveredShipments;?></span>
                        </div>
                    </div>
                </div>
                <!-- ./ Delivered -->
                </div>

                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Fleet By Fleet Categories</h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>Fleet Number</th>
                                            <th>Fleet Name</th>
                                            <th>Fleet Category Name</th>
                                            <th>Staff Incharge</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ret="SELECT * FROM  iFleet_fleet LIMIT 10"; 
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute();
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($fleet=$res->fetch_object())
                                                {
                                            ?>
                                                <tr>
                                                    <td><a href="subordinate_view_single_fleet.php?fleet_id=6"><?php echo $fleet->fleet_code;?></td>
                                                    <td><?php echo $fleet->fleet_name;?></td>
                                                    <td><span class="badge badge-success"><?php echo $fleet->fleet_category_name;?></span></td>
                                                    <td><?php echo $fleet->fleet_staff_name;?></td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <a href="subordinate_get_fleet_categories.php" class="btn btn-sm btn-info float-left">Add New Fleet Record</a>
                                <a href="subordinate_manage_fleet.php" class="btn btn-sm btn-secondary float-right">View Fleets</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest Shipments</h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>Shipment Number</th>
                                            <th>Shipment Name</th>
                                            <th>Shipment Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //Fetch all shipments
                                                $ret="SELECT * FROM  iFleet_Shipments"; 
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute();
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($shipment=$res->fetch_object())
                                                {
                                            ?>
                                                <tr>
                                                    <td><a href="sudo_view_shipment.php?shipment_id=<?php echo $shipment->s_id;?>"><?php echo $shipment->s_code;?></a></td>
                                                    <td><?php echo $shipment->s_name;?></td>
                                                    <td>
                                                    <?php
                                                        if($shipment->s_status == 'Delivered')
                                                        {
                                                            echo 
                                                            "
                                                                <span class='badge badge-success'>$shipment->s_status</span>
                                                            
                                                            ";
                                                        }
                                                        elseif($shipment->s_status == 'On Transit')
                                                        {
                                                            echo 
                                                            "
                                                                <span class='badge badge-primary'>$shipment->s_status</span>
                                                            ";
                                                        }
                                                        else
                                                        {
                                                            echo 
                                                            "
                                                                <span class='badge badge-danger'>$shipment->s_status</span>
                                                            ";
                                                        }
                                                    ?>  
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <a href="subordinate_add_shipment.php" class="btn btn-sm btn-info float-left">Add New Shipment Record</a>
                                <a href="subordinate_shipments.php" class="btn btn-sm btn-secondary float-right">View All Shipments</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<!-- Main Footer -->
<?php require_once('partials/_footer.php');?>
</div>
<?php require_once('partials/_scripts.php');?>
</body>
</html>

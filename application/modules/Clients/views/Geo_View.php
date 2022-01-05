<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<title><?= $this->router->class ?> | MKBY</title>
    <?php include VIEWPATH.'includeClients/head.php' ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body >
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
                <!-- ============================================================== -->
        <!-- End Topbar header -->
        <?php include VIEWPATH.'includeClients/menuTop.php' ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
         <?php include VIEWPATH.'includeClients/menuAside.php' ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php include 'include/sous_menu.php' ?>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    
                    <div class="col-md-12">
                <audio id="son" src="<?= base_url() ?>/upload/sonnerie/success.mp3" preload="auto"></audio>
                <audio id="fail" src="<?= base_url() ?>/upload/sonnerie/fail.mp3" preload="auto"></audio>
                        
                         <!-- card new -->
                        <div class="card">
                            <div class="card-body">
                                <?php include 'include/breadcrumb.php' ?> 
                                <h4 class="card-title text-center m-b-0">Guichets</h4>
                            </div>
                            <div class="modal-dialog text-center">
                                <div class="modal-content">
                                    
                                    <ul class="list-style-none text-center">
                                        <?= $guichet ?>

                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- row -->
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <?php include VIEWPATH.'includeClients/right.php' ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('outils_client') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('outils_client') ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('outils_client') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('outils_client') ?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('outils_client') ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('outils_client') ?>/dist/js/custom.min.js"></script>
    <script src="<?= base_url() ?>js/sweet.min.js"></script>
    <script src="<?= base_url() ?>js/MyLibrairieJs.js"></script>
</body>

<script>
    
</script>

</html>
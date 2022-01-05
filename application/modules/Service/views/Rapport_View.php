<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title><?= $this->router->class ?> | MKBY</title>
    <?php include VIEWPATH.'includeClients/head.php' ?>
</head>

<body>
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
        <!-- ============================================================== -->
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
            <div class="container-fluid">                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rapport de Transactions</h5>
                                <?php include 'include/breadcrumb.php' ?> 
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr class="bg-warning">
                                                <th>#Num</th>
                                                <th>Transmetteur</th>
                                                <th>Montant envoyé</th>
                                                <th>Recepteur</th>
                                                <th>Montant reçu</th>
                                                <th>Frais</th>
                                                <th>Date d'action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyTable">
                                            <?= $repport ?>
                                        </tbody>
                                        <tfoot>
                                            <tr  class="bg-warning">
                                                <th>#Num</th>
                                                <th>Transmetteur</th>
                                                <th>Montant envoyé</th>
                                                <th>Recepteur</th>
                                                <th>Montant reçu</th>
                                                <th>Frais</th>
                                                <th>Date d'action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- this page js -->
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        // $(function(){
        //     $.ajax({
        //         url:"<?= base_url('Service/RapportAjax') ?>",
        //         method:"post",
        //         dataType:"json",
        //         success:function(dt){
        //             $('#bodyTable').html(dt.repport)
        //         }
        //     })
        // })
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();

    </script>

</body>

</html>
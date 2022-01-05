<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $this->router->class ?> | MKBY</title>
    <?php include VIEWPATH.'include/head.php'?>
</head>

<body>
    <div>
        
        <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
    <?php include VIEWPATH.'include/header_top.php' ?>





        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <?php include VIEWPATH.'include/side_bar.php' ?>
            <!--END CHAT FORM-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <?php include 'include/sous_menu.php' ?>
                <!--END TITLE & BREADCRUMB PAGE-->


                <!--BEGIN CONTENT-->
                 <div class="page-content">
                    <div class="row">
                          <div class="panel-body pan">
                                <div class="panel panel-blue">
                                    <?php include 'include/panel_head.php'?>
                                        <div class="col-lg-12">
                                        <div class="portlet box">
                                            <div class="portlet-header">
                                                <div class="caption">Active Table</div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row mbm">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive">
                                                            <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                                <thead>
                                                                    <tr>
                                                                        
                                                                        <th>Num #</th>
                                                                        <th>Noms</th>
                                                                        <th >Pays</th>
                                                                        <th >Sexe</th>
                                                                        <th >Matricule</th>
                                                                        <th >Mise à jour</th>
                                                                        <th >Solde total</th>
                                                                        <th >Status</th>
                                                                        <th >Actions</th>
                                                                    </tr>
                                                                <tbody>
                                                                  <?= $solde ?>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                          </div>
                     </div>
                </div>
                <!--END CONTENT-->
            </div>
            <!--BEGIN FOOTER-->
            <?php include VIEWPATH.'include/footer.php' ?>
            <!--END FOOTER-->
            <!--END PAGE WRAPPER-->
        </div>
    </div>
    <script src="<?=base_url()?>/js/vendor/jquery.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/jquery-ui.js"></script>
    <!--loading bootstrap js-->
    <script src="<?=base_url()?>/js/vendor/bootstrap.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/html5shiv.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/respond.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/slimScroll/jquery.slimscroll.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/jquery-cookie/jquery.cookie.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/iCheck/icheck.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/iCheck/custom.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/jquery-notific8/jquery.notific8.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/jquery-highcharts/highcharts.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/jquery.menu.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/jquery-pace/pace.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/holder/holder.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/responsive-tabs/responsive-tabs.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/moment/moment.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="<?=base_url('outils/madmin')?>/js/main.js"></script>
    <!--LOADING SCRIPTS FOR PAGE-->
    <script src="<?=base_url('outils/madmin')?>/vendors/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/DataTables/media/js/dataTables.bootstrap.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/table-datatables.js"></script>
    <script type="text/javascript">
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-145464-14', 'auto');
    ga('send', 'pageview');
    </script>
</body>
<!-- Mirrored from swlabs.co/madmin/code/table-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 21:59:47 GMT -->

</html>
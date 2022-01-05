<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from swlabs.co/madmin/code/grid-double-sort.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 22:02:07 GMT -->

<head>
    <title><?= $this->router->class ?> | MKBY</title>
  <?php include 'include/header.php' ?>
</head>

<body class=" ">
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
                <?php include 'include/head_title.php' ?>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div id="grid-double-sort" class="box jplist double-sort">
                                        <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                        <div class="jplist-panel box panel-top">
                                            <div class="text-filter-box">
                                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input data-path=".subject" type="text" value="" placeholder="Filter by Subject" data-control-type="textbox" data-control-name="subject-filter" data-control-action="filter" class="form-control" /></div>
                                            </div>
                                            <div data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                            <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" class="jplist-pagination"></div>
                                        </div>
                                        <div class="list text-shadow box row">
                                            <!--<item></item>-->
                                            <?= $agent ?>
                                            <!--<item></item>-->
                                            
                                        </div>
                                        <!--<ios>button: show/hide panel</ios>-->
                                        <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                        <!--<panel></panel>-->
                                        
                                        <div class="box jplist-no-results text-shadow align-center">
                                            <p>Aucun resustant</p>
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
            <div id="footer">
                <div class="copyright">2014 © &mu;Admin - Responsive Multi-Style Admin Template</div>
            </div>
            <!--END FOOTER-->
            <!--END PAGE WRAPPER-->
        </div>
    </div>
    <script src="<?=base_url('outils/madmin')?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/jquery-ui.js"></script>
    <!--loading bootstrap js-->
    <script src="<?=base_url('outils/madmin')?>/vendors/bootstrap/js/bootstrap.min.js"></script>
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
    <script src="<?=base_url('outils/madmin')?>/vendors/jplist/html/js/vendor/modernizr.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/jplist/html/js/jplist.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/js/jplist.js"></script>
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
<!-- Mirrored from swlabs.co/madmin/code/grid-double-sort.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 22:02:07 GMT -->

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?= $this->router->class ?> | MKBY</title>
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
                    <div id="tab-general">
                        <div id="sum_box" class="row mbl">
                            <div id="compteur">
                                
                            </div> 
                            <div class="col-sm-6 col-md-3">
                                <div class="panel visit db mbm">
                                    <div class="panel-body">
                                        <p class="icon"><i class="icon fa fa-group"></i></p>
                                        <h5 class=""><span id="compteurClient"></span></h5>
                                        <p class="description">Clients</p>
                                       <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="" style="width: 100%;" class="progress-bar progress-bar-warning"><span class="sr-only"> Complete (success)</span></div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mbl">
                            

                            <div class="col-lg-12">
                                <div class="portlet box prolet-primary">
                                    <div class="portlet-header">
                                        <div class="caption text-uppercase"> <i style="font-size: 17px; margin-top: 2px;" class="fa fa-comments"></i>Chats</div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="chat-scroller">
                                            <ul class="chats" id="live">
                                                Chargemet...
                                                
                                            </ul>
                                        </div>
                                        <div class="chat-form">
                                            
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
    <script src="<?=base_url('outils/madmin')?>/vendors/intro.js/intro.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/flot-chart/jquery.flot.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/flot-chart/jquery.flot.categories.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/flot-chart/jquery.flot.pie.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/flot-chart/jquery.flot.tooltip.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/flot-chart/jquery.flot.resize.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/flot-chart/jquery.flot.fillbetween.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/flot-chart/jquery.flot.stack.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/flot-chart/jquery.flot.spline.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/calendar/zabuto_calendar.min.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/sco.message/sco.message.js"></script>
    <script src="<?=base_url('outils/madmin')?>/vendors/intro.js/intro.js"></script>
    <script src="<?=base_url()?>assets/gis/swlabs.co/madmin/code/js/index.js"></script>
    <script type="text/javascript">
    $(function(){
        
        
        $('#msgNot').click(function(){
            alert('ok')
        })
        compteur();
        display();
    })

    let compteur = function(){
        $.ajax({
            url:"<?= base_url('Dashboard/Dashboard/compteur') ?>",
            method:"post",
            dataType:"json",
            success:function(dt){
                $('#msgNot').html(dt.msgNot);
                $('#compteur').html(dt.compteur);
                $('#compteurClient').html(dt.compteurClient);
                
            }
        })
    }
    
    let display  = ()=>{
        $.ajax({
            url:"<?= base_url('Dashboard/display') ?>",
            type:"post",
            dataType:"json",
            success:(dt)=>{
                compteur();
                $('#live').html(dt.live);
            }
        })
    }

    setInterval(display,4000);
    //setInterval(compteur,4000)
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

</html>
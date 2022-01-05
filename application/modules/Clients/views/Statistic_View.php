<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title><?= $this->router->class ?> | MKBY</title>
    <?php include VIEWPATH.'includeClients/head.php' ?>
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/all.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body >
    <!-- ============================================================== -->
                <?php

                foreach($data as $stmt){
                
                $dev =$stmt['devise'];
                 $json1[] =$stmt['transmis'];
                 $json[] = $stmt['dayone'];
                 $json2[] = (int)$stmt['recu'];

                }

                 ?>
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
            <div class="container-fluid">
                <?php if (!$data): ?>
                 
                        
                    <h1 class="text-center mt-5">Aucun statistic disponible pour le moment</h1>
                    
                <?php endif ?>

    <canvas id="myChart"></canvas>


    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->



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
    

    <?php include VIEWPATH.'includeClients/script.php' ?>

    <!--Wave Effects -->
    <!--Menu sidebar -->
    <!--Custom JavaScript -->

    <script src="<?= base_url('js/gis.js') ?>"></script>
</body>
<script>
    // datasets: [{
    //         label: "<?= $month  ?>",
    //         backgroundColor: 'rgb(255, 181, 87)',
    //         borderColor: 'rgba(15, 167, 185,.7)',
    //         data: <?php echo json_encode($json2); ?>,
    //     }
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        // labels: <?php echo json_encode($json); ?>,
            labels  :  <?php echo json_encode($json); ?>,
   
            datasets: [
                    {
                     label               : 'Réception',
                     backgroundColor     : 'rgb(255, 181, 87)',
                     borderColor         : 'rgba(60,141,0.8)',
                    //pointRadius          : false,
                     pointColor          : '#3b8bba',
                     pointStrokeColor    : 'rgba(60,141,188,1)',
                     pointHighlightFill  : '#fff',
                     pointHighlightStroke: 'rgba(60,141,188,1)',
                     data                : <?php echo json_encode($json2); ?>
                    },
                    {
                    label               : 'Transaction',
                    backgroundColor     : 'rgba(173, 161, 244, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    //pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : <?php echo json_encode($json1); ?>
                    },
                ]
    },

    // Configuration options go here
    options: {}
});
</script>



</html>
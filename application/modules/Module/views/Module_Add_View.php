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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">

                            <?php include 'include/breadcrumb.php' ?>
                            
                               <div class="modal-dialog text-center">
                                   <div class="modal-content">
                                       <div class="modal-body">
                                            <h3>Création du groupe</h3>
                                           <form action="" id="formid" name="formid">
                                               <div class="form-group">
                                                   <label for="codeMembre" class="control-label">Code du membre:</label>
                                                   <input type="text" id="codeMembre" name="codeMembre" class="form-control">
                                               </div>
                                               <div class="form-group">
                                                   <label for="Position" class="control-label">Position:</label>
                                                   <input type="text" id="Position" name="Position" class="form-control">
                                               </div>
                                               <div class="form-group">
                                                   <label for="Groupe" class="control-label">Groupe:</label>
                                                   <select name="Groupe" class="form-control" id="Groupe">
                                                       <option value="">---Affectation dans un groupe---</option>
                                                       <?= $groupe ?>
                                                   </select>
                                               </div>
                                               <div class="form-group">
                                                   <label for="decription" class="control-label">Description:</label>
                                                   <textarea name="description" id="description" class="form-control" cols="2" rows="2"></textarea>
                                               </div>
                                           </form>
                                           <button class="btn btn-primary" onclick="save()">Envoyer</button>
                                       </div>
                                   </div>
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
    

     <?php include VIEWPATH.'includeClients/script.php' ?>

    <!--Wave Effects -->
    <!--Menu sidebar -->

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        
            function save(){
                var titre = $('#nom').val();
                var telephone = $('#tel').val();
                var description = $('#description').val();
               
                
                if (titre==""||telephone==""||description=="") {
                    displayChampVide();
                }else{

                        $.ajax({

                            method : "POST",
                            url: "<?= base_url('Manage/add') ?>",
                            data: $('#formid').serializeArray(),
                            success: function(dt){
                                //alert(dt);
                                    const data = dt.split("#");
                                    if (data[2]=='success') {
                                    displaySuccess(data[0], data[1], data[2]);
                                    $("#formid").trigger('reset');

                                    }
                                    else{
                                        displaySuccess(data[0], data[1], data[2]);
                                    }

                    }
                
                });  
                    


            }
            }
    </script>

</body>

</html>
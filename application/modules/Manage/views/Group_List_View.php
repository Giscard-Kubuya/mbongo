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
                              <?php if ($groupe): ?>
                            
                                <div class="table-responsive">
                                  <?php if ($status): ?>
                                    <p><?=$status  ?></p>
                                    <?php else: ?>
                                    <table id="zero_config" class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr class="bg-warning">
                                                <th>#Num</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>Nbr de membres</th>
                                                <th>Télephone</th>
                                                <th>Date création</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reload">
                                            <?= $groupe ?>
                                        </tbody>
                                        <tfoot>
                                            <tr  class="bg-warning">
                                                <th>#Num</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>Nbr de membres</th>
                                                <th>Télephone</th>
                                                <th>Date création</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                     
                                  <?php endif ?>
                                </div>
                            <?php else: ?>
                            <div class="table-responsive">
                              <h1 class="text-center">Vous n'avez aucun groupe </h1>
                            </div>
                          <?php endif ?>
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
            <div class="modal fade" id="membre" >
                <div class="modal-dialog text-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Ajout d'un membre</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <form action="" id="formid" name="formid">
                               <div class="form-group">
                                   <label for="codeMembre" class="control-label">Code du membre:</label>
                                   <p class="help-block" id="voir_name"></p>
                                   <input type="text" id="codeMembre" name="codeMembre" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label for="position" class="control-label">Position:</label>
                                   <input type="text" id="position" name="position" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label for="groupe" class="control-label">Groupe:</label>
                                   <select name="groupe" class="form-control" id="groupe">
                                       <option value="">---Affectation dans un groupe---</option>
                                       <?= $modalGroupe ?>
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label for="description" class="control-label">Description:</label>
                                   <textarea name="description" id="description" class="form-control" cols="2" rows="2"></textarea>
                               </div>
                           </form>
                           <button class="btn btn-primary" onclick="save()">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
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

    <script>
    $(function(){
        $('#codeMembre').change(function(){
            const code = $('#codeMembre').val();
          
            $.ajax({
                url:"<?= base_url('Manage/Manage/check') ?>",
                method:"post",
                data:{code:code},
                dataType:"json",
                success:function(dt){
                    if(code!=""){
                        $('#voir_name').html(dt.exist);
                    }
                    else{
                        $('#voir_name').html("");
                    }
                   
                }
            });
        });    })
      
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        let deleted = (th) => {

            const id = $(th).attr("id");
            loading();
        
            $.ajax({

                    method : "POST",
                    url: "<?=base_url('Manage/delete') ?>",
                    data: {id:id},
                    success: function(dt){
                        //alert(dt);
                            const data = dt.split("#");
                            if (data[2]=='success') {
                            displaySuccess(data[0], data[1], data[2]);
                            $("#mydelete"+id).modal('hide');
                            $("#zero_config").load("#zero_config");

                            }
                            //reload();

            }
        
        });
            
        }

    function save() {
      const codeMembre = $('#codeMembre').val();
      const position = $('#position').val();
      const groupe = $('#groupe').val();
       const description = $('#description').val();

      if(position=="" || groupe==""  || codeMembre=="" || description==""){
       
        displaySuccess('Attention','Tous les champs doivent être remplis','warning');
      }
      else{
      $.ajax({
        url:"<?= base_url('Membre/Membre/Add') ?>",
        type:"post",
        data:{codeMembre:codeMembre,position:position,groupe:groupe,description:description},
        success:function(dt){
          donnees = dt.split('#');
            if(donnees[2]=='success'){
                $('#membre').modal('hide')
                $('#formid').trigger('reset');
                window.location.reload();
            }
            else{
                displaySuccess(donnees[0],donnees[1],donnees[2]);
            }
        
        }
      });
   }

    
        
   }
    </script>

</body>

</html>
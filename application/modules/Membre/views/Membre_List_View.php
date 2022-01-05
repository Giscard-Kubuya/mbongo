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
                <audio id="son" src="<?= base_url() ?>/upload/sonnerie/success.mp3" preload="auto"></audio>
                <audio id="fail" src="<?= base_url() ?>/upload/sonnerie/fail.mp3" preload="auto"></audio>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body">
                              <?php include 'include/breadcrumb.php' ?> 
                              <?php if ($membres): ?>
                            
                                <div class="table-responsive">
                                  
                                    <table id="zero_config" class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr class="bg-warning">
                                                <th>#Num</th>
                                                <th>Noms</th>
                                                <th>Matricule</th>
                                                <th>Position</th>
                                                <th>Intégration</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabid">
                                            <?= $membres ?>
                                        </tbody>
                                        <tfoot>
                                            <tr  class="bg-warning">
                                                <th>#Num</th>
                                                <th>Noms</th>
                                                <th>Matricule</th>
                                                <th>Position</th>
                                                <th>Intégration</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                     
                                 
                                </div>
                            <?php else: ?>
                            <div class="table-responsive">
                              <h1 class="text-center">Vous n'avez aucun membre dans ce groupe </h1>
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
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="modal fade" id="setting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog text-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="card-title">Paramètre du groupe</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       


                       <div class="card">
                                        <form class="form-horizontal" id="send_param" name="send_param">
                                            <div class="card-body">
                                                
                                                <div class="form-group row">
                                                    <label for="nom" class="col-sm-3 text-right control-label col-form-label">Nom du Module</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du Module">
                                                    </div>
                                                    <input type="hidden" name="codeGroupe" id="codeGroupe" value="<?= $groupe ?>">
                                                </div>
                                                <div class="form-group row">
                                                    <label for="montant" class="col-sm-3 text-right control-label col-form-label">Montant</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="montant" id="montant" placeholder="Montant">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="Dev" class="col-sm-3 text-right control-label col-form-label">Devise</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="Dev" id="Dev">
                                                            <option value="">---Selectionnez un devise---</option>
                                                            <?= $dev?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="description" class="col-sm-3 text-right control-label col-form-label">Description du module</label>
                                                    <div class="col-sm-9">
                                                        <textarea id="description" name="description" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top">
                                                <div class="card-body">
                                                    <button class="btn btn-primary">Enregistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                       
                    </div>
                </div>
            </div>





            <div class="modal fade" id="groupSender" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog text-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="card-title">Tranferer le groupe</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       


                       <div class="card">
                                        <form class="form-horizontal" id="send_form" name="send_form">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="code_client" class="col-sm-12 text-enter control-label col-form-label">Ce groupe contient 
                                                        <?php echo ($number<2)?"$number contact":"$number contancts"; ?>

                                                     </label>
                                                   <!--  <div class="col-sm-9">
                                                        <input type="text" name="code_client" class="form-control" id="code_client" placeholder="Code du beneficiaire">
                                                         <span class="help-inline" id="voir_name"></span>
                                                    </div> -->
                                                </div>
                                                <div class="form-group row">
                                                    <label for="amount" class="col-sm-3 text-right control-label col-form-label">Montant</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Montant">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="Devise" class="col-sm-3 text-right control-label col-form-label">Devise</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="Devise" id="Devise">
                                                            <option value="">---Selectionnez un devise---</option>
                                                            <?= $devise ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="message" class="col-sm-3 text-right control-label col-form-label">Attachez un message</label>
                                                    <div class="col-sm-9">
                                                        <textarea id="message" name="message" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mdp" class="col-sm-3 text-right control-label col-form-label">Mot de passe</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="****">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top">
                                                <div class="card-body">
                                                    <button class="btn btn-primary" id="loader">Envoyer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                       
                    </div>
                </div>
            </div>
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
        money();
        setting()
    })
      
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        let deleted = (th) => {

            const id = $(th).attr("id");
            loading();
        
            $.ajax({

                    method : "POST",
                    url: "<?=base_url('Membre/delete') ?>",
                    data: {id:id},
                    success: function(dt){
                        //alert(dt);
                            const data = dt.split("#");
                            if (data[2]=='success') {
                            $("#mydelete"+id).modal('hide');
                            // $("#zero_config").load("#zero_config");
                            window.location.reload()
                            }
                            displaySuccess(data[0], data[1], data[2]);
                            //reload();

            }
        
        });
            
        }
function money() {
    $('#send_form').on('submit',function(e){
      e.preventDefault();
      const code = "<?=$groupe?>";
      const devise = $('#Devise').val();
      const mdp = $('#mdp').val();
      const amount = $('#amount').val();
      const message = $('#message').val();

      if(devise=="" || amount=="" || mdp==""){
        $('#fail')[0].play();
        displaySuccess('Attention','Tous les champs doivent être remplis','warning');
      }
      else{
      $.ajax({
        url:"<?= base_url('Membre/Membre/send') ?>",
        type:"post",
        data:{code:code,devise:devise,mdp:mdp,amount:amount,message:message},
        success:function(dt){
          donnees = dt.split('#');
            if(donnees[2]=='success'){
                $('#son')[0].play();
                $('#transaction').modal('hide')
                $('#send_form').trigger('reset');
                displaySuccess(donnees[0],donnees[1],donnees[2]);
            }
            else{
                $('#fail')[0].play();
                displaySuccess(donnees[0],donnees[1],donnees[2]);
            }
        
        }
      });
   }

    })
        
   }
   function setting() {
    $('#send_param').on('submit',function(e){
      e.preventDefault();

        const montant = $('#montant').val();
        alert($.trim(montant))
      loading()
      $.ajax({
        url:"<?= base_url('Membre/Membre/param') ?>",
        type:"post",
        data:$(this).serializeArray(),
        success:function(dt){
          donnees = dt.split('#');
            if(donnees[2]=='success'){
                $('#send_param').trigger('reset');
                displaySuccess(donnees[0],donnees[1],donnees[2]);
                $('#setting').modal('hide');
                $('#son')[0].play();
            }
            else{
                $('#fail')[0].play();
                displaySuccess(donnees[0],donnees[1],donnees[2]);
            }
        
        }
      });
   
    })
        
   }
    </script>

</body>

</html>
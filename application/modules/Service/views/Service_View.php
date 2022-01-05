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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <audio id="son" src="<?= base_url() ?>/upload/sonnerie/success.mp3" preload="auto"></audio>
                <audio id="fail" src="<?= base_url() ?>/upload/sonnerie/fail.mp3" preload="auto"></audio>
                <!-- ============================================================== -->
                 <div class="row" id="html1">
                    
                </div>
                <div class="row">
                    <!-- Column -->
                  
                

                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <a href="#" data-toggle="modal" data-target="#transaction">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                    <h6 class="text-white">Transaction</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <a href="#" data-toggle="modal" data-target="#versement">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                    <h6 class="text-white">Versement</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <a href="#" data-toggle="modal" data-target="#fast">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                    <h6 class="text-white">Fast repport</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Column -->
                    
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                               
                            </div>
                        </div>
                    </div>
                </div>








<div class="modal fade" id="quick" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php include 'include/breadcrumb.php' ?> 
                <h4 class="card-title">Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>#Num</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Type</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>exemple</td>
                    <td>exemple</td>
                    <td>exemple</td>
                </tr>
            </table>
           <a href="<?= base_url('Clients/Rapport') ?>" class="btn btn-default" >Details</a>
        </div>
    </div>
</div>


    <div class="modal fade" id="transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"    
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           


           <div class="card">
                            <form class="form-horizontal" id="send_form" name="send_form">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="code_client" class="col-sm-3 text-right control-label col-form-label">Code client</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="code_client" class="form-control" id="code_client" placeholder="Code du beneficiaire">
                                             <span class="help-inline" id="voir_name"></span>
                                        </div>
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
                                        <label for="mdp" class="col-sm-3 text-right control-label col-form-label">Mot de passe</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="mdp" id="mdp" placeholder="****">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button class="btn btn-primary" >Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
           
        </div>
    </div>
</div>

<div class="modal fade" id="versement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Versement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           


           <div class="card">
                            <form class="form-horizontal" id="retire_form" name="retire_form">
                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="retire" class="col-sm-3 text-right control-label col-form-label">Montant</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="retire" id="retire" placeholder="Montant">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="DeviseRetrait" class="col-sm-3 text-right control-label col-form-label">Devise</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="DeviseRetrait" id="DeviseRetrait">
                                                <option value="">---Selectionnez un devise---</option>
                                                <?= $devise ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mdpRetrait" class="col-sm-3 text-right control-label col-form-label">Mot de passe</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="mdpRetrait" id="mdpRetrait" placeholder="****">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button class="btn btn-primary">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
        </div>
    </div>
</div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
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

<div class="modal fade" id="fast" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="products-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-offset-4" id="last_action">
                            
                        <div  class="title-all text-center"><h1>Dernier retrait</h1>
                            <p>La dernière transaction que vous avez effectué:</p>
                           
                                <h3><?= $transmit['DATE_RT'] ?></h3>
                                <p><?= $transmit['MATRICULE_CLIENT'] ?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="special-menu text-center">
                            <div class="button-group filter-button-group" id="sohw_transmit">
                               <h1><?= $transmit['MONTANT_TX'] ?><?= $transmit['ABBR_DEVISE'] ?> et a reçu <?= $transmit['MONTANT_RX'] ?><?= $transmit['ABBR_DEVISE'] ?></h1>
                               <p>Facturation: <?= $transmit['FRAIS_TX'] ?><?= $transmit['ABBR_DEVISE'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-offset-4" id="last_action">
                            
                        <div  class="title-all text-center"><h1>Depôt</h1>
                            <p>La dernière reception:</p>
                           
                                <h3><?= $receive['DATE_RT'] ?></h3>
                                <p><?= $receive['MATRICULE_CLIENT'] ?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="special-menu text-center">
                            <div class="button-group filter-button-group" id="sohw_receive">
                               <h1><?= $receive['MONTANT_TX'] ?><?= $receive['ABBR_DEVISE'] ?> et a reçu <?= $receive['MONTANT_RX'] ?><?= $receive['ABBR_DEVISE'] ?></h1>
                               <p>Facturation: <?= $receive['FRAIS_TX'] ?><?= $receive['ABBR_DEVISE'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <a  href="<?= base_url('Service/Rapport') ?>" class="btn btn-block">
              Voir details
        </a>
            </div>
        </div>
      </div>
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
    <audio id="son" src="<?= base_url() ?>/upload/sonnerie/success.mp3" preload="auto"></audio>
    <audio id="fail" src="<?= base_url() ?>/upload/sonnerie/fail.mp3" preload="auto"></audio>
    <script src="<?= base_url('outils_client') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('outils_client') ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    


   
    <script src="<?= base_url('outils_client') ?>/assets/libs/quill/dist/quill.min.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('outils_client') ?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('outils_client') ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('outils_client') ?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="<?= base_url('outils_client') ?>/dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url('outils_client') ?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url('outils_client') ?>/dist/js/pages/chart/chart-page-init.js"></script>
    <script src="<?= base_url() ?>js/sweet.min.js"></script>
    <script src="<?= base_url() ?>js/MyLibrairieJs.js"></script>

    <!--Wave Effects -->
    <!--Menu sidebar -->
    <!--Custom JavaScript -->

</body>
 <script>
        $(function(){
            moneyAgent()
            $('#code_client').change(function(){
            const code = $('#code_client').val();
          
            $.ajax({
                url:"<?= base_url('Service/Service/check') ?>",
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
        });

            displaySolde();
            transfert();
            last_Date();
            money();

        })
        function transfert(){
            $('#transfert').on('click',function(){
                window.location.href="<?= base_url('Service/Service/list')?>"
            })
        }
        
 
  function money() {
    $('#send_form').on('submit',function(e){
      e.preventDefault();
      
      const code_client = $('#code_client').val();
      const devise = $('#Devise').val();
      const mdp = $('#mdp').val();
      const amount = $('#amount').val();
   
      loading()
      $.ajax({
        url:"<?= base_url('Service/Service/send') ?>",
        type:"post",
        data:{code_client:code_client,devise:devise,mdp:mdp,amount:amount},
        success:function(dt){
          let data = dt.split('#');
          if (data[2]=='success') {
            $('#son')[0].play();
            $('#send_form').trigger('reset');
            displaySolde()
          }
          else{
            $('#fail')[0].play();
          }
          displaySuccess(data[0],data[1],data[2])
        
        }
      });
   

    })
        
   }

        function last_Date(){
             $.ajax({
                url:"<?= base_url('Service/Service/last_date') ?>",
                method:"post",
                dataType:"json",
                success:function(dt){
                    //alert(dt.last_transfer)
                    $('#last_transfer').html(dt.last_transfer);
                    $('#last_action').html(dt.last_action);
                    /*if(dt.html==''){
                        $('#sohw_solde').html("Votre compte est vide pour le moment");
                    }
                    else{
                        $('#sohws_solde').html(dt.html);
                    }*/
                }
            });
        }

        function displaySolde(){
           

            $.ajax({
                url:"<?= base_url('Service/show_solde') ?>",
                method:"post",
                dataType:"json",
                success:function(dt){
                        $('#html1').html(dt.htmlSolde);
                    
                }
            });
        }
setInterval(displaySolde, 4000);

function moneyAgent() {
    $('#retire_form').on('submit',function(e){
      e.preventDefault();
      const devise = $('#DeviseRetrait').val();
      const mdp = $('#mdpRetrait').val();
      const amount = $('#retire').val();
      const message = $('#messageRetrait').val();

        loading()
      if(devise=="" || amount=="" || mdp=="" ){
        $('#fail')[0].play();
        displaySuccess('Attention','Tous les champs doivent être remplis','warning');
      }
      else{
      $.ajax({
        url:"<?= base_url('Service/Service/Verser') ?>",
        type:"post",
        data:{devise:devise,mdp1:mdp,amount:amount,message:message},
        success:function(dt){
          donnees = dt.split('#');
            if(donnees[2]=='success'){
                $('#son')[0].play();
                $('#retrait').modal('hide')
                $('#retire_form').trigger('reset');
                displaySuccess(donnees[0],donnees[1],donnees[2]);
                displaySolde()
            }
            else{
                displaySuccess(donnees[0],donnees[1],donnees[2]);
                $('#fail')[0].play();
            }
        
        }
      });
   }

    })
        
   }
    </script>
</html>
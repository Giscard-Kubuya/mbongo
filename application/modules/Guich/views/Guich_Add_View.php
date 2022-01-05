<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->router->class ?> | MKBY</title>
    <?php $this->load->view('include/head.php')?>
</head>
<body>
    <div>
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <?php $this->load->view('include/header_top.php')?>
        <div class="wrapper">
            <?php $this->load->view('include/side_bar.php')?>



            <div id="page-wrapper">
            <!-- insertion du contenu -->

            <!-- DEBUT HEADER -->
                <?php $this->load->view('include/head_title') ?>
            <!-- FIN HEADER -->

            <!-- DEBUT CONTENU -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-blue">
                                <?php $this->load->view('panel_head')?>
                                <div class="panel-body pan">
                                <!-- +++++++++++++++ FORMULAIRE +++++++++++ -->
                                    <div  class="panel panel-grey">
                                      <div class="panel-heading">Créer un guichet</div>
                                        <div class="panel-body pan">
                                            <form id="guichetI" name="guichetI">
                                                <div class="form-body pal">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-icon"><i class="fa fa-user"></i><input id="Guichet" type="text" placeholder="Guichet" name="Guichet" class="form-control" /></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <select id="Responsable" name="Responsable" class="form-control">
                                                                    <option value="">---Responsable---</option>
                                                                    <?= $responsable ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-icon"><i class="fa fa-envelope"></i><input name="Email" id="Email" type="email" placeholder="E-mail" class="form-control" /></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-icon"><i class="fa fa-phone"></i><input name="Phone" id="Phone" type="text" placeholder="Telephone" class="form-control" /></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <select id="Pays" name="Pays" class="form-control">
                                                                    <option value="">---Pays---</option>
                                                                    <?= $pays ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <textarea id="Addr" name="Addr" rows="2" cols="1" placeholder="Province,Ville,Commune,Quartier,Avenue,Rue" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><textarea id="Description" name="Description" rows="5" placeholder="Description de la Tâche" class="form-control"></textarea></div>
                                                    <hr />
                                                    
                                                </div>
                                                <div class="form-actions text-right pal"><button onclick='save()' class="btn btn-primary">Envoyer</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- FIN CONTENU -->

            </div>


            <?php $this->load->view('include/footer.php')?>
        </div>
    </div>
    <?php $this->load->view('include/script.php')?>


    <script type="text/javascript">

            
        
         
function save(){
  $(document).on('submit','#guichetI',function(e){
    e.preventDefault();
    
    $.ajax({
      url:"<?= base_url('Guich/ajout') ?>",
      method:"post",
      data:$(this).serializeArray(),
      success:function(dt){
        let data = dt.split('#');
        if(data[2]=='success'){
          $('#guichetI').trigger('reset');
          displaySuccess(data[0],data[1],data[2]);

        }
        else{
          displaySuccess(data[0],data[1],data[2]);
        }
      }
    });
  });
 }
    </script>

</body>
</html>
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

<audio id="son" src="<?= base_url() ?>/upload/sonnerie/success.mp3" preload="auto"></audio>
<audio id="fail" src="<?= base_url() ?>/upload/sonnerie/fail.mp3" preload="auto"></audio>

            <div id="page-wrapper">
            <!-- insertion du contenu -->

            <!-- DEBUT HEADER -->
                <?php $this->load->view('include/head_title') ?>
            <!-- FIN HEADER -->

            <!-- DEBUT CONTENU -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-green">
                        <!-- +++++++++++++++++++++++ -->
                         <?=$this->load->view('panel_head')?>
                            <div class="panel-body">
                                   <div class="modal-dialog">
                                       <div class="modal-content">
                                           <div class="modal-content">
                                              <div class="modal-body ">
                                                <div class="panel panel-blue">
                                <div class="panel-heading">Charger le système</div>
                                <div class="panel-body pan">
                                    <form id="formId" method="post" name="formId">
                                        <div class="form-body pal">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="Montant" class="control-label">Montant</label>
                                                        <div class="input-icon right"><i class="fa fa-money"></i><input id="Montant" name="Montant" type="text" placeholder="ex@ 10 000 000" class="form-control" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="Devise" class="control-label">Devise</label>
                                                        <div class="input-icon right"><i class="fa fa-globe"></i>
                                                            <select  class="form-control custom-select" name="Devise" id="Devise"><option value="">---Selectionnez un pays---</option>
                                                                <?= $devise ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="Mdp" class="control-label">Mot de passe</label>
                                                        <div class="input-icon right"><i class="fa fa-lock"></i><input id="Mdp" name="Mdp" type="password" placeholder="ex@ ****" class="form-control" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-actions text-right pal">
                                            <button  id="envoyer" class="btn btn-primary pull-right">Envoyer</button>
                                        </div>
                                        <!-- <div class="modal" id="pinModal">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <input type="password" name="Pin" class="form-control" id="Pin">
                                                </div>
                                                <div>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button class="btn btn-primary" id="validate">Valider</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div> -->
                                    </form>
                                </div>
                            </div>

                                              </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                            </div>

                        <!-- ++++++++++++++++++++ -->
                        </div>
                    </div>
                </div>
            <!-- FIN CONTENU -->
            

            </div>


            <?php $this->load->view('include/footer.php')?>
            <?php $this->load->view('include/script.php')?>
            <script src="<?= base_url() ?>/js/vendor/jquery.min.js"></script>
        </div>
    </div>

    <script type="text/javascript">
$(document).ready(function () {

  save();
});



 function save(){
  $(document).on('submit','#formId',function(e){
    e.preventDefault();
    loading()
    $.ajax({
      url:"<?= base_url('Systeme/add') ?>",
      method:"post",
      data:$(this).serializeArray(),
      success:function(dt){
        let data = dt.split('#');
          if(data[2]=='success'){
          $('#formId').trigger('reset');
          displaySuccess(data[0],data[1],data[2]);
          $('#son')[0].play();

        }
        else{
          displaySuccess(data[0],data[1],data[2]);
          $('#fail')[0].play();
        }
      }
    });
  
  });
 }

    </script>
</body>
</html>
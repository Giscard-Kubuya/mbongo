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
                        <div class="panel panel-green">
                        <!-- +++++++++++++++++++++++ -->
                         <?=$this->load->view('panel_head')?>
                            <div class="panel-body">
                                   <div class="modal-dialog">
                                       <div class="modal-content">
                                           <div class="modal-content">
                                              <div class="modal-body ">
                                                <div class="panel panel-blue">
                                <div class="panel-heading">Ajouter un devise</div>
                                <div class="panel-body pan">
                                    <form id="formId" method="post" name="formId">
                                        <div class="form-body pal">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="Devise" class="control-label">Devise(Nom entier)</label>
                                                        <div class="input-icon right"><i class="fa fa-money"></i><input value="<?= $data['NOM_DEVISE'] ?>" id="Devise" name="Devise" type="text" placeholder="ex@ Dollars" class="form-control" /></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="<?= $data['ID_DEVISE'] ?>" name="Id" id="Id">
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="Abbr" class="control-label">Devise en Abbreviation</label>
                                                        <div class="input-icon right"><i class="fa fa-money"></i><input value="<?= $data['ABBR_DEVISE'] ?>" id="Abbr" name="Abbr" type="text" placeholder="ex@ FB ,FC ,$" class="form-control" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="Pays" class="control-label">Pays</label>
                                                        <div class="input-icon right"><i class="fa fa-globe"></i>
                                                            <select  class="form-control custom-select" name="Pays" id="Pays"><option value="<?= $data['CODE_PAYS'] ?>" selected><?= $data['CODE_PAYS'] ?></option>
                                                                <?= $pays ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <button  id="envoyer" class="btn btn-primary pull-right">Envoyer</button>
                                        </div>
                                        <div class="form-actions text-right pal">
                                        </div>
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
  bsCustomFileInput.init();
});

 function save(){
  $(document).on('submit','#formId',function(e){
    e.preventDefault();
    loading()
    $.ajax({
      url:"<?= base_url('Devise/modifier') ?>",
      method:"post",
      data:$(this).serializeArray(),
      success:function(dt){
        let data = dt.split('#');
        if(data[2]=='success'){
          $('#formId').trigger('reset');
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
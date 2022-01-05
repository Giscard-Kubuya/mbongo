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
                                                <div class="col-md-12">
                                                    <div class="form-group"><label for="Devise" class="control-label">Matricule</label>
                                                        <div class="input-icon right"><i class="fa fa-barcode"></i><input id="Matricule" name="Matricule"  type="text" placeholder="ex@ KBY_000" class="form-control" /></div>
                                                    </div>
                                                </div>
                                               <input id="Id" name="Id" type="hidden" value="<?=$data['ID_GESTION'] ?>" />
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                  <p class="help-block text-center" id="voir_name">Click any where to check the matricule</p>
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
$('#Matricule').change(function(){
            const Matricule = $('#Matricule').val();
          
            $.ajax({
                url:"<?= base_url('Gestion/Gestion/check') ?>",
                method:"post",
                data:{Matricule:Matricule},
                dataType:"json",
                success:function(dt){
                    if(Matricule!=""){
                        $('#voir_name').html(dt.exist);
                    }
                    else{
                        $('#voir_name').html("");
                    }
                   
                }
            });
        });
  save();
  bsCustomFileInput.init();
});

 function save(){
  $(document).on('submit','#formId',function(e){
    e.preventDefault();
    loading()
    $.ajax({
      url:"<?= base_url('Gestion/modifier') ?>",
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
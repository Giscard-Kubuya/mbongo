<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->router->class ?> | MKBY</title>
    <?php $this->load->view('include/head.php')?>
</head>
<body>
  <audio id="son" src="<?= base_url() ?>/upload/sonnerie/success.mp3" preload="auto"></audio>
  <audio id="fail" src="<?= base_url() ?>/upload/sonnerie/fail.mp3" preload="auto"></audio>
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
                                <div class="panel-heading">A <?php echo $data['PSEUDO_AGENT']." ".$data['PRENOM_AGENT']." de ".$data['VILLE'] ?></div>
                                <div class="panel-body pan">
                                    <form id="send_form" method="post" name="send_form">
                                        <div class="form-body pal">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="amount" class="control-label">Montant</label>
                                                        <div class="input-icon right"><i class="fa fa-money"></i><input id="amount" name="amount" type="text" placeholder="ex@ 10 000 000" class="form-control" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="inputEmail" class="control-label">Devise</label>
                                                        <div class="input-icon right"><i class="fa fa-envelope"></i>
                                                            <select  class="form-control custom-select" name="devise" id="devise">
                                                                <?= $devise ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="mdp1" class="control-label">Mot de passe</label>
                                                        <div class="input-icon right"><i class="fa fa-clock"></i><input id="mdp1" name="mdp1" type="password" placeholder="*****" class="form-control" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="codeAgent" id="codeAgent" value="<?= $data['CODE_AGENT'] ?>"  >
                                            <div class="form-group">
                                                <label for="attache" class="control-label">Attachez un message</label>
                                                <small class="help-block">Vous pouvez attacher un message à la somme envoyée à <?php echo $data['PSEUDO_AGENT']?> </small>
                                                <textarea rows="2" id="attache" name="attache" class="form-control" placeholder="Facultatif"></textarea>
                                            </div>
                                            
                                            <button  id="envoyer" class="btn btn-primary">Envoyer</button>
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
            <script src="<?= base_url() ?>/js/vendor/jquery.min.js"></script>
        </div>
    </div>

    <script type="text/javascript">
$(function(){
       money()
  
})

  function money() {
    $('#send_form').on('submit',function(e){
      e.preventDefault();
      const codeAgent = $('#codeAgent').val();
      const devise = $('#devise').val();
      const mdp1 = $('#mdp1').val();
      const attache = $('#attache').val();
      const amount = $('#amount').val();
      if (devise==""||mdp1==""||amount=="") {
        displaySuccess('Erreur','Veuillez remplir les champs exigés','error');
        $('#fail')[0].play();
      }
      else{
      $.ajax({
        url:"<?= base_url('Traffic/Traffic/send') ?>",
        type:"post",
        data:{codeAgent:codeAgent,devise:devise,mdp1:mdp1,attache:attache,amount:amount},
       
        success:function(dt){
          data = dt.split('#');
          if (data[2]=='success') {
            $('#send_form').trigger('reset');
            displaySuccess(data[0],data[1],data[2])
            $('#son')[0].play();

          }
            else{
              displaySuccess(data[0],data[1],data[2])
              $('#fail')[0].play();
            }
          
        }
      });
   }

    })
        
    }
    </script>
    <?php $this->load->view('include/script.php')?>
</body>
</html>
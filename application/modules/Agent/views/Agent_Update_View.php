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
                                      <div class="panel-heading">Inscrire un agent</div>
                                        <div class="panel-body pan">
                                            <form id="formId" name="formId">
                                                <div class="form-body pal">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-icon"><i class="fa fa-user"></i><input value="<?=$data['PRENOM_AGENT']?>" id="Prenom" type="text" placeholder="Prenom" name="Prenom" class="form-control" /></div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="Id" name="Id" value="<?=$data['ID_AGENT']?>">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-icon"><i class="fa fa-user"></i><input value="<?=$data['PSEUDO_AGENT']?>"  name="Pseudo" id="Pseudo" type="text" placeholder="Pseudo" class="form-control" /></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-icon"><i class="fa fa-envelope"></i><input value="<?=$data['EMAIL_AGENT']?>" name="Email" id="Email" type="email" placeholder="E-mail" class="form-control" /></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-icon"><i class="fa fa-phone"></i><input value="<?=$data['TELEPHONE']?>" name="Phone" id="Phone" type="text" placeholder="Telephone" class="form-control" /></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-md-3">

                                                          <?php if ($data['SEXE_AGENT']=='Femme'): ?>
                                                            <div class="form-group"><select id="Genre" name="Genre" class="form-control">
                                                                    <option>---Sexe---</option>
                                                                    <option selected="" value="<?= $data['SEXE_AGENT'] ?>"><?= $data['SEXE_AGENT'] ?></option>
                                                                    <option value="Homme">Homme</option>
                                                                </select></div>
                                                              <?php else:?>
                                                                <div class="form-group"><select id="Genre" name="Genre" class="form-control">
                                                                    <option>---Sexe---</option>
                                                                    <option  value="<?= $data['SEXE_AGENT'] ?>"><?= $data['SEXE_AGENT'] ?></option>
                                                                    <option selected="" value="<?= $data['SEXE_AGENT'] ?>"><?= $data['SEXE_AGENT'] ?></option>
                                                                </select></div>
                                                              <?php endif ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group"><select id="Pays" name="Pays" class="form-control">
                                                                    <option>---Pays---</option>
                                                                    <option selected="" value="<?= $data['CODE_PAYS_ALPHA3'] ?>"><?= $data['CODE_PAYS_ALPHA3'] ?></option>
                                                                    <?= $pays ?>
                                                                </select></div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group"><select id="Guichet" name="Guichet" class="form-control">
                                                                    <option value="<?= $data['CODE_GUICHET'] ?>">---Guichet---</option>
                                                                    <?= $guichet ?>
                                                                </select></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group"><input name="Ville" value="<?=$data['VILLE']?>" id="Ville" type="text" placeholder="Ville" class="form-control" /></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><textarea id="Description" name="Description" rows="5" placeholder="Description de la Tâche" class="form-control"><?=$data['DESCRIPTION_TACHE_AGENT']?></textarea></div>
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
  $(document).on('submit','#formId',function(e){
    e.preventDefault();
    
    $.ajax({
      url:"<?= base_url('Agent/modifier') ?>",
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
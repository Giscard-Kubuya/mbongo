	<div class="modal fade" id="update1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="card-title"><?= $profil['PSEUDO_CLIENT'] ?> (<?= $profil['MATRICULE_CLIENT'] ?>)</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       


                       <div class="card">
                                        <form class="form-horizontal" enctype="multipart/form-data" id="modif_form" name="modif_form">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="nomP" class="col-sm-3 text-right control-label col-form-label">Nom</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?= $profil['NOM_CLIENT'] ?>" name="nomP" class="form-control" id="nomP">
                                                         <span class="help-inline" id="voir_name"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="prenomP" class="col-sm-3 text-right control-label col-form-label">Prenom</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" value="<?= $profil['PRENOM_CLIENT'] ?>" name="prenomP" class="form-control" id="prenomP">
                                                         <span class="help-inline" id="voir_name"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="emailP" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" value="<?= $profil['EMAIL_CLIENT'] ?>" name="emailP" class="form-control" id="emailP">
                                                        <input type="hidden" value="<?= $profil['CODE_CLIENT'] ?>" name="codeP" class="form-control" id="codeP">
                                                         <span class="help-inline" id="voir_name"></span>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <label for="PaysP" class="col-sm-3 text-right control-label col-form-label">Pays</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="PaysP" id="PaysP">
                                                            <option selected value="<?= $profil['CODE_PAYS_ALPHA3'] ?>"><?= $profil['CODE_PAYS_ALPHA3'] ?></option>
                                                            <?= $pays ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mdpP" class="col-sm-3 text-right control-label col-form-label">Nouveau Mot de passe</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="mdpP" id="mdpP" placeholder="****">
                                                    </div>
                                                </div>
                                                <div id="repeat" class="form-group row">
                                                    <label for="mdpP1" class="col-sm-3 text-right control-label col-form-label">Ancien Mot de passe</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="mdpP1" id="mdpP1" placeholder="****">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                            <div class="border-top">
                                                <div onclick="modifier1()" class="card-body">
                                                    <button class="btn btn-primary">Envoyer</button>
                                                </div>
                                            </div>
                                    </div>
                       
                    </div>
                </div>
            </div>


	
<div class="modal fade" id="showProf" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            
                        <div  class="title-all text-center">
                        	<h1><?= $profil['MATRICULE_CLIENT'] ?>  </h1>
                        	
                            <p><?= $profil['PSEUDO_CLIENT'] ?></p>
                           
                                <h3><?= $profil['NOM_CLIENT'] ?> <?= $profil['PRENOM_CLIENT'] ?></h3>
                                <p class="help-block"><?= $profil['EMAIL_CLIENT'] ?></p>
                            
                        </div>
                    </div>
                </div>
                

            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-offset-4" id="last_action">
                            
                        <div  class="title-all text-center"><h1>Status <span>on</span> </h1>
                            
                           
                               
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- <a  href="<?= base_url('Service/Rapport') ?>" class="btn btn-block">
              Voir details
        </a> -->
            </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function(){
          $('#repeat').hide() 
        $('#mdpP').change(function(){
        
            $('#repeat').show()
        })
    })

</script>
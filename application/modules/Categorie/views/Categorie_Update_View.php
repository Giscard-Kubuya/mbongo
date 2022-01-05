<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page Accueil</title>
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
                                    <form id="formid" class="form-horizontal">
                                        <div class="form-body pal">
                                            <div class="form-group"><label for="nom_cathegorie" class="col-md-2 text-left control-label">Nom de la categorie</label>
                                                <input type="hidden" name="Id" id="Id" value="<?php echo $categorie['ID_CATEGORIE']?>"class="form-control">
                                                <div class="col-md-10">
                                                    <div class="input-icon left">
                                                        <i class="fa fa-list"></i>
                                                        <input id="nom_cathegorie" type="text" name="nom_cathegorie" placeholder='Nom de la categorie' placeholder="" value="<?=$categorie['NOM_CATEGORIE']?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="form-actions pal">
                                            <div class="form-group mbn">
                                                <div class="col-md-offset-2 col-md-6">
                                                    <button type="submit" id="submit_boutton" class="btn btn-primary" onclick='save()'>Enregister</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

            $('#submit_boutton').click(function(e){e.preventDefault()});
        
            function save(){

                const nom_categorie = $("#nom_cathegorie").val().trim();
                loading();
                
                if (nom_categorie =="") {
                    displayChampVide();
                }else{

                        $.ajax({

                            method : "POST",
                            url: "http://localhost/madmin/Categorie/add",
                            data: {nom_categorie:nom_categorie},
                            success: function(dt){
                                //alert(dt);
                                    const data = dt.split("#");
                                    displaySuccess(data[0], data[1], data[2]);
                                    $("#formid").trigger('reset');

                    }
                
                });  
                    


            }
            }
    </script>

</body>
</html>
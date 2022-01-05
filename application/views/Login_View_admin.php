<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?= $this->router->class ?> | MKBY</title>

        <meta name="description" content="Mbongo is a web appli developed by a student of Hope Africa University">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('outils_client') ?>/assets/images/fav.png">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="apple-touch-icon" href="<?=base_url() ?>outils_admin/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?=base_url() ?>outils_admin/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?=base_url() ?>outils_admin/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?=base_url() ?>outils_admin/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?=base_url() ?>outils_admin/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?=base_url() ?>outils_admin/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?=base_url() ?>outils_admin/img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?=base_url() ?>outils_admin/img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?=base_url() ?>outils_admin/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?=base_url() ?>outils_admin/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?=base_url() ?>outils_admin/css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?=base_url() ?>outils_admin/css/themes.css">
        <!-- END Stylesheets -->
      <input type="hidden" name="base_url" id="base_url" value="<?=base_url() ?>">

           <script src="<?=base_url() ?>js/sweet.min.js"></script>
          <script src="<?=base_url() ?>js/MyLibrairieJs.js"></script>

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?=base_url() ?>outils_admin/js/vendor/modernizr.min.js"></script>
    </head>
    <body>
<div class="modal fade" id="connexion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
               

    
            <!-- Login Title -->
            <a href="#" class="pull-right" data-toggle="modal" data-target="#connexion">Connexion</a>
            <div class="login-title text-center">
                <h1><i class="gi gi-flash"></i> <strong>MKBY</strong><br><small><strong>Connexion</strong> </h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
           
                <!-- Login Form -->
              
                <form action="<?=base_url('Login/create_client') ?>" method="POST"  class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" name="USERNAME" id="USERNAME" class="form-control input-lg" placeholder="Pseudo" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="PRENOM" id="PRENOM" class="form-control input-lg" placeholder="Prenom" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <select name="Genre" id="Genre" class="form-control input-lg" required id="">
                                    <option value="">---Sexe---</option>
                                    <option value="1">Femme</option>
                                    <option value="2">Homme</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" name="PASSWORD" id="PASSWORD" class="form-control input-lg" placeholder="Mot de passe" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" name="PASSWORD2" id="PASSWORD2" class="form-control input-lg" placeholder="Repeter Votre Password" required>
                            </div>
                        </div>
                    </div>
         
         

                </form>
                 <div class="form-group">
                       <div class="col-xs-8 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"  id="client" onclick="client()">
                                <!-- <i class="fa fa-angle-right"></i> -->
                                  Inscrire</button>
                        </div>
                    </div>
              
             
           



            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary close" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
        
       

        <div id="login-container" class="animation-fadeIn" >
            <!-- Login Title -->
            <a href="#" class="pull-right" style="font-size: 1.4em;" data-toggle="modal" data-target="#connexion">Céer un compte</a>
            <div class="login-title text-center" style="background-color: rgba(255,168,0,.4);">
                <h1><img src="<?= base_url('outils_client') ?>/assets/images/log.png" alt="homepage" class="light-logo" />
 <strong>MKBY</strong><br><small><strong>Connexion</strong> </h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                <div id="form-login">
                <form action="<?=base_url('Login/do_login_admin') ?>"  method="POST"  class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" name="user" id="user" class="form-control input-lg" placeholder="Pseudo" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" name="mdp" id="mdp" class="form-control input-lg" placeholder="Votre Password" required>
                            </div>
                        </div>
                    </div>
         
         

                </form>
                 <div class="form-group" style="margin-bottom:  10%;">
                       <div class="col-xs-8 text-right">
                            <button type="submit" class="btn btn-sm btn-primary" onclick="seConnect()">
                                <!-- <i class="fa fa-angle-right"></i> -->
                                  Envoyer</button>
                        </div>
                    </div>
                </div>
                <!-- END Login Form -->

            <!-- Footer -->
            <footer class="text-muted text-right">
                <small><span id="year-copy">Sponsored by </span> &copy; <a href="" target="_blank">wasomi.com</a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->



        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->

        <script src="<?=base_url() ?>js/vendor/jquery.min.js"></script>
        <script src="<?=base_url() ?>js/vendor/bootstrap.min.js"></script>
        <!-- <script src="<?=base_url() ?>js/plugins.js"></script> -->
        <!-- <script src="<?=base_url() ?>js/app.js"></script> -->
        <!-- Load and execute javascript code used only in this page -->
        <!-- <script src="<?=base_url() ?>js/pages/login.js"></script> -->
        <!-- <script>$(function(){ Login.init(); });</script> -->

        
       <script type="text/javascript">
        $(document).ready(function(){
            //client();
        })
              function redirection() {
                    //var Chargement=document.getElementById("Chargement");
                    var lecture=0;
                    var id = setInterval(frame, 64);
               // var base=document.getElementById("ba")
                    function frame() {
                        if (lecture == 5) {
                            clearInterval(id);
                            window.open("<?=base_url('frontOffice/Index') ?>", "_self");
                        }
                  else{
                            lecture = lecture+1;

                        }
                    }
            }

             let saved = () => {
                 const message = $("#message").val().trim();
                 const categorie = $("#categorie").val().trim();
                  loading();
                 if (message =="" || categorie=="") {
                     displayChampVide();
                 }else{

                     $.ajax({
                         method : "POST",
                         url: "<?=base_url('Login/send_message') ?>",
                         data: {categorie:categorie,message:message},
                         success: function(dt){
                             //alert(dt);
                                 const data = dt.split("#");
                                   if (data[2]=="success") {
                                     redirection();
                                   }
                                else {
                                  displaySuccess(data[0], data[1], data[2]);
                                   $("#formid").trigger('reset');
                                }

                                 }
                            });
                 }
              }



        function redirectionAdmin() {
                    //var Chargement=document.getElementById("Chargement");
                    var lecture=0;
                    var id = setInterval(frame, 64);
               // var base=document.getElementById("ba")
                    function frame() {
                        if (lecture == 5) {
                            clearInterval(id);
                            window.open("<?=base_url('Utilisateur/Utilisateur') ?>", "_self");
                        }
                  else{
                            lecture = lecture+1;

                        }
                    }
            }


      let seConnect = () => {
     const password = $("#mdp").val().trim();
     const pseudo = $("#user").val().trim();
     
      loading();
     if (pseudo =="" || password=="") {
         displayChampVide();
     }else{

         $.ajax({
             method : "POST",
             url: "<?=base_url('Login/do_login_admin') ?>",
             data: {pseudo:pseudo,password:password},
             success: function(dt){
                 //alert(dt);
                     const data = dt.split("#");
                       if (data[2]=="success") {
                         //redirectionAdmin();
                         window.open("<?=base_url() ?>"+data[1], "_self");
                       }
                    else {
                      displaySuccess(data[0], data[1], data[2]);
                       $("#formid").trigger('reset');
                    }

                     }
                });
     }
  }


  function client(){
    
            
   
     const Password = $("#PASSWORD").val().trim();
     const Pseudo = $("#USERNAME").val().trim();
     const Prenom = $("#PRENOM").val().trim();
     const Genre = $("#Genre").val();
     const Password2 = $("#PASSWORD2").val().trim();
     loading();
         $.ajax({
             method : "POST",
             url: "<?=base_url('Login/create_client') ?>",
             data: {Pseudo:Pseudo,Password:Password,Prenom:Prenom,Password2:Password2,Genre:Genre},
             success: function(dt){
                 
                     const data = dt.split("#");
                       if (data[2]=="success") {
                         displaySuccess(data[0], data[1], data[2]);
                         //window.open("<?=base_url() ?>"+data[1], "_self");
                       }
                    else {
                      displaySuccess(data[0], data[1], data[2]);
                       $("#formid").trigger('reset');
                    }

                     }
                });
     
  }
</script>
<!-- fidsossl -->
    </body>
</html>

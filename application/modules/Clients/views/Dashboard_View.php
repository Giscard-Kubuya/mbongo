<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title><?= $this->router->class ?> | MKBY</title>
    <?php include VIEWPATH.'includeClients/head.php' ?>
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets2/css/all.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body >
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
        <div class="page-wrapper" style="background: #DDCECE;">
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
                  
                 <!-- <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash-100"></i></h1>
                                <h6 class="text-white" id="fc"></h6>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash-multiple"></i></h1>
                                <h6 class="text-white" id="fb">Charts</h6>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash-usd"></i></h1>
                                <h6 class="text-white" id="dol">Charts</h6>
                            </div>
                        </div>
                    </div>   -->
                     <!-- Column -->

                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <a href="#" data-toggle="modal" data-target="#transaction">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-camera-front-variant"></i></h1>
                                    <h6 class="text-white">Transaction</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <a href="#" data-toggle="modal" data-target="#retrait">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-camera-front"></i></h1>
                                    <h6 class="text-white">Retrait</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <a href="#" data-toggle="modal" data-target="#quick">
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
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Minimum et maxima</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- column -->
                                    
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-6" id="received">
                                                
                                            </div>
                                             <div class="col-6" id="sent">
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>








            <div class="modal fade" id="quick" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
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
                                                    <label for="code_client" class="col-sm-3 text-right control-label col-form-label">Code du beneficiaire</label>
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
                                                    <label for="message" class="col-sm-3 text-right control-label col-form-label">Attachez un message</label>
                                                    <div class="col-sm-9">
                                                        <textarea id="message" name="message" class="form-control"></textarea>
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
                                                    <button class="btn btn-primary">Envoyer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                       
                    </div>
                </div>
            </div>

            <div class="modal fade" id="retrait" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="card-title">Retrait</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       


                       <div class="card">
                                        <form class="form-horizontal" id="retire_form" name="retire_form">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="code_agent" class="col-sm-3 text-right control-label col-form-label">Code de l'agent</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="code_agent" class="form-control" id="code_agent" placeholder="Code de l agent">
                                                         <span class="help-inline" id="voir_nameAgent"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="retire" class="col-sm-3 text-right control-label col-form-label">Montant à retirer</label>
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

    <div class="modal fade" id="gestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="card-title">Ouvrir le groupe de gestion</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card">
                            <p id="msg" class="help-block text-center text-info"></p>
                            <form class="form-horizontal" id="formpin" name="formpin">
                                 <div class="card-body">
                                     <div class="form-group row">
                                        <label for="pin" class="col-sm-3 text-left control-label col-form-label">Code Pin</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="pin" id="pin" placeholder="****">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top">
                                                <div class="card-body">
                                                    <button class="btn btn-primary">Ouvrir</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="pinNew">
                                            <form class="form-horizontal" id="form2" name="form2">
                                            <div class="card-body">
                                            <div class="form-group row">
                                            <label for="pin1" class="col-sm-3 text-left control-label col-form-label">Entrez un nobre</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" class="form-control" name="pin1" id="pin1" placeholder="****">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="pin2" class="col-sm-3 text-left control-label col-form-label">Repetez le code PIN</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" class="form-control" name="pin2" id="pin2" placeholder="****">
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                                <div class="border-top">
                                                    <div class="card-body">
                                                        <button onclick="savePin()" class="btn btn-primary">Ouvrir</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="groupeNotific">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-hover table-bordered">
                                    

                                </table>
                            </div>
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
    

     <?php include VIEWPATH.'includeClients/script.php' ?>

    <!--Wave Effects -->
    <!--Menu sidebar -->
    <!--Custom JavaScript -->

</body>
<script>

    $(function(){

        $('#pinNew').hide();
      $.ajax({
        url:"<?= base_url('Clients/Clients/checkPin') ?>",
        method:"post",
        dataType:"json",
        success:function(dt){
           if (dt.status==7) {
            $('#formpin').hide()
            $('#msg').html(dt.noexist)
           }
           else{
            $('#formpin').show()
           }
        }
      })


         $('#code_agent').change(function(){
            const codeAgent = $('#code_agent').val();
          
            $.ajax({
                url:"<?= base_url('Clients/Clients/check') ?>",
                method:"post",
                data:{codeAgent:codeAgent},
                dataType:"json",
                success:function(dt){
                    if(codeAgent!=""){
                        $('#voir_nameAgent').html(dt.existAgent);
                    }
                    else{
                        $('#voir_nameAgent').html("");
                    }
                   
                }
            });
        });
        $('#code_client').change(function(){
            const code = $('#code_client').val();
          
            $.ajax({
                url:"<?= base_url('Clients/Clients/check') ?>",
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

        $('#myTransactions').click(function(){
        window.location.href="<?= base_url('Clients/Clients/Rapport') ?>";
       })
       // $('#retrait').click(function(){
       //  window.location.href="<?= base_url('Client/Client/formAgent') ?>";
       // })
       // $('#rectra').click(function(){
       //  window.location.href="<?= base_url('Client/Client/RettraitRap') ?>";
       // })
        devise();
        money();
        moneyAgent();
        gestion();
        description();
    })

function pin(){

       $('#pinNew').show();
}
function savePin(){
        const pin1 = $('#pin1').val();
        const pin2 = $('#pin2').val();

        loading()
        if (pin1==""||pin2=="") {
            displaySuccess('Erreur','Vous devez remplir ces deux champs','error')
        }else{
            if (pin1!=pin2) {
                displaySuccess('Erreur','Les deux PINs doivent être les mêmes','error')
            }
            else{
                $.ajax({
                    method:"post",
                    url:"<?= base_url('Clients/Clients/New') ?>",
                    // data:$('#form2').serializeArray(),
                    data:{pin1:pin1,pin2:pin2},
                    success:function(dt){
                        donnees = dt.split('#');
                        if(donnees[2]=='success'){
                            $('#son')[0].play();
                            $('#gestion').modal('hide')
                            $('#form2').trigger('reset');
                        }
                        else{
                            $('#fail')[0].play();
                        }
                        displaySuccess(donnees[0],donnees[1],donnees[2]);
                    }
                }); 
           
        }
    }
}
    let devise = function(){
        $.ajax({
            url:"<?= base_url('Clients/Clients/devise') ?>",
                method:"post",
                dataType:"json",
                success:function(dt){
                    $('#html1').html(dt.html);
                     $('#sent').html(dt.sent);
                    $('#received').html(dt.received);
                }
        });
    }


    setInterval(devise,2000);


    function money() {
    $('#send_form').on('submit',function(e){
      e.preventDefault();
      const code_client = $('#code_client').val();
      const devise = $('#Devise').val();
      const mdp = $('#mdp').val();
      const amount = $('#amount').val();
       const message = $('#message').val();
        loading()
      if(devise=="" || amount=="" || mdp=="" || code_client==""){
        $('#fail')[0].play();
        displaySuccess('Attention','Tous les champs doivent être remplis','warning');
      }
      else{
      $.ajax({
        url:"<?= base_url('Clients/Clients/sendToClient') ?>",
        type:"post",
        data:{code_client:code_client,devise:devise,mdp:mdp,amount:amount,message:message},
        success:function(dt){
          donnees = dt.split('#');
            if(donnees[2]=='success'){
                $('#son')[0].play();
                $('#transaction').modal('hide')
                $('#send_form').trigger('reset');
                displaySuccess(donnees[0],donnees[1],donnees[2]);
                devise()
            }
            else{
                $('#fail')[0].play();
                displaySuccess(donnees[0],donnees[1],donnees[2]);
            }
        
        }
      });
   }

    })
        
   }
   function moneyAgent() {
    $('#retire_form').on('submit',function(e){
      e.preventDefault();
      const code_agent = $('#code_agent').val();
      const devise = $('#DeviseRetrait').val();
      const mdp = $('#mdpRetrait').val();
      const amount = $('#retire').val();
      const message = $('#messageRetrait').val();
        loading()
      if(devise=="" || amount=="" || mdp=="" || code_agent==""){
        $('#fail')[0].play();
        displaySuccess('Attention','Tous les champs doivent être remplis','warning');
      }
      else{
      $.ajax({
        url:"<?= base_url('Clients/Clients/Retrait') ?>",
        type:"post",
        data:{code_agent:code_agent,devise:devise,mdp:mdp,amount:amount,message:message},
        success:function(dt){
          donnees = dt.split('#');
            if(donnees[2]=='success'){
                $('#son')[0].play();
                $('#retrait').modal('hide')
                $('#retire_form').trigger('reset');
                displaySuccess(donnees[0],donnees[1],donnees[2]);
                devise()
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

   let gestion = function(){
    $('#formpin').submit(function(e){
        e.preventDefault()
        const pin = $('#pin').val().trim();
        loading()
        
            $.ajax({
                url:"<?= base_url('Clients/Clients/Gestion') ?>",
                method:"post",
                data:$(this).serializeArray(),
                success:function(dt){
                    const data = dt.split('#');
                    if (data[2]=='success') {
                        window.open("<?= base_url() ?>"+data[1],"_self");
                    }
                    else{
                        displaySuccess(data[0],data[1],data[2])
                    }
                }
            })
        
    })
    
   }
   function description(){
    $.ajax({
            url:"<?= base_url('Clients/Clients/Description') ?>",
                method:"post",
                dataType:"json",
                success:function(dt){
                  
                    $('#descSent').html(dt.seen);
                    // $('#fb').html(dt.fb);
                    // $('#dol').html(dt.dol);
                }
    });
   }
   function seen(th){
    $.ajax({
            url:"<?= base_url('Clients/Clients/updateSeen') ?>",
                method:"post",
                dataType:"json",
                success:function(dt){
                  
                }
    });
   }
   $('#zero_config').DataTable();

</script>
</html>
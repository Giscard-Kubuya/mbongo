<!DOCTYPE html>
<html>
<head>
    <title><?= $this->router->class ?> | MKBY</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?= base_url('outils_client') ?>/chat/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('outils_client') ?>/chat/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?= base_url('outils_client') ?>/chat/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url('outils_client') ?>/chat/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">



<!-- Responsive Chat - START -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <h4 class="text-center">Status live <div style="display: inline-block;height: 10px;width: 10px;background-color: green;border-radius: 50%;"></div><div style="display: inline-block;height: 10px;width: 10px;background-color: grey;border-radius: 50%;"></div></h4>
                <div class="col-xs-12 col-md-12">
                                <div class="panel panel-info pb-chat-panel">
                                    <div class="panel panel-heading pb-chat-panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                             
                                                
                                                    <p  class="text-center" style="">Vous êtes en live (<?= date('d/m/Y') ?>)...Dites nous votre soucis!!!</p>
                                                    <p class="text-danger text-center" id="msg"></p> 
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body" id="live">
                                        
                                            
                                        
                                    </div>
                                        <div class="panel-footer">
                                            <div class="row" style="position: fixed;bottom: 0;width: 70%;margin: 10%;">
                                                <form action="" id="formId" name="formId">
                                                    <div class="col-xs-10">
                                                        <textarea id="message" name="message" class="form-control pb-chat-textarea" placeholder="Votre message ici..."></textarea>
                                                    </div>
                                                </form>
                                                <div class="col-xs-2 pb-btn-circle-div">
                                                    <button class="btn btn-primary btn-circle pb-chat-btn-circle" onclick="send()" ><span class="fa fa-chevron-right"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                </div>
                          
                   
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .pb-chat-panel {
        border: none;
        margin-bottom: -5px;
    }

    .pb-chat-panel-heading {
        margin-top: -5px;
    }

    .pb-chat-top-icons {
        margin-top: 4px;
    }

    #support_label {
        color: #999;
    }

    .pb-chat-labels {
        font-size: 15px;
    }

    .pb-chat-labels-right {
        margin-bottom: 0;
        margin-right: 5px;
    }


    .pb-chat-labels-left {
        margin-left: 5px;
    }

    .pb-chat-labels-primary {
        margin-right: 5px;
    }

    .pb-chat-fa-user {
        border: 1px solid blue;
        padding: 5px;
        border-radius: 50%;
    }

    .pb-chat-textarea {
        resize: none;
    }

    .pb-chat-dropdown {
        width: 300px;
    }

    .pb-chat-btn-circle {
        border-radius: 35px;
    }

    .pb-btn-circle-div {
        padding-left: 0px;
        margin-top: 12px;
    }
</style>

<!-- Responsive Chat - END -->

</div>

</body>
</html>


<script>
    $(document).ready(function(){
        $('#message').focus(function(){
            $('#msg').html('')
        })
        display();
    })

    let display  = ()=>{
        $.ajax({
            url:"<?= base_url('Chat/display') ?>",
            type:"post",
            dataType:"json",
            success:(dt)=>{
                $('#live').html(dt.live);
            }
        })
    }

    let send  = ()=>{
      
        $.ajax({
            url:"<?= base_url('Chat/send') ?>",
            type:"post",
            dataType:"json",
            data:$('#formId').serializeArray(),
            success:(dt)=>{
                if (dt.status==1) {
                    $('#formId').trigger('reset');
                    display()
                }else{
                   $('#msg').html(dt.msg)
                }
            }
        })
    }    
    setInterval(display,4000);
</script>
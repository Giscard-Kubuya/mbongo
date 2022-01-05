                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <p id='paM'>UEA-UMS</p>   
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                       
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <div class="dropdown">
                        <p class="dropdown-toggle" id="paM" data-toggle="dropdown"><span class="fa fa-envelope " ></span><span class="caret"></span></p>
                        <ul class="dropdown-menu">
                            <li><a href="#">Messages</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <div class="dropdown">
                        <p class="dropdown-toggle" id="paM" data-toggle="dropdown"><span class="fa fa-bell " ></span><span class="caret"></span></p>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#">Notification</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <div class="dropdown">
                        <p class="dropdown-toggle" id="paM" data-toggle="dropdown"><span class="fa fa-language " ></span><span class="caret"></span></p>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>Languages/switchLang/english"><?= lang('menu_principal_langue_un')?> |</a></li>
                            <li style="margin-right: -5px"><a href="<?php echo base_url(); ?>Languages/switchLang/french"><?= lang('menu_principal_langue_deux')?> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <div class="dropdown" >
                        <p class="dropdown-toggle" id="paM" data-toggle="dropdown"><span class="fa fa-user" ></span><span class="caret"></span></p>
                        <ul class="dropdown-menu" >
                            <li ><a href="<?= base_url('Login/logout') ?>" >Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
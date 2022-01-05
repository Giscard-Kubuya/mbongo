<nav id="sidebar" role="navigation" class="navbar-default navbar-static-side" style="">
                <div class="sidebar-collapse menu-scroll">
                    <ul id="side-menu" class="nav">
                        <li class="user-panel">
                            <div class="thumb"><img src="<?=base_url('outils_client/assets/images/users/10.png')?>" alt="" class="img-circle" /></div>
                            <div class="info">
                                <p><?php echo $this->session->userdata('PSEUDO')." ".$this->session->userdata('PRENOM'); ?></p>
                                <ul class="list-inline list-unstyled">
                                    
                                    <li><a href="#" data-hover="tooltip" title="Mail"><i class="fa fa-envelope"><span class="badge badge-danger" id="msgNot"> </span></i></a></li>
                                   
                                    <li><a href="<?= base_url('Login/deconnexion') ?>" data-hover="tooltip" title="Deconnexion"><i class="fa fa-sign-out"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <li class="<?php if($this->router->class =='Dashboard'){echo 'active';}?>"><a href="<?=base_url('Dashboard')?>"><i class="fa fa-tachometer fa-fw">
                                    <div class="icon-bg bg-orange"></div>
                                </i><span class="menu-title">Tableau De Bord</span></a></li>
                        <li class="<?php if($this->router->class =='Agent'){echo 'active';}?>">
                            <a href="<?=base_url('Agent')?>" ><i class="fa fa-bullhorn fa-fw">
                                    <div class="icon-bg bg-orange"></div>
                                </i><span class="menu-title">Agents</span></a>
                        </li>
                          
                        
                        <li class="<?php if($this->uri->segment(1) =='Solde'){echo 'active';}?>">
                            <a href="<?=base_url('Solde')?>" ><i class="fa fa-bullhorn fa-fw">
                                    <div class="icon-bg bg-orange"></div>
                                </i><span class="menu-title">Solde</span></a>
                        </li>
                        <li class="<?php if($this->uri->segment(1) =='Traffic'){echo 'active';}?>">
                            <a href="<?=base_url('Traffic')?>" ><i class="fa fa-bullhorn fa-fw">
                                    <div class="icon-bg bg-orange"></div>
                                </i><span class="menu-title">Virement agents</span></a>
                        </li>
                        <li class="<?php if($this->uri->segment(1) =='Devise'){echo 'active';}?>">
                            <a href="<?=base_url('Devise')?>" ><i class="fa fa-bullhorn fa-fw">
                                    <div class="icon-bg bg-orange"></div>
                                </i><span class="menu-title">Devises</span></a>
                        </li>
                        <li class="<?php if($this->uri->segment(1) =='Systeme'){echo 'active';}?>">
                            <a href="<?=base_url('Systeme')?>" ><i class="fa fa-bullhorn fa-fw">
                                    <div class="icon-bg bg-orange"></div>
                                </i><span class="menu-title">Systeme</span></a>
                        </li>
                        <li class="<?php if($this->uri->segment(1) =='Guich'){echo 'active';}?>">
                            <a href="<?=base_url('Guich')?>" ><i class="fa fa-bullhorn fa-fw">
                                    <div class="icon-bg bg-orange"></div>
                                </i><span class="menu-title">Guichet</span></a>
                        </li>
                        <li class="<?php if($this->uri->segment(1) =='Gestion'){echo 'active';}?>">
                            <a href="<?=base_url('Gestion')?>" ><i class="fa fa-bullhorn fa-fw">
                                    <div class="icon-bg bg-orange"></div>
                                </i><span class="menu-title">Gestion</span></a>
                        </li>
                    
                    

                        <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>-->
                </ul>
        </div>
    </nav>
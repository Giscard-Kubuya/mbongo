<header class="topbar" data-navbarbg="skin5" style="border-top: 4px solid maroon;font-family: sans-serif;">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?= base_url('Clients') ?>">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url('outils_client') ?>/assets/images/log.png" alt="homepage" class="light-logo" />
                            
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                            
                        <?php if ($this->router->class=='Dashboard'): ?>
                            <img src="<?= base_url('outils_client') ?>/assets/images/admingo.png" alt="homepage" class="light-logo" />
                        <?php elseif($this->router->class=='Service'): ?>
                            <img src="<?= base_url('outils_client') ?>/assets/images/agent.png" alt="homepage" class="light-logo" />
                        <?php else: ?>
                            <img src="<?= base_url('outils_client') ?>/assets/images/client.png" alt="homepage" class="light-logo" />
                        <?php endif ?>
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="<?= base_url('outils_client') ?>/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-backburger font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#"  >
                             <span class="d-md-block"><?= $this->session->userdata('PSEUDO')." ".$this->session->userdata('PRENOM') ?>  (<?= $this->session->userdata('MATRICULE') ?>) </span>  
                            </a>
                           
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
        
    <?php if ($this->session->userdata('CLIENT')): ?>
                        <li class="nav-item ">
    
    <?php 
        $atts = array(
        'width'       => 800,
        'height'      => 600,
        'scrollbars'  => 'yes',
        'status'      => 'yes',
        'resizable'   => 'yes',
        'screenx'     => 0,
        'screeny'     => 0,
        'window_name' => '_blank',
        'data-toggle'=>"tooltip",
        'title'=>"Live chat(22h00)",
        'class'=>"nav-link dropdown-toggle  waves-effect waves-dark"
    );

    echo anchor_popup('Chat/Chat/', '<i class="mdi mdi-message font-24"></i>', $atts); 
    ?> 
                           
                        </li>
                       <li class="nav-item ">
                            <a data-toggle="tooltip" title="Localisations" class="nav-link dropdown-toggle  waves-effect waves-dark" href="<?= base_url('Clients/Localisation') ?>"  aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-map-marker-radius font-24"></i>
                            </a>
                        </li>
    <?php endif; ?>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                            </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" onclick="seen()" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <div id="descSent">
                                                
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                           
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('outils_client') ?>/assets/images/users/11.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                               
                            <?php if ($this->session->userdata('CLIENT')): ?>



                                <?php if ($this->session->userdata('GESTION')): ?>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#gestion"><i class="ti-wallet m-r-5 m-l-5"></i>Management</a>
                                <?php endif ?>

 
                                <a class="dropdown-item" href="#" onclick="addProfil()"><i class="fa fa-user m-r-5 m-l-5"></i> Voir Profil</a>
                                <a class="dropdown-item" onclick="addForm()" href="#"><i class="fa fa-cog m-r-5 m-l-5"></i>Paramètre du profile</a>
                            <?php else: ?>
                                <a class="dropdown-item" href="#" onclick="addProfil()"><i class="fa fa-user m-r-5 m-l-5"></i> Voir Profil</a>
                                <a class="dropdown-item" onclick="addForm()" href="#"><i class="fa fa-cog m-r-5 m-l-5"></i>Paramètre du profile</a>
                            <?php endif; ?>

     
                               
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>


                                <div class="p-l-30 p-10  m-r-5 m-l-5"><a href="<?= base_url('Login/deconnexion') ?>" class="btn btn-sm btn-danger btn-rounded"><i class="fa fa-power-off m-r-5 m-l-5"></i> Deconnexion</a></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
</header>

<div class="modal fade " id="loader" style="width: 40%;margin: auto;"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div  class="modal-dialog text-center modal-dialog-centered" role="document">
    <div  class="modal-content" style="background-color: rgba(0,0,0,.007) ;border:none;">
      <div id="loadloader">
                        
       </div>
    </div>
  </div>
</div>

    
<div id="profil">
</div>
    
    


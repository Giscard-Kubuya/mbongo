<!-- <?php if ($this->router->class): ?>
    
<?php endif ?> -->
<aside class="left-sidebar" data-sidebarbg="skin5" style="background: ;">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('Clients') ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <?php if ($this->session->userdata('CLIENT')=='On'): ?>
                        

                        <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Paramètres </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <?php if ($this->session->userdata('GESTION')): ?>
                                    <li class="sidebar-item"><a href="#" onclick="groupe()" id="groupeNotification" class="sidebar-link"><i class="fa fa-users"></i><span class="hide-menu"> Groupes</span></a></li>
                                <?php else: ?>  
                                    <li class="sidebar-item"><a href="#" onclick="groupe()" id="groupeNotification" class="sidebar-link"><i class="fa fa-users"></i><span class="hide-menu"> Groupes</span></a></li>  
                                <?php endif ?>

                                <li class="sidebar-item"><a href="<?= base_url('Clients/Payement') ?>" class="sidebar-link"><i class="fa fa-mobile"></i><span class="hide-menu"> Payement </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('Clients') ?>/Stat" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Statistic</span></a></li>
                        
                      <?php endif ?>     
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
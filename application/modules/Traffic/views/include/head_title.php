<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">Cathegorie</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url('Accueil')?>">Tableau de bord</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><a href="<?=base_url($this->router->class)?>"><?=$this->router->class?></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">
                        <?php
                            if ($this->router->method=="index") {
                                echo 'Creation';
                            }elseif($this->router->method== 'getOne'){
                                echo 'Modification';
                            }else{
                                echo $this->router->method;
                            }
                        ?>
                        </li>
                    </ol>
                    <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i class="fa fa-angle-down"></i><input type="hidden" name="datestart" /><input type="hidden" name="endstart" /></div>
                    <div class="clearfix"></div>
</div>


    
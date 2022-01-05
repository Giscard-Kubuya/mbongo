<?php if ($this->router->method=='index'): ?>
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tableau de bord</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url($this->router->class) ?>">Actualiser</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    

<?php elseif ($this->router->method=='Rapport'): ?>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Rapport de transaction et virement</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url($this->router->class) ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Rapport</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

<?php endif ?>

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
                        <h4 class="page-title">Rapport de transaction</h4>
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
<?php elseif ($this->router->method=='Rra'): ?>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Rapport de avec agents</h4>
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
<?php elseif ($this->router->method=='Payement'): ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Groupe </h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url($this->router->class) ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Groupe </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($this->router->method=='Localisation'): ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Nos Localisations</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('Clients') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Localisation</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

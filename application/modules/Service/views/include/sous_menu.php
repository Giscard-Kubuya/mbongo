
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Rapport</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php if ($this->router->method=='index'): ?>
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                        <li class="breadcrumb-item"><a href="<?= base_url($this->router->class) ?>/Rapport">Rapport</a></li>
                        <?php elseif($this->router->method=='Rapport'): ?>
                            <li class="breadcrumb-item"><a href="<?= base_url($this->router->class) ?>/Service">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rapport</li>
                        <?php endif ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
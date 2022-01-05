<div class="panel-heading">
    <a href="<?=base_url() ?>Traffic/index" class="  <?php if($this->router->method=="index") echo 'active btn btn-warning' ?>" aria-expanded="false" style="color:white">Liste des agents</a> 
    
    <?php
        if ($this->router->method=="getOne") {
           ?>
            / <a href="#" class="text-default active btn btn-warning" aria-expanded="false" style="color:white">   Transaction</a>
           <?php
        }
    ?>
</div>
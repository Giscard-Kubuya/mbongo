<div class="panel-heading">
    <a href="<?=base_url() ?>Devise/index" class="  <?php if($this->router->method=="index") echo 'active btn btn-warning' ?>" aria-expanded="false" style="color:white">Devises</a> / 
    <a href="<?=base_url() ?>Devise/Creer" class="text-default <?php if($this->router->method=="Creer") echo 'active btn btn-warning' ?> " aria-expanded="false" style="color:white">Créer</a>
    <?php
        if ($this->router->method=="getOne") {
           ?>
            / <a href="#" class="text-default active btn btn-warning" aria-expanded="false" style="color:white">   Modifier</a>
           <?php
        }
    ?>
</div>
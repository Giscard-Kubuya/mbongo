<div class="panel-heading">
    <a href="<?=base_url() ?>Solde/index" class="  <?php if($this->router->method=="index") echo 'active btn btn-warning' ?>" aria-expanded="false" style="color:white">Agents</a> / 
    <a href="<?=base_url() ?>Solde/Client" class="text-default <?php if($this->router->method=="Client") echo 'active btn btn-warning' ?> " aria-expanded="false" style="color:white">Clients</a>
    <?php
        if ($this->router->method=="getOne") {
           ?>
            / <a href="#" class="text-default active btn btn-warning" aria-expanded="false" style="color:white">   Modifier</a>
           <?php
        }
    ?>
</div>
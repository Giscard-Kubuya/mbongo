<div class="panel-heading">
    <a href="<?=base_url() ?>Systeme/index" class="  <?php if($this->router->method=="index") echo 'active btn btn-warning' ?>" aria-expanded="false" style="color:white">Chargement</a> /
    <a href="<?=base_url() ?>Systeme/Entre" class="text-default <?php if($this->router->method=="Entre") echo 'active btn btn-warning' ?> " aria-expanded="false" style="color:white">Entrées</a>/
    
    <a href="<?=base_url() ?>Systeme/Sortie" class="text-default <?php if($this->router->method=="Sortie") echo 'active btn btn-warning' ?> " aria-expanded="false" style="color:white">Sortie</a>
    
</div>
<?php if ($this->router->method=="index"): ?>
	<nav aria-label="breadcrumb">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">Liste</li>
	        <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url($this->router->class) ?>/creer">Créer</a></li>
			<div class="ml-auto text-right">
                <li class="breadcrumb-item"><a data-toggle="tooltip" title="Ajouter un membre"  href="#"><i data-target="#membre" data-toggle="modal" class="fa fa-user-plus fa-lg"></i></a></li>
            </div>
	    </ol>
	</nav>
<?php elseif ($this->router->method=="creer"): ?>
	<nav aria-label="breadcrumb">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">Créer</li>
	        <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url($this->router->class) ?>">Liste</a></li>
	    </ol>

	</nav>
<?php elseif ($this->router->method=="getOne"): ?>
	<nav aria-label="breadcrumb">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">Modifier</li>
	        <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url($this->router->class) ?>/creer">Créer</a></li>
	        <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url($this->router->class) ?>">Liste</a></li>
	    </ol>
	</nav>
<?php endif ?>
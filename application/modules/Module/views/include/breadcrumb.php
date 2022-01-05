<?php if ($this->router->method=="index"): ?>
	<nav aria-label="breadcrumb">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">Liste</li>
	    	<!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('Module/Module/') ?>">Paramètre</a></li> -->
	        <div class="ml-auto text-right">
	        	
	        	<?php if ($membres): ?>
                <li class="breadcrumb-item"><a data-toggle="tooltip" title="Envoyer au groupe"  href="#"><i data-target="#groupSender" data-toggle="modal" class="fa fa-question-circle fa-lg"></i></a></li>
	        	<?php endif ?>
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
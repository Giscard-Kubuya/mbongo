<?php if ($this->router->method=="Rapport"): ?>
	<nav aria-label="breadcrumb">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">Transaction</li>
	        <li class="breadcrumb-item  active" aria-current="page"><a href="<?= base_url($this->router->class) ?>/Rra">Retrait</a></li>
	    </ol>
	</nav>
	<?php elseif ($this->router->method=="Rra"): ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url($this->router->class) ?>/Rapport">Transaction</a></li>
        <li class="breadcrumb-item">Retrait</li>
    </ol>
</nav>
<?php elseif ($this->router->method=="Payement"): ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Groupes</li>
        <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url($this->router->class) ?>/Rapport2">Rapport</a></li>
    </ol>
</nav>
<?php elseif ($this->router->method=="Rapport2"): ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url($this->router->class) ?>/Payement">Groupes</a></li>
        <li class="breadcrumb-item">Rapport</li>
    </ol>
</nav>
<?php endif ?>
<?php if ($this->router->method=="Rapport"): ?>
	<nav aria-label="breadcrumb">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">Transaction</a></li>
        <li class="breadcrumb-item">Versement</li>
	    </ol>
	</nav>
	<?php elseif ($this->router->method=="Versement"): ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Transaction</a></li>
        <li class="breadcrumb-item">Versement</li>
    </ol>
</nav>

<?php endif ?>
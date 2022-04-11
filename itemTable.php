<?php
include_once('functions.php');
function showStrTable($showOneBook){
?>
<div class="row align-items-center">
	<div class="col-1">
		<div class="listBook">
			<p> <? echo $showOneBook['idbook'] ?> </p>
		</div>
   	</div>

	<div class="col-5">
		<div class="listBook">
			<p> <? echo $showOneBook['name'] ?> </p>
		</div>
	</div>

	<div class="col-3">
		<div class="listBook">
			<p> <? echo selectAuthor($showOneBook['idbook']) ?> </p>
		</div>
	</div>

	<div class="col-2">
		<div class="listBook">
	       		<p><? echo $showOneBook['pages'] ?> </p>
		</div>
	</div>

	<div class="col-1">
		<div class="listBook">
	       		<p> <? echo $showOneBook['year'] ?> </p>
		</div>
	</div>
</div>
<? } ?>

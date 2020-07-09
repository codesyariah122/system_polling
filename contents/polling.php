<?php 
require_once 'functions.php';
$framework = json_decode(framework("SELECT * FROM `framework`"));
// var_dump($framework); 
// echo $framework[0]->value."<br/><br/>";
// die;
?>

<div class="row">
	<div class="col s6">
		<h4>Framework List : </h4>

			<ul>
			<?php foreach($framework as $f): ?>
				<input type="hidden" name="lastFramework" value="<?=$_SESSION['framework']?>">
				<li>
					<input class="polling-input with-gap" name="framework" value="<?=$f->framework?>" type="checkbox" id="<?=$f->framework?>" data-value="<?=$f->value?>">
					<label for="<?=$f->framework?>"><?=$f->framework?></label>
				</li>
			<?php endforeach; ?>
<!-- 				<li>
					<button class="polling-btn btn waves-effect waves-light" id="polling-btn">Polling
					    <i class="material-icons right">send</i>
					</button>
				</li> -->
			</ul>			
	</div>


<div id="view-data">
	
</div>
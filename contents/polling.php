<div class="divider"></div>
	<div class="container">
		<div class="divider"></div>
	<?php $id=$_GET['p']; ?>
	  <?php if(isset($_GET['p'])): if($_GET['p'] === $id): ?>
	  	<?php $framework = framework("SELECT * FROM `polling` WHERE `id` = $id")[0]; ?>
	      		<div class="card-panel green accent-2 red-text">
	      			Terimakasih anda sudah memberikan polling untuk framework <b><font color="blue"><?=$framework->framework?></font></b>
	      		</div>
	      	<?php endif; endif;?>

		<div class="row">
	      <div class="col s6">
	      	<h4>Framework favorit anda</h4>
		<?php $data = framework("SELECT * FROM polling");  ?>
	      	<form action="" method="post">
	      		<ul>
	      			<?php foreach($data as $d): ?>
	      			<li>
	      				<input class="with-gap" name="framework" value="<?=$d->id?>" type="radio" id="<?=$d->framework?>"/>
	    				<label for="<?=$d->framework?>"><?=$d->framework?></label>
	      			</li>
	      			<?php endforeach;?>
	      			<li>
	      				  <button class="btn waves-effect waves-light" type="submit" name="polling">Polling
						    <i class="material-icons right">send</i>
						  </button>
	      			</li>
	      		</ul>
	      	</form>
      	   
	      </div>
<?php 
if(isset($_REQUEST['polling'])){
	if(polling($_REQUEST, 'polling') > 0){
		header('Location: index.php?p='.$_REQUEST['framework']);
	}
	$error = true;
}
?>	      
	      <div class="col s6">
	      	<h4>Framework Polling</h4>
	      <?php foreach($data as $p): ?>
	      	<div class="progress blue lighten-4 tooltipped" data-position="top" data-tooltip="Progress bar was at <?=$p->value?> % when tested"></div><span><?=ucwords($p->framework)?></span>
	      	<div class="determinate blue" style="width:<?=$p->value?>%;"><?=$p->value?>%</div>
	      <?php endforeach?>
	      </div>
	    </div>
	</div>


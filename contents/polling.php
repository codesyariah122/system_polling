<?php 
$framework = framework("SELECT * FROM `framework`");
// echo "<pre>";
// var_dump($framework); die();
// echo "</pre>";
?>

<div class="row">
<?php 
if(isset($_GET['p'])):
	$data=$_GET['p']; 
	if($_GET['p'] === $data):
		$frameworkdata = framework("SELECT * FROM `framework` WHERE `framework` = '$data'")[0];
		// echo "<pre>";
		// var_dump($framework); die;
		// echo "</pre>";
?>
<div class="card-panel teal lighten-2">Anda baru saja memberikan polling untuk framework <b><font color="blue"><?=$frameworkdata->framework?></font></b>
</div>
<?php endif;endif;?>
	<div class="col s6">
		<h4>Framework List : </h4>
		<form action="" method="post" id="polling">
			<ul>
			<?php foreach($framework as $f): ?>
				<li>
					<input class="with-gap" name="framework" value="<?=$f->framework?>" type="radio" id="<?=$f->framework?>">
					<label for="<?=$f->framework?>"><?=$f->framework?></label>
				</li>
			<?php endforeach; ?>
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
	if(empty($_REQUEST['framework'])){
		header('Location:index.php');
	}
	if(polling($_REQUEST, 'framework') > 0){
		header('Location:index.php?p='.$_REQUEST['framework']);
	}else{
		header('Location:index.php');
	$error = true;
	}
} 
?>	

	<div class="col s6">
		<h4>Framework Polling</h4>
	<?php foreach($framework as $p): ?>
		<div class="tootltipped progress blue lighten-4" data-position="left" data-tooltip="I am a tooltip"></div><span><?=$p->framework?></span>
		<div class="determinate blue" style="width:<?=$p->value?>%"><?=$p->value?>%
		</div>
	<?php endforeach;?>
	</div>

</div>
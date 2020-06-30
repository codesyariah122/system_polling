<?php 
$framework = json_decode(framework("SELECT * FROM `framework`"));
?>

<div class="row">
<?php 
if(isset($_GET['p'])):
	$data=$_GET['p']; 
	if($_GET['p'] === $data):
		$frameworkdata = framework("SELECT * FROM `framework` WHERE `framework` = '$data'");
		$frameworkdata = json_decode($frameworkdata, true);
		// var_dump($frameworkdata); die;
?>

<div class="card-panel teal lighten-2">Anda baru saja memberikan polling untuk framework <b><font color="blue">
	<?=$frameworkdata[0]['framework']?></font></b>
</div>
<?php endif;endif;?>
	<div class="col s6">
		<h4>Framework List : </h4>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="polling-form">
			<ul>
			<?php foreach($framework as $f): ?>
				<li>
					<input class="with-gap" name="framework" value="<?=$f->framework?>" type="radio" id="<?=$f->framework?>">
					<label for="<?=$f->framework?>"><?=$f->framework?></label>
				</li>
			<?php endforeach; ?>
				<li>
					<button class="btn waves-effect waves-light" type="submit" name="polling" id="polling-btn">Polling
					    <i class="material-icons right">send</i>
					</button>
				</li>
			</ul>
		</form>
	</div>

<?php 
if(isset($_REQUEST['polling'])){
	// var_dump(json_encode($_REQUEST)); die; 
	if(polling($_REQUEST, 'framework') > 0){
		header('Location:index.php?p='.$_REQUEST['framework']);
	}else{
		header('Location:index.php');
	$error = true;
	}
} 
?>	

<div id="view-data">
	
</div>
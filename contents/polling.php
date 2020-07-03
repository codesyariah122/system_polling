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
			<ul>
			<?php foreach($framework as $f): ?>
				<li>
					<input class="polling-input with-gap" name="framework" value="<?=$f->framework?>" type="radio" id="<?=$f->framework?>">
					<label for="<?=$f->framework?>"><?=$f->framework?></label>
				</li>
			<?php endforeach; ?>
				<li>
					<button class="polling-btn btn waves-effect waves-light" id="polling-btn">Polling
					    <i class="material-icons right">send</i>
					</button>
				</li>
			</ul>
	</div>


<div id="view-data">
	
</div>
<?php 
require_once '../functions.php';

if(@$_GET['p'] == 'polling'):
	if(polling($_POST, 'framework') > 0):
		echo "success";
	endif;
else:
$framework = framework("SELECT * FROM `framework`");
$framework = json_decode($framework, true); 
// var_dump($framework); die;
?>

	<div class="col s6">
		<h4>Framework Polling</h4>
	<?php for($i=0; $i <= count($framework[0]); $i++): ?>
		<div class="tootltipped progress blue lighten-4" data-position="left" data-tooltip="I am a tooltip"></div><span><?=$framework[$i]['framework']?></span>
		<div id="progress" class="determinate blue"  aria-valuenow="<?=$framework[$i]['value']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$framework[$i]['value']?>%"><?=$framework[$i]['value']?>%
		</div>
	<?php endfor;?>
	</div>

<?php endif; ?>
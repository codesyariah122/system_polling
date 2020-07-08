<?php 
require_once '../functions.php';
$medal = '<i class="fas fa-fw fa-lg fa-medal blue-text"></i>';
if(@$_GET['p'] == 'polling'):
	if(polling($_POST, 'framework') > 0):
		echo @$_POST['framework'];
	endif;
elseif(@$_GET['p'] == 'reset'):
	resetPolling(@$_POST);
	echo @$_POST['framework'];
else:
$framework = framework("SELECT * FROM `framework`");
$framework = json_decode($framework, true); 
//var_dump($framework); die;
?>

	<div class="col s6">
		<h4>Framework Polling</h4>
	<?php for($i=0; $i <= count($framework[0])-1; $i++): ?>
	<div class="col s5">
		<p class="orange-text">Win : <?php for($j=1; $j <= $framework[$i]['win']; $j++): echo $medal; endfor;?> </p>

	</div>
		<div class="tootltipped progress blue lighten-4" data-position="left" data-tooltip="I am a tooltip"></div>
		<span id="framework" data-name="<?=$framework[$i]['framework']?>">
			<?=$framework[$i]['framework']?>	
		</span>
		<div id="progress" class="determinate blue"  aria-valuenow="<?=$framework[$i]['value']?>" aria-valuemin="0" aria-valuemax="100" value="<?=$framework[$i]['value']?>" style="width: <?=$framework[$i]['value']?>%"><?=$framework[$i]['value']?>%
		</div>
	<?php endfor;?>
	</div>

<?php endif; ?>
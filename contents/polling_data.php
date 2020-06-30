<?php 
require_once '../functions.php'; 
$framework = framework("SELECT * FROM `framework`");
$framework = json_decode($framework, true);
?>
	<div class="col s6">
		<h4>Framework Polling</h4>
	<?php for($i=0; $i<=count($framework[0]); $i++): ?>
		<div class="tootltipped progress blue lighten-4" data-position="left" data-tooltip="I am a tooltip"></div><span><?=$framework[$i]['framework']?></span>
		<div class="determinate blue" style="width:<?=$framework[$i]['value']?>%"><?=$framework[$i]['value']?>%
		</div>
	<?php endfor;?>
	</div>

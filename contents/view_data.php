<?php 
session_start();
require_once '../functions.php';
$medal = '<i class="fas fa-fw fa-lg fa-medal blue-text"></i>';
if(@$_GET['p'] == 'polling'):
	if(!isset($_SESSION['ip']) AND !isset($_SESSION['framework']) ):
		if(polling($_POST, 'framework') > 0):
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			  $ip = $_SERVER['HTTP_CLIENT_IP'];
			  $_SESSION['ip'] = $ip;
			  $_SESSION['framework'] = $_POST['framework'];
			}elseif(!empty($_SERVER['HTTP_X_FOREWARDED_FOR'])){
			  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			  $_SESSION['ip'] = $ip;
			  $_SESSION['framework'] = $_POST['framework'];
			}else{
			  $ip = $_SERVER['REMOTE_ADDR'];
			  $_SESSION['ip'] = $ip;
			  $_SESSION['framework'] = $_POST['framework'];
			}
			echo @$_POST['framework'];
			
		endif;
	else:

		exit();
			
	endif;	

elseif(@$_GET['p'] == 'reset'):
	
	if(!isset($_SESSION['ip']) AND !isset($_SESSION['framework']) ):
		resetPolling(@$_POST);
			echo @$_POST['framework'];
	else:
		exit();
	endif;

else:
$framework = framework("SELECT * FROM `framework`");
$framework = json_decode($framework, true); 
//var_dump($framework); die;
?>



	<div class="col s6">
		<h4>Framework Polling</h4>
	<?php for($i=0; $i <= count($framework[0])-1; $i++): ?>
	<div class="col s5">
		<p class="orange-text">Win :
		 <?php for($j=1; $j <= $framework[$i]['win']; $j++):?> 
		 	<?=$medal ?>
		 <?php endfor; ?>
		</p>

	</div>
	<input type="hidden" name="lastFramework" value="<?=$_SESSION['framework']?>">
		<div class="tootltipped progress blue lighten-4" data-position="left" data-tooltip="I am a tooltip"></div>
		<span class="purple-text" id="framework" data-name="<?=$framework[$i]['framework']?>">
			<?=$framework[$i]['framework']?>	
		</span>
		<div id="progress" class="determinate blue"  aria-valuenow="<?=$framework[$i]['value']?>" aria-valuemin="0" aria-valuemax="100" value="<?=$framework[$i]['value']?>" style="width: <?=$framework[$i]['value']?>%"><?=$framework[$i]['value']?>%
		</div>
	<?php endfor;?>
	</div>

<?php endif; ?>




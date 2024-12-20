<?php
session_start();
require_once '../functions.php';
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$medal = '<i class="fas fa-fw fa-medal"></i>';
if (@$_GET['p'] == 'polling'):
	if (!isset($_SESSION['data']) and !isset($_SESSION['framework'])):
		if (polling($_POST, 'framework') > 0):
			sessionPolling($userAgent, $_POST['framework']);
			echo json_encode(@$_POST['framework']);
		endif;

	else:
		exit();
	endif;


elseif (@$_GET['p'] == 'reset'):
	if (!isset($_SESSION['data']) and !isset($_SESSION['framework'])):
		resetPolling($_POST);
		sessionPolling($userAgent, $_POST['framework']);
		echo @$_POST['framework'];
	else:
		exit();
	endif;
else:
	$framework = framework("SELECT * FROM `framework`");
	$framework = json_decode($framework, true);
	// var_dump($framework); die;

	if (isset($_SESSION['data']) and isset($_SESSION['framework'])):
		echo "Browser = " . $_SESSION['data'] . "<br/>" .
			"Brand Yang Dipilih = " . $_SESSION['framework'];
	else:
		echo "Belum Melakukan Polling";
	endif;
?>

	<div class="col s6">
		<h4>Persentase Polling</h4>

		<?php for ($i = 0; $i <= count($framework) - 1; $i++): ?>
			<div class="col s5">
				<p class="orange-text">Win:
					<?php for ($j = 1; $j <= $framework[$i]['win']; $j++): ?>
						<b class="purple-text"><?= $medal ?></b>
					<?php endfor; ?>
				</p>
			</div>

			<?php if (isset($_SESSION['data']) and isset($_SESSION['framework'])): ?>
				<input type="hidden" name="lastFramework" value="<?= $_SESSION['framework'] ?>">
			<?php endif; ?>

			<div class="tootltipped progress blue lighten-4" data-position="left" data-tooltip="I am a tooltip"></div><span class="red-text"><?= $framework[$i]['framework'] ?></span>
			<div id="progress" class="determinate blue" aria-valuenow="<?= $framework[$i]['value'] ?>" aria-valuemin="0" aria-valuemax="100" value="<?= $framework[$i]['value'] ?>" style="width: <?= $framework[$i]['value'] ?>%"><?= $framework[$i]['value'] ?>%
			</div>
		<?php endfor; ?>
	</div>
<?php endif; ?>
<?php
$framework = json_decode(framework("SELECT * FROM `framework`"));
$highestFrameworks = json_decode(getTopFrameworks(3));

?>

<div class="row">
	<div class="col s6">
		<h4>Brand List : </h4>
		<ul>
			<?php foreach ($framework as $f): ?>
				<?php //$f->value  
				?>
				<li>
					<input class="polling-input with-gap" name="framework" value="<?= $f->framework ?>" type="checkbox" id="<?= $f->framework ?>" data-value="<?= $f->value ?>">
					<label for="<?= $f->framework ?>"><?= $f->framework ?></label>
				</li>
			<?php endforeach; ?>
			<!-- 				<li>
					<button class="polling-btn btn waves-effect waves-light" id="polling-btn">Polling
					    <i class="material-icons right">send</i>
					</button>
				</li> -->
		</ul>
		<div>
			<?php if (!isset($highestFrameworks->error)): ?>
				<h5>Polling Terbanyak:</h5>
				<?php foreach($highestFrameworks as $highestFramework):?>
					<p><?=$highestFramework->framework?>: <?=$highestFramework->value ?></p>
				<?php endforeach; ?>
			<?php else: ?>
				<p>Error: <?= $highestFrameworks->error ?></p>
			<?php endif; ?>
		</div>
	</div>


	<div id="view-data">

	</div>
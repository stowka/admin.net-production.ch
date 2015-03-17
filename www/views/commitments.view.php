<?php
	/**
	 * Default home view
	 * @author Arnaud Colin
	 */
?>

<!doctype html>
<html lang="en_UK">
	<?php includeSection('head') ?>

	<body>
		<div id="wrapper">
			<?php includeSection('sidebar'); ?>

			<div id="page-content-wrapper">
				<h1 class="text-center">
					Commitments
				</h1>
				<?php foreach ($commitments as $lang) { ?>
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<h2 class="text-center">
								<img src="global/img/icons/lightbulb.png" alt="Oops" width="46px">
							</h2>
						</div>

						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<h2 class="text-center">
								<img src="global/img/icons/tools.png" alt="Oops" width="46px">
							</h2>
						</div>

						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<h2 class="text-center">
								<img src="global/img/icons/umbrella.png" alt="Oops" width="46px">
							</h2>
						</div>

						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<h2 class="text-center">
								<img src="global/img/icons/lightning.png" alt="Oops" width="46px">
							</h2>
						</div>
					</div>

					<div class="row">
					<?php foreach ($lang as $commitment) { ?>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<h2 class="text-center">
								<?php echo utf8_encode($commitment->getTitle()); ?>
							</h2>
							<?php $text = str_replace("\n","</li>",str_replace("-", "<li>", $commitment->getDescription())); ?>
							<ul>
								<?php echo utf8_encode($text); ?> </li>
							</ul>
						</div>
					<?php }	?>
					</div>
				<?php }	?>
			</div>
		</div>
	</body>
</html>
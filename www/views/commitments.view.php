<?php
	/**
	 * Default home view
	 * @author Arnaud Colin
	 */
?>

<!doctype html>
<html lang="en_UK">
	<?php includeSection('head'); ?>
	<body>
		<div id="wrapper">
			<?php includeSection('sidebar'); ?>

			<div id="page-content-wrapper">
				<h1 class="text-center">
					Commitments
				</h1>
				<ul class="nav nav-tabs">
					<li role="presentation" class="active" id="link-fr_CH">
						<a href="#">
							Français
						</a>
					</li>

					<li role="presentation" id="link-en_UK">
						<a href="#">
							English
						</a>
					</li>
				</ul>

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

				<?php foreach ($commitments as $lang) { ?>
				<form id="form-<?php echo $lang[0]->getLanguage()->getId();?>" method="POST" action="./">
					<div class="row" id="<?php echo $lang[0]->getLanguage()->getId();?>">
					<?php foreach ($lang as $commitment) { ?>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<h2 class="text-center">
								<?php echo utf8_encode($commitment->getTitle()); ?>
							</h2>

							<textarea rows="6" name="description" class="form-control"><?php echo utf8_encode($commitment->getDescription()); ?></textarea>
							<?php $text = str_replace("\n","</li>",str_replace("-", "<li>", $commitment->getDescription())); ?>
						</div>
					<?php }	?>
					</div>
					<hr>
					<button type="submit" class="btn btn-info text-center">Save</button>
				</form>
				<?php }	?>
			</div>
		</div>
		<?php includeSection('commitments-js');?>
	</body>
</html>
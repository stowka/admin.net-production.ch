<?php
	/**
	 * Default home view
	 * @author Antoine De Gieter
	 */
?>

<!doctype html>
<html lang="en_UK">
	<?php includeSection('head') ?>

	<body>
		<div id="wrapper">
			<?php includeSection('sidebar'); ?>

			<div id="page-content-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>
								Team
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
							<?php foreach ($team as $lang) { ?>
							<form id="form-<?php echo $lang[0]->getLanguage()->getId();?>" method="POST" action="./">
								<div class="row" id="<?php echo $lang[0]->getLanguage()->getId();?>">
									<?php foreach ($lang as $member) { ?>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<h2 class="text-center">
												<?php echo utf8_encode($member->getName());?>
											</h2>
											<input type="text" class="form-control" placeholder="Position" value="<?php echo utf8_encode($member->getPosition());?>"/><br>
											<textarea rows="8" name="description" class="form-control"><?php echo utf8_encode($member->getBiography());?></textarea>
										</div>
									<?php } ?>
								</div>
								<hr>
								<button type="submit" class="btn btn-info text-center">Save</button>
							</form>
						<?php }	?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php includeSection('commitments-js');?>
	</body>
</html>
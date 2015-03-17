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
				<h1>
					Commitments
				</h1>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<h2 class="text-center">
							<img src="global/img/icons/lightbulb.png" alt="Oops" width="46px"><br><br>
						<?php
							echo $commitments[0]->getTitle();
						?>
						</h2>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<h2 class="text-center">
							<img src="global/img/icons/tools.png" alt="Oops" width="46px"><br><br>
						<?php
							echo $commitments[1]->getTitle();
						?>
						</h2>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<h2 class="text-center">
							<img src="global/img/icons/umbrella.png" alt="Oops" width="46px"><br><br>
						<?php
							echo $commitments[2]->getTitle();
						?>
						</h2>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<h2 class="text-center">
							<img src="global/img/icons/lightning.png" alt="Oops" width="46px"><br><br>
						<?php
							echo $commitments[3]->getTitle();
						?>
						</h2>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
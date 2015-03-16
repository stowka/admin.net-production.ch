<?php
	/**
	 * Default home view
	 * @author Antoine De Gieter
	 */
?>

<!doctype html>
<html lang="<?php displayLanguage(); ?>">
	<?php includeSection('head') ?>

	<body>
		<?php includeSection('menu'); ?>

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>
						Start here...
					</p>
				</div>
			</div>
		</div>

		<?php includeSection('footer') ?>
	</body>
</html>
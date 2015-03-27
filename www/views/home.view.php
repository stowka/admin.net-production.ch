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
			<?php includeSection('menu'); ?>
            <br>
            <br>

			<div id="page-content-wrapper" class="container">
				<h1 class="text-center">
					Home
				</h1>
				<p>
					<form action="./?page=home" method="POST" role="form">
						<legend>Edit home page text</legend>
					
						<div class="form-group">
							<label for="">Text</label>
							<textarea placeholder="A wee bit of text mate" class="form-control"></textarea>
						</div>
					
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</p>

				<p>
					<form action="./?page=home" method="POST" role="form">
						<legend>Carousel</legend>
					
						<div class="form-group">
							<label for="image">Insert a picture into the carousel</label>
							<input type="file" class="" id="image"><br>
							<input type="text" class="form-control" id="text" placeholder="Description">
						</div>
					
						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</p>

				<?php for($i = 1; $i < 8; $i += 1): ?>
					<img class="img-thumbnail" src="global/img/logos/logo-xl.png" id="" alt="" width="15%">
					<?php if ($i % 4 == 0): ?>
						<br><br>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
		</div>
	</body>
</html>
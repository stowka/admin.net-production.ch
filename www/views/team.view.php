<?php
	/**
	 * Default home view
	 * @author Antoine De Gieter
	 */
?>

<!doctype html>
<html lang="en_UK">
	<?php includeSection('head') ?>
    <script type="text/javascript" src="global/js/ajax-add-team.js"></script>  
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
							<br>
							<?php foreach ($team as $lang) { ?>
							<form id="form-<?php echo $lang[0]->getLanguage()->getId();?>" method="POST" action="./">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTeamModal-<?php echo $lang[0]->getLanguage()->getId();?>">&plus;</button>
								<div class="row" id="<?php echo $lang[0]->getLanguage()->getId();?>">
									<?php foreach ($lang as $member) { ?>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<h2 class="text-center">
												<?php echo $member->getName();?>
											</h2>
											<input type="text" class="form-control" placeholder="Position" value="<?php echo $member->getPosition();?>"/><br>
											<textarea rows="8" name="description" class="form-control"><?php echo $member->getBiography();?></textarea>
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

		<div class="modal fade" id="addTeamModal-fr_CH" tabindex="-1" role="dialog" aria-labelledby="Modal form to add project" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Ajouter un nouveau membre</h3>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name-field-fr" class="control-label">Nom</label>
                                <input id="name-field-fr" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="biography-field-fr" class="control-label">Biographie</label>
                                <textarea id="biography-field-fr" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="position-field-fr" class="control-label">Poste</label> 
                                <input id="position-field-fr" type="text" class="form-control" />
                            </div>
                            <input id="language-select-fr" type="hidden" value="fr_CH"/>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button id="add-button-fr" type="button" class="btn btn-success">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addTeamModal-en_UK" tabindex="-1" role="dialog" aria-labelledby="Modal form to add project" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Add new member</h3>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name-field-en" class="control-label">Name</label>
                                <input id="name-field-en" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="biography-field-en" class="control-label">Biography</label>
                                <textarea id="biography-field-en" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="position-field-en" class="control-label">Position</label> 
                                <input id="position-field-en" type="text" class="form-control" />
                            </div>
                            <input id="language-select-en" type="hidden" value="en_UK"/>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button id="add-button-en" type="button" class="btn btn-success">Add</button>
                    </div>
                </div>
            </div>
        </div>

		<?php includeSection('commitments-js');?>
	</body>
</html>
<?php
	/**
	 * Default home view
	 * @author Antoine De Gieter
	 */
?>

<!doctype html>
<html lang="en_UK">
	<?php includeSection('head') ?>
    <script type="text/javascript" src="global/js/ajax-add-partner.js"></script>  
    <script type="text/javascript" src="global/js/ajax-delete-partner.js"></script>  
	<body>
		<div id="wrapper">
			<?php includeSection('menu'); ?>
            <br>
            <br>

			<div id="page-content-wrapper" class="container">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1 class="text-center">
								Partenaires
							</h1>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPartnerModal">&plus;</button>
							<p>
							<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Nom</th>
											<th>Url</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($partners as $partner): ?>
											<tr>
												<td><?php echo $partner->getName();?></td>
												<td><?php echo $partner->getUrl();?></td>
												<td>
													<button class="btn btn-danger delete" type="button" value="<?=$partner->getId()?>">&times;</button>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="addPartnerModal" tabindex="-1" role="dialog" aria-labelledby="Modal form to add partner" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Ajouter un nouveau partenaire</h3>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name-field" class="control-label">Nom</label>
                                <input id="name-field" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="url-field" class="control-label">Url</label>
                                <input id="url-field" type="text" class="form-control" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button id="add-button" type="button" class="btn btn-success">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>
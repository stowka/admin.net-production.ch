<?php
	/**
	 * Default home view
	 * @author Antoine De Gieter
	 */
?>

<!doctype html>
<html lang="en_UK">
	<?php includeSection('head') ?>
    <script type="text/javascript" src="global/js/ajax-change-public-private.js"></script>
    <script type="text/javascript" src="global/js/ajax-delete-project.js"></script>  
    <script type="text/javascript" src="global/js/ajax-add-project.js"></script>  
    <script type="text/javascript" src="global/js/ajax-upload-picture-project.js"></script>
    <script type="text/javascript" src="global/js/ajax-remove-picture-project.js"></script>

	<body>
		<div id="wrapper">
			<?php includeSection('sidebar'); ?>

			<div id="page-content-wrapper">
                <h1>
                    Projects
                </h1>
                
                <!-- add tab for english / french view -->
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active" id="link-fr_CH">
                        <a href="#">Fran&ccedil;ais</a>
                    </li>
                    
                    <li role="presentation" id="link-en_UK">
                        <a href="#">English</a>
                    </li>
                </ul>
                
                
                <!-- modal form to add project fr-->
                
                <div class="modal fade" id="addProjectModalFr" tabindex="-1" role="dialog" aria-labelledby="Modal form to add project" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Ajouter un nouveau projet</h3>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="title-field-fr" class="control-label">Titre</label>
                                        <input id="title-field-fr" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="description-field-fr" class="control-label">Description</label>
                                        <textarea id="description-field-fr" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Public ?</label> <input type="checkbox" id="public-checkbox-fr" checked/>
                                    </div>
                                    <div class="form-group">
                                        <label for="url-field-fr" class="control-label">URL</label>
                                        <input id="url-field-fr" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Type</label>
                                        <select id="type-select-fr" class="form-control">
                                            <?php foreach($typesFr as $item):?>
                                                <option value="<?=$item->getId()?>"><?=$item->getLabel()?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <input id="language-select-fr" type="hidden" value="fr_CH"/>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                <button id="add-button-fr" type="button" class="btn btn-success">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end modal -->

                <!-- modal form to add project en-->
                
                <div class="modal fade" id="addProjectModalEn" tabindex="-1" role="dialog" aria-labelledby="Modal form to add project" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Add new project</h3>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="title-field-en" class="control-label">Title</label>
                                        <input id="title-field-en" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="description-field-en" class="control-label">Description</label>
                                        <textarea id="description-field-en" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Public ?</label> <input type="checkbox" id="public-checkbox-en" checked/>
                                    </div>
                                    <div class="form-group">
                                        <label for="url-field-en" class="control-label">URL</label>
                                        <input id="url-field-en" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Type</label>
                                        <select id="type-select-en" class="form-control">
                                            <?php foreach($typesEn as $item):?>
                                                <option value="<?=$item->getId()?>"><?=$item->getLabel()?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <input id="language-select-en" type="hidden" value="en_UK"/>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button id="add-button-en" type="button" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end modal -->


                <div id="div-fr_CH">

                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-primary"
                 data-toggle="modal" data-target="#addProjectModalFr">&plus;</button>


                <?php foreach ($typesFr as $item):?>
        
               <div class="table-responsive">
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="15%"/>
                            <col width="50%"/>
                            <col width="15%"/>
                            <col width="10%"/>
                            <col width="10%"/>
                        </colgroup>

                        <caption><?=$item->getLabel()?></caption>
                        
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Public ?</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach($projectsFr[$item->getId()] as $project):?>
                            <tr id="<?=$project->getId()?>">
                                <td><?=$project->getTitle()?></td>
                                <td><?=$project->getDescription()?></td>
                                <?php if($project->isPublic()):?>
                                    <td><input class="update" type="checkbox" value="<?=$project->getId()?>" checked/></td>
                                <?php else: ?>
                                    <td><input class="update" type="checkbox" value="<?=$project->getId()?>"/></td>
                                <?php endif ?>
                                
                                <?php $picture = $project->getPicture(); ?>
                                <?php if(empty($picture)): ?>
                                    <td>
                                        <input id="file-select-<?=$project->getId()?>" type="file"/>
                                        <button class="upload-button" value="<?=$project->getId()?>">Upload!</button>
                                    </td>
                                <?php else: ?>
                                    <td>
                                        <img width="50px" src="global/img/uploads/projects/<?=$project->getId()?>.png"/>
                                        <button class="btn glyphicon glyphicon-remove delete-button" value="<?=$project->getId()?>"></button>
                                    </td>
                                <?php endif; ?>

                                <td><button class="btn btn-danger delete" type="button" value="<?=$project->getId()?>">&times;</button></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    
                    </table>
                </div>

                <?php endforeach; ?>
                
                </div>

                <div id="div-en_UK">
                
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-primary"
                 data-toggle="modal" data-target="#addProjectModalEn">&plus;</button>


                <?php foreach ($typesEn as $item):?>
        
               <div class="table-responsive">
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="15%"/>
                            <col width="50%"/>
                            <col width="15%"/>
                            <col width="10%"/>
                            <col width="10%"/>
                        </colgroup>

                        <caption><?=$item->getLabel()?></caption>
                        
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Public ?</th>
                                <th>Picture</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach($projectsEn[$item->getId()] as $project):?>
                            <tr id="<?=$project->getId()?>">
                                <td><?=$project->getTitle()?></td>
                                <td><?=$project->getDescription()?></td>
                                <?php if($project->isPublic()):?>
                                    <td><input class="update" type="checkbox" value="<?=$project->getId()?>" checked/></td>
                                <?php else: ?>
                                    <td><input class="update" type="checkbox" value="<?=$project->getId()?>"/></td>
                                <?php endif; ?>
                                
                                <?php $picture = $project->getPicture(); ?>
                                <?php if(empty($picture)): ?>
                                    <td>
                                        <input id="file-select-<?=$project->getId()?>" type="file"/>
                                        <button class="upload-button" value="<?=$project->getId()?>">Upload!</button>
                                    </td>
                                <?php else: ?>
                                    <td>
                                        <img width="50px" src="global/img/uploads/projects/<?=$project->getId()?>.png"/>
                                        <button class="btn glyphicon glyphicon-remove delete-button" value="<?=$project->getId()?>"></button>
                                    </td>
                                <?php endif; ?>
                                <td><button class="btn btn-danger delete" type="button" value="<?=$project->getId()?>">&times;</button></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    
                    </table>
                </div>

                <?php endforeach; ?>
                
                </div>


			</div>
		</div>

        <script type="text/javascript" charset="utf-8" async defer>
            
            $("#div-fr_CH").show();
            $("#div-en_UK").hide();

            $("#link-en_UK").click(function(){
                $("#div-fr_CH").hide();
                $("#div-en_UK").show();

                $("#link-en_UK").addClass('active');
                $("#link-fr_CH").removeClass('active');
            });

            $("#link-fr_CH").click(function(){
                $("#div-en_UK").hide();
                $("#div-fr_CH").show();

                $("#link-en_UK").removeClass('active');
                $("#link-fr_CH").addClass('active');
            });
        </script>
	</body>
</html>

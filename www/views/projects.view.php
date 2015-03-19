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

	<body>
		<div id="wrapper">
			<?php includeSection('sidebar'); ?>

			<div id="page-content-wrapper">
                <h1>
                    Projects
                </h1>
                
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-primary"
                 data-toggle="modal" data-target="#addProjectModal">&plus;</button>
                
                <!-- modal form to add project -->
                
                <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="Modal form to add project" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Add new project</h3>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="title-field" class="control-label">Title</label>
                                        <input id="title-field" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="description-field" class="control-label">Description</label>
                                        <textarea id="description-field" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Public ? <input type="checkbox" id="public-checkbox"/></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="url-field" class="control-label">URL</label>
                                        <input id="url-field" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Type</label>
                                        <select class="form-control">
                                            <?php foreach($types as $item):?>
                                                <option value="<?=$item->getId()?>"><?=$item->getLabel()?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Language</label>
                                        <select class="form-control">
                                            <?php foreach($languages as $language):?>
                                                <option value="<?$language->getId()?>"><?=$language->getLabel()?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end modal -->

                <?php foreach ($types as $item):?>
        
               <div class="table-responsive">
                    <table class="table">
                        <colgroup>
                            <col width="20%"/>
                            <col width="50%"/>
                            <col width="20%"/>
                            <col width="10%"/>
                        </colgroup>

                        <caption><?=utf8_encode($item->getLabel())?></caption>
                        
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Public ?</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach($projects[$item->getId()] as $project):?>
                            <tr id="<?=$project->getId()?>">
                                <td><?=utf8_encode($project->getTitle())?></td>
                                <td><?=utf8_encode($project->getDescription())?></td>
                                <?php if($project->isPublic()):?>
                                    <td><input type="checkbox" value="<?=$project->getId()?>" checked/></td>
                                <?php else: ?>
                                    <td><input type="checkbox" value="<?=$project->getId()?>"/></td>
                                <?php endif ?>
                                <td><button class="btn btn-danger delete" type="button" value="<?=$project->getId()?>">&times;</button></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    
                    </table>
                </div>

                <?php endforeach; ?>

			</div>
		</div>
	</body>
</html>

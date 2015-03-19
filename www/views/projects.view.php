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

                <br />
                <button title="Add new project" type="button" class="btn
                    btn-primary">&plus;</button>
                <br />    

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
                                <td><button class="btn btn-danger" type="button" value="<?=$project->getId()?>">&times;</button></td>
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

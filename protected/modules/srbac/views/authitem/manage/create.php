<div class="title"><?php echo $this->module->tr->translate('srbac','Create New Item') ?></div>

<?php echo $this->renderPartial('manage/_form', array(
	'model'=>$model,
	'update'=>false,
), false, true); ?>
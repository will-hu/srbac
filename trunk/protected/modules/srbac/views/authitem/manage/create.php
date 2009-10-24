<div class="title"><?php echo Helper::translate('srbac','Create New Item') ?></div>

<?php echo $this->renderPartial('manage/_form', array(
	'model'=>$model,
	'update'=>false,
), false, true); ?>
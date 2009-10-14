<div class="title"><?php  ?></div>

<?php echo $this->renderPartial('manage/_form', array(
	'model'=>$model,
	'update'=>true,
), false, true); ?>
<div>
<?php
$this->renderPartial("frontpage", array('images'=>$images));

$tabs = array(
    'tab1'=>array(
          'title'=>Helper::translate('srbac','Users'),
          'view'=>'tabViews/roleToUser',
    ),
    'tab2'=>array(
          'title'=>Helper::translate('srbac','Roles'),
          'view'=>'tabViews/taskToRole',
    ),
    'tab3'=>array(
          'title'=>Helper::translate('srbac','Tasks'),
          'view'=>'tabViews/operationToTask',
    ),
);

$this->widget('system.web.widgets.CTabView',
  array('tabs'=>$tabs,
        'viewData'=>array('model'=>$model,'userid'=>$userid,'message'=>$message,'data'=>$data),
        'cssFile'=>$this->module->css,
      ));
?>
</div>
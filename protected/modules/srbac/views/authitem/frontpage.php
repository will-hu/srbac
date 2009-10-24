<div class="marginBottom">
    <div class="iconBox">
    <?php echo CHtml::link(
            CHtml::image($this->module->imagesPath.'/manageAuth.png',
                    $this->module->tr->translate('srbac','Managing auth items'),
                    array('class'=>'icon',
                      'title'=>$this->module->tr->translate('srbac','Managing auth items'),
                      'border'=>0
                      )
                ),
            array('authitem/manage/manage'))
    ?>
    </div>
    <div class="iconBox">
    <?php echo CHtml::link(
            CHtml::image($this->module->imagesPath.'/usersAssign.png',
                    $this->module->tr->translate('srbac','Assign to users'),
                    array('class'=>'icon',
                      'title'=>$this->module->tr->translate('srbac','Assign to users'),
                      'border'=>0,
                      )
                ),
            array('authitem/assign'));?>
    </div>
    <div class="iconBox">
    <?php echo CHtml::link(
            CHtml::image($this->module->imagesPath.'/users.png',
                    $this->module->tr->translate('srbac','User\'s assignments'),
                    array('class'=>'icon',
                      'title'=>$this->module->tr->translate('srbac','User\'s assignments'),
                      'border'=>0
                      )
                ),
            array('authitem/assignments'));?>
    </div>
    <div class="reset"></div>
</div>
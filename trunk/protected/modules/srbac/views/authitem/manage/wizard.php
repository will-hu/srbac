<div id="wizardMain" style="margin:10px">
  <table width="100%">
    <tr valign="top">
      <td width="40%">
        <table class="srbacDataGrid" width="40%" align="left">
          <tr>
            <th width="80%"><?php echo $this->module->tr->translate('srbac','Controller')?></th>
            <th colspan="2"><?php echo $this->module->tr->translate('srbac','Actions')?></th>
          </tr>
          <?php $prevModule = ""; ?>
          <?php foreach ($controllers as $n=>$controller) { ?>
            <?php if(substr_count($controller, "/")) { ?>
              <?php $module = split("/", $controller); ?>
              <?php if($module[0] != $prevModule) { ?>        
                      <tr>
                        <th colspan="3">
                            <?php echo $this->module->tr->translate('srbac','Module').": ".  $module[0]?></th>
                      </tr>
                <?php $prevModule = $module[0]; ?>
              <?php }?>
            <?php } ?>

          <tr>
            <td width="80%"><?php echo $controller ?></td>
            <td>
                <?php
                echo CHtml::ajaxLink(
                CHtml::image($this->module->imagesPath.'/wizard.png',
                "Autocreate Auth Items for controller ".$controller,
                array('border'=>0,'title'=>
                $this->module->tr->translate('srbac',
                    'Scanning for Auth Items for controller').' '.$controller))  ,
                array('scan','controller'=>$controller),
                array(
                'type'=>'POST',
                'update'=>'#controllerActions',
                'beforeSend' => 'function(){
                      $("#controllerActions").addClass("srbacLoading");
                  }',
                'complete' => 'function(){
                      $("#controllerActions").removeClass("srbacLoading");
                  }',
                ),array('name'=>'buttonScan_'.$n))
                ?>
            </td>
            <td>
                <?php
                echo CHtml::ajaxLink(
                CHtml::image($this->module->imagesPath.'/delete.png',
                "Delete All Auth Items of controller ".$controller,
                array('border'=>0,'title'=>
                $this->module->tr->translate('srbac',
                    'Delete All Auth Items of controller').' '.$controller))  ,
                array('scan','controller'=>$controller,'delete'=>true),
                array(
                'type'=>'POST',
                'update'=>'#controllerActions',
                'beforeSend' => 'function(){
                      $("#controllerActions").addClass("srbacLoading");
                  }',
                'complete' => 'function(){
                      $("#controllerActions").removeClass("srbacLoading");
                  }',
                ),array('name'=>'buttonDelete_'.$n))
                ?>
            </td>
          </tr>
          <?php } ?>
        </table>
      </td>
      <td width="60%">
        <table class="srbacDataGrid" width="50%" style="float:left">
          <tr>
            <th width="70%"><?php echo $this->module->tr->translate('srbac','Auth items')?></th>
          </tr>
          <tr>
            <td valign="top">
              <div id="controllerActions"></div>
            </td>
          </tr>
        </table>
      </td>
  </table>
</div>
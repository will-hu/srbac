<table width="50%" align="left">
    <tr align="left">
        <td><?php echo CHtml::link($this->module->tr->translate('srbac','Managing auth items'),
        array('authitem/manage/manage'));?></td>
    </tr>
     <tr align="left">
        <td><?php echo CHtml::link($this->module->tr->translate('srbac','Assign to users'),
        array('authitem/assign'));?></td>
    </tr>
    <tr align="left">
        <td><?php echo CHtml::link($this->module->tr->translate('srbac','User\'s assignments'),
        array('authitem/assignments'));?></td>
    </tr>
</table>

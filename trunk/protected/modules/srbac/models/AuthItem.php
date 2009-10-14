<?php

class AuthItem extends CActiveRecord {
/**
 * The followings are the available columns in table 'authitem':
 * @var string $name
 * @var integer $type
 * @var string $description
 * @var string $bizrule
 * @var string $data
 *
 */

  public static $TYPES = array('Operation','Task','Role');
  public $oldName;


  /**
   * Returns the static model of the specified AR class.
   * @return CActiveRecord the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return Yii::app()->authManager->itemTable;
  }

  public function safeAttributes() {
    parent::safeAttributes();
    return array('name','type','description','bizrule','data');
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    return array(
    array('name','length','max'=>64),
    array('name, type', 'required'),
    array('type', 'numerical', 'integerOnly'=>true),
    array('description','safe'),
    array('bizrule','safe'),
    array('data','safe'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
    return array(
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
    'name'=>Helper::findModule('srbac')->tr->translate('srbac','Name'),
    'type'=>Helper::findModule('srbac')->tr->translate('srbac','Type'),
    'description'=>Helper::findModule('srbac')->tr->translate('srbac','Description'),
    'bizrule'=>Helper::findModule('srbac')->tr->translate('srbac','Bizrule'),
    'data'=>Helper::findModule('srbac')->tr->translate('srbac','Data'),
    );
  }

//  protected function beforeSave() {
//    if($this->getIsNewRecord()) {
//      $authItem = AuthItem::model()->findByPk($this->name);
//      if($authItem !== null) {
//        return false;
//      }
//    }
//    parent::beforeSave();
//  }



  protected function afterSave() {
    parent::afterSave();
    if($this->oldName != $this->name) {
      $this->model()->updateByPk($this->oldName, array("name"=>$this->name));
      $criteria = new CDbCriteria();
      $criteria->condition = "itemname='".$this->oldName."'";
      Assignments::model()->updateAll(array('itemname'=>$this->name),$criteria);
      $criteria->condition = "parent='".$this->oldName."'";
      ItemChildren::model()->updateAll(array('parent'=>$this->name), $criteria);
      $criteria->condition = "child='".$this->oldName."'";
      ItemChildren::model()->updateAll(array('child'=>$this->name),$criteria);
      Yii::app()->user->setFlash('updateName',
          Helper::findModule('srbac')->tr->translate('srbac','Updating list'));
    }
  }

  protected function afterDelete() {
    parent::afterDelete();
    Assignments::model()->deleteAll("itemname='".$this->name."'");
    ItemChildren::model()->deleteAll( "parent='".$this->name."'");
    ItemChildren::model()->deleteAll("child='".$this->name."'");
  }
}
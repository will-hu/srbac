<?php
/**
 * SrbacModule class file.
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * SrbacModule is the module that loads the srbac module in the application
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac
 * @since 1.0.0
 */
class SrbacModule extends CWebModule {

//Private attributes
 /* @var $_icons String The path to the icons */
  private $_icons;
  /* @var $_yiiSupportedVersion String The yii version tha srbac supports */
  private $_yiiSupportedVersion = "1.0.06";
  /* @var $_version Srbac version */
  private $_version = "1.1.0 beta";

  // Srbac Attributes
 /* @var $debug If srbac is in debug mode */
  private $_debug;
 /* @var $pagesize int The number of items displayed in each page*/
  private $_pageSize = 15;
  /* @var $alwaysAllowed array The actions that are always allowed*/
  private $_alwaysAllowed = array();
  /* @var $userActions Array Operations assigned to users by default*/
  private $_userActions = array();
   /* @var $listBoxNumberOfLines integer The number of lines in the assign tabview listboxes  */
  private $_listBoxNumberOfLines = 10;
  /* @var $iconText boolean Display text next to the icons */
  private $_iconText = false;

  /* @var $userid String The primary column of the users table*/
  public $userid = "userid";
  /* @var $username String The username column of the users table*/
  public $username = "username";
  /* @var $userclass String The name of the users Class*/
  public $userclass = "User";
  /* @var $superUser String The name of the superuser */
  public $superUser = "Authorizer";
  /* @var $css string The css to use */
  public $css = "srbac.css";
  /* @var $layout string the layout to use */
  public $layout = "" ;
  /* @var $notAuthorizedView String The view to render when unathorized access*/
  public $notAuthorizedView = "application.modules.srbac.views.authitem.unauthorized";
  /* @var $imagesPath string The path to srbac images*/
  public $imagesPath = "images";
  /* @var $imagesPack String The images theme to use*/
  public $imagesPack = "tango";
  


  /**
   * this method is called when the module is being created you may place code
   * here to customize the module or the application
   */
  public function init() {

  // import the module-level models and components
    $this->setImport(array(
        'srbac.models.*',
        'srbac.components.Helper',
        'srbac.controllers.SBaseController'
    ));
    //Publish css
    $resources = dirname(__FILE__).DIRECTORY_SEPARATOR.'css';
    $url = Yii::app()->assetManager->publish($resources);
    Yii::app()->clientScript->registerCssFile($this->_getCssUrl($url));

    //Create the translation component
    $this->setComponents(
        array(
        'tr'=>array(
        'class'=>'CPhpMessageSource',
        'basePath'=> dirname(__FILE__).DIRECTORY_SEPARATOR.'messages',
        'onMissingTranslation'=>"Helper::markWords"
        ),
        )
    );

    //Set the images path
    if($this->imagesPath == "images") {
      $this->_icons = $this->getBasePath()."/images/".$this->imagesPack;
    } else {
      $this->_icons = Yii::getPathOfAlias("webroot")."/".$this->imagesPath."/".$this->imagesPack;
    }
    // if the pack exists use it else look in the images Path dir
    if(is_dir($this->_icons)) {
      $this->_icons = Yii::app()->assetManager->publish($this->_icons);
    } else {
      $this->_icons = Yii::app()->assetManager->publish
          ($this->_icons = Yii::getPathOfAlias("webroot")."/".$this->imagesPath);
    }

  }

  // SETTERS & GETTERS
  public function setDebug($debug) {
    if(is_bool($debug)) {
      $this->_debug = $debug;
    } else {
      throw new CException("Wrong value for srbac attribute debug in srbac configuration.
      '".$debug."' is not a boolean.");
    }
  }
  public function getDebug() {
    return $this->_debug;
  }
  public function setPageSize($pageSize) {
    if(is_numeric($pageSize)) {
      $this->_pageSize = (int) $pageSize;
    } else {
      throw new CException("Wrong value for srbac attribute pageSize in srbac configuration.
      '".$pageSize."' is not an integer.");
    }
  }
  public function getPageSize() {
    return $this->_pageSize;
  }
  public function setAlwaysAllowed($alwaysAllowed) {
    if(is_array($alwaysAllowed)) {
      $this->_alwaysAllowed = $alwaysAllowed;
    } else {
      $this->_alwaysAllowed = array($alwaysAllowed);
    }
  }
  public function getAlwaysAllowed() {
    return $this->_alwaysAllowed;
  }
  public function setUserActions($userActions) {
    if(is_array($userActions)) {
      $this->_userActions = $userActions;
    } else {
      $this->_userActions = array($userActions);
    }
  }
  public function getUserActions() {
    return $this->_userActions;
  }
  public function setListBoxNumberOfLines($size) {
    if(is_numeric($size)) {
      $this->_listBoxNumberOfLines = (int) $size;
    } else {
      throw new CException("Wrong value for srbac attribute listBoxNumberOfLines in srbac configuration.
      '".$size."' is not an integer.");
    }
  }
  public function getListBoxNumberOfLines() {
    return $this->_listBoxNumberOfLines;
  }
  public function setIconText($iconText) {
    if(is_bool($iconText)) {
      $this->_iconText = $iconText;
    } else {
      throw new CException("Wrong value for srbac attribute iconText in srbac configuration.
      '".$iconText."' is not a boolean.");
    }
  }
  public function getIconText() {
    return $this->_iconText;
  }



  /**
   * Gets the css file url by looking in the default srbac css dir or the default
   * application's css directory
   * @param String $url
   * @return String the css file url
   */
  private function _getCssUrl($url) {
  //check if the css is in the default css dir
    $defUrl = "css/".$this->css;
    if(file_exists($defUrl)) {
      return $defUrl;
    } else {
    //css in srbac css dir
      return $url."/".$this->css;
    }
  }

  /**
   * Checks if srbac is installed by checking if Auth items table exists.
   * @return boolean Whether srbac is installed or not
   */
  public function isInstalled() {
    try {
      AuthItem::model()->findAll();
      return true;
    } catch (CDbException  $exc ) {
      return false;
    }
  }

  /**
   * Gets the user's class
   * @return userclass
   */
  public function getUserModel() {
    return new $this->userclass;
  }


  /**
   * this method is called before any module controller action is performed
   * you may place customized code here
   * @param CController $controller
   * @param CAction $action
   * @return boolean
   */
  public function beforeControllerAction($controller, $action) {
    if(parent::beforeControllerAction($controller, $action)) {
      return true;
    }
    else
      return false;
  }

  /**
   * Gets the path to the icon files
   * @return String The path to the icons
   */
  public function getIconsPath() {
    return $this->_icons;
  }

  public function getSupportedYiiVersion() {
    return $this->_yiiSupportedVersion;
  }

  public function getVersion() {
    return $this->_version;
  }
}
<div>
  Press install to create the tables needed for srbac module.<br />
  You must have a database, authManager component and the srbac module
  configured in your application's configuration.<br />
  The module configuration must be like this:
  <?php $this->beginWidget('CTextHighlighter',array('language'=>'php')) ?>
  'modules'=>array('srbac'=>
  array(
  // Your application's user class (default: User)
  "userclass"=>"User",
  // Your users' table user_id column (default: userid)
  "userid"=>"user_ID",
  // your users' table username column (default: username)
  "username"=>"username",
  // If in debug mode (default: false)
  "debug"=>true,
  // The number of items shown in each page (default:15)
  "pageSize"=>10,
  // The name of the super user
  "superUser" =>"Authority",
  )
  ),
  <?php $this->endWidget('CTextHighlighter') ?>
  The names of the tables are set in your authManager configuration.<br />
  You may change the names of the tables there as you like:
  <?php $this->beginWidget('CTextHighlighter',array('language'=>'php')) ?>
  'authManager'=>array(
  // The type of Manager (Database)
  'class'=>'CDbAuthManager',
  // The database connection used
  'connectionID'=>'db',
  // The itemTable name (default:authitem)
  'itemTable'=>'items',
  // The assignmentTable name (default:authassignment)
  'assignmentTable'=>'assignments',
  // The itemChildTable name (default:authitemchild)
  'itemChildTable'=>'itemchildren',
  ),
  <?php $this->endWidget('CTextHighlighter') ?>
</div>


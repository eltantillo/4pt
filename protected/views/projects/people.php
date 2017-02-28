<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$createProject . ': ' . Language::$assignpeople;
$this->breadcrumbs=array(
	Language::$projects=>array('index'),
	Language::$create,
);
?>

<h1><?php echo Language::$assignpeople; ?></h1>

<?php echo $this->renderPartial('_people', array('model'=>$model)); ?>
<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$createProject . ': ' . Language::$assignPeople;
$this->breadcrumbs=array(
	Language::$projects=>array('index'),
	Language::$create,
);
?>

<h1><?php echo Language::$assignPeople; ?></h1>

<?php echo $this->renderPartial('_people', array('model'=>$model)); ?>
<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$createTemplate;
$this->breadcrumbs=array(
	Language::$projects=>array('index'),
	Language::$createTemplate,
);
?>

<h1><?php echo Language::$createTemplate; ?></h1>

<?php echo $this->renderPartial('_template', array('model'=>$model)); ?>
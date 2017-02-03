<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$createPerson;
$this->breadcrumbs=array(
	Language::$people=>array('index'),
	Language::$create,
);
?>

<h1><?php echo Language::$createPerson; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
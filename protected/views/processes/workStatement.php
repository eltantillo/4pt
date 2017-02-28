<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Work Statement',
);
?>

<h1>Work Statement</h1>

<?php echo $this->renderPartial('_formWorkStatement', array('model'=>$model)); ?>
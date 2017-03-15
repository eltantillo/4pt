<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Test Reports',
);
?>

<div class="page-header">
	<h1>Test Reports</h1>
</div>

<?php
	echo $this->renderPartial('_formTestReport', array('model'=>$model));
?>
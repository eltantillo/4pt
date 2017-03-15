<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Corrective Actions',
);
?>

<div class="page-header">
	<h1>Corrective Actions</h1>
</div>

<?php
	echo $this->renderPartial('_formCorrectiveActions', array('model'=>$model));
?>
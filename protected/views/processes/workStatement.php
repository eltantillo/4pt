<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Work Statement',
);
?>

<div class="page-header">
	<h1>Work Statement</h1>
</div>

<?php
if (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formWorkStatementValidate', array('model'=>$model, 'sessionUser'=>$sessionUser));
}
elseif (in_array(2, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formWorkStatement', array('model'=>$model));
}
?>
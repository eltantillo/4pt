<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$softwareRequirements,
);
?>

<div class="page-header">
	<h1><?php echo Language::$softwareRequirements; ?></h1>
</div>

<?php
if (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formSoftwareRequirementsValidate', array('model'=>$model, 'sessionUser'=>$sessionUser));
}
else{
  echo $this->renderPartial('_projectPlanInput', array(
      'workStatement'=>$workStatement,
      'deliveryInstructions'=>$deliveryInstructions,
      'tasks'=>$tasks,
      'risks'=>$risks,
      'minutes'=>$minutes,
    )) . '<br><br>';
	echo $this->renderPartial('_formSoftwareRequirements', array('model'=>$model));
}
?>
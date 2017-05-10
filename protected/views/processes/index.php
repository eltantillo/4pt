<?php
$this->breadcrumbs=array(
	Language::$processes,
);
?>

<div class="page-header">
	<h1><?php echo Language::$processes; ?></h1>
</div>
<h2>Proyectos activos</h2>

<div class="list-group">
<?php 

$amount = 0;

foreach ($projects as $project) {
	$people = explode(',', $project->people);
	if (in_array($sessionUser->id, $people)){
		$amount++;
		$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$actOfAcceptance = act_of_acceptance::model()->findByAttributes(array('process_id'=>$process->id));
		if ($actOfAcceptance === null || !$actOfAcceptance->client_validated){
			echo '
			  <a href="' . Yii::app()->request->baseUrl . '/processes/' . $project->id . '" class="list-group-item">
			    <h4 class="list-group-item-heading">' . $project->title . '</h4>
			    <p class="list-group-item-text">(' . $project->acronym . ')</p>
			  </a>
			';
		}
	}
}
?>
</div>

<?php
if($amount == 0){
	echo '<p>Por el momento no se le ha asignado a un proyecto.</p>';
}
?>

<?php
$this->breadcrumbs=array(
	'Processes',
);
?>

<h1>Processes</h1>

<?php 
foreach ($projects as $project) {
	$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
	$actOfAcceptance = act_of_acceptance::model()->findByAttributes(array('process_id'=>$process->id));
	if ($actOfAcceptance === null || !$actOfAcceptance->client_validated){
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/' . $project->id . '">';
		echo $project->title;
		echo ' (' . $project->acronym . ')</a><br>';
	}
}
?>


<?php
$this->breadcrumbs=array(
	'Processes',
);
?>

<h1>Processes</h1>

<?php 
foreach ($projects as $project) {
	echo '<a href="processes/' . $project->id . '">';
	echo $project->title;
	echo ' (' . $project->acronym . ')</a>';
}
?>


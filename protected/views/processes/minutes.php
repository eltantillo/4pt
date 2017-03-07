<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Minutes',
);
?>

<h1>Minutes</h1>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/minuteadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create minute</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $minute) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/minuteadmin/' . $_GET['id'] .'?minuteID=' . $minute->id .'" class="list-group-item">' . $minute->purpose . '</a>';
	}
	?>
</div>
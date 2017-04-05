<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$minutes,
);
?>

<div class="page-header">
	<h1><?php echo Language::$minutes; ?></h1>
</div>
<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/minuteadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create minute</a><br><br>
<?php } ?>

<div class="list-group">
	<?php
	foreach ($model as $minute) {
		$class = ' list-group-item-success';
		if (!$minute->client_validated){
			$class = ' list-group-item-warning';
		}
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/minuteadmin/' . $_GET['id'] .'?minuteID=' . $minute->id .'" class="list-group-item' . $class . '">' . $minute->purpose . '</a>';
	}
	?>
</div>
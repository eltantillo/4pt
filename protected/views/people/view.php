<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$view . ' ' . $model->email;
$this->breadcrumbs=array(
	Language::$people=>array('index'),
	$model->email,
);

/*$this->menu=array(
	array('label'=>Language::$update, 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Language::$delete, 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
);*/
$this->menu=array(
	array(
		'encodeLabel'=>false,
		'label' => '<a class="btn btn-primary btn-sm" href="' . Yii::app()->baseUrl . '/people/update/' . $model->id  . '" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ' . Language::$update . '</a>',
	),
	array(
		'url'=>Yii::app()->baseUrl . '/people/delete/' . $model->id,
		'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii',Language::$deleteConfirm)),
		'encodeLabel'=>false,
		'label' => '<form method="POST" action="' . Yii::app()->baseUrl . '/people/delete/' . $model->id . '"><button class="btn btn-danger btn-sm delete" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ' . Language::$delete . '</button></form>',
	),
);
?>

<h1><?php echo Language::$person . ': ' . $model->first_name . " " . $model->middle_name  . " " . $model->last_name; ?></h1>

<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			//'title'=>Language::$operations,
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions' => array('class' => 'table table-bordered table-hover'),
	'attributes'=>array(
		'first_name',
		'middle_name',
		'last_name',
		'email',
		array(
			'label'=>Language::$phone,
			'value'=>Functions::phoneFormat($model->phone),
		),
		array(
			'label'=>Language::$habilities,
			'value'=>Functions::habilitiesFormat($model->habilities),
		),
		array(
			'label'=>Language::$capabilities,
			'value'=>Functions::capabilitiesFormat($model->capabilities),
		),
		array(
			'label'=>Language::$roles,
			'value'=>Functions::rolesFormat($model->roles),
		),
		/*array(
			'label'=>Language::$phone,
			'type'=>'image',
			'value'=>Functions::phoneFormat($model->phone),
		),*/
		/*
		'habilities',
		'capabilities',
		'roles',
		*/
	),
)); ?>

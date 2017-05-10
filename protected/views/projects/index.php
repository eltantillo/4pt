<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$projects;
$this->breadcrumbs=array(
	Language::$projects,
);

$this->menu=array(
	array(
		'encodeLabel'=>false,
		'label' => '<a class="btn btn-primary btn-sm" href="' . Yii::app()->baseUrl . '/projects/create" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> ' . Language::$createProject . '</a>',
		),
	/*array(
		'encodeLabel'=>false,
		'label' => '<a class="btn btn-warning btn-sm" href="' . Yii::app()->baseUrl . '/projects/createTemplate" role="button"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Plantillas</a>',
		),*/
	array(
		'encodeLabel'=>false,
		'label' => '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#templatesModal"><span class="glyphicon glyphicon-file" aria-hidden="true">Plantillas</button>',
		),
);
?>

<h1><?php echo Language::$projects; ?></h1>

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
<hr>
<h2>Proyectos actuales</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


<!-- Modal -->
<div class="modal fade" id="templatesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Plantillas</h4>
      </div>
      <div class="modal-body">
      	<a class="btn btn-warning btn-sm" href="<?php echo Yii::app()->baseUrl; ?>/projects/createTemplate" role="button"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Crear Plantilla</a><br><br>
      	<ul>
      	<?php foreach ($templates as $template) {
      		echo '<li><a href="' . Yii::app()->baseUrl . '/projects/editTemplate/' . $template->id . '" role="button">' . $template->name . '</a></li>';
		} ?>
      	</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php
$people = explode(',', $project->people);
$roles = explode(',', $project->roles);

$peopleAndRoles = array();

$j = 0;
foreach ($roles as $role) {
	for ($i = 0; $i < $role; $i++) {
		$id = $people[$j];
		$peopleAndRoles[$id] = Functions::personFormat($id) . ' (' . Language::$rolesArray[$j] . ')';
	}
	$j++;
}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tasks-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'title',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'task'); ?>
		<?php echo $form->textArea($model,'task',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'task',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'duration',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
    <div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date', array('class'=>'form-control', 'readonly'=>true, 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'start_date',array('class'=>'alert alert-danger')); ?>
	</div></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'resources'); ?>
		<?php echo $form->textField($model,'resources', array('class'=>'form-control', 'placeholder'=>'MXN')); ?>
		<?php echo $form->error($model,'resources',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'people_id'); ?>
		<?php echo $form->dropDownList($model,'people_id', $peopleAndRoles, array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'people_id',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
		<?php if (!$model->isNewRecord) {echo '<form method="POST" action="' . Yii::app()->baseUrl . '/processes/taskdelete/' . $_GET['id'] . '?taskID=' . $model->id . '"><button class="btn btn-danger delete" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button></form>';} ?>
	</div>

	
<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
        	ignoreReadonly: true,
          format: 'YYYY-MM-DD HH:mm'
    	});
    });
</script>
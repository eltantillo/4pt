<div class="form">

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

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'corrective-actions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'problem'); ?>
		<?php echo $form->textArea($model,'problem',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'problem',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solution'); ?>
		<?php echo $form->textArea($model,'solution',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'solution',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'corrective_actions'); ?>
		<?php echo $form->textArea($model,'corrective_actions',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'corrective_actions',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'responsible_id'); ?>
		<?php echo $form->dropDownList($model,'responsible_id', $peopleAndRoles, array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'responsible_id',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'open_date'); ?>
		<?php echo $form->textField($model,'open_date', array('class'=>'form-control', 'readonly'=>true, 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'open_date',array('class'=>'alert alert-danger')); ?>
	</div></div>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'close_date'); ?>
		<?php echo $form->textField($model,'close_date', array('class'=>'form-control', 'readonly'=>true, 'id'=>'datetimepicker2')); ?>
		<?php echo $form->error($model,'close_date',array('class'=>'alert alert-danger')); ?>
	</div></div>
	</div>

	<!--<div class="form-group">
		<?php echo $form->checkBox($model,'complete'); ?>
		<?php echo $form->labelEx($model,'complete'); ?>
		<?php echo $form->error($model,'complete',array('class'=>'alert alert-danger')); ?>
	</div>-->

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
	        ignoreReadonly: true,
          format: 'YYYY-MM-DD HH:mm'
	    });
        $('#datetimepicker2').datetimepicker({
	        ignoreReadonly: true,
          format: 'YYYY-MM-DD HH:mm'
	    });
    });
</script>
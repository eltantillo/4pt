<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-report-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'resume'); ?>
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'test_case'); ?>
		<?php echo $form->textArea($model,'test_case',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'test_case'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tester_id'); ?>
		<?php echo $form->textField($model,'tester_id',array('size'=>10,'maxlength'=>10, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'tester_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'defect_level'); ?>
		<?php echo $form->textArea($model,'defect_level',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'defect_level'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'affected_functions'); ?>
		<?php echo $form->textArea($model,'affected_functions',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'affected_functions'); ?>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'origin_date'); ?>
		<?php echo $form->textField($model,'origin_date', array('class'=>'form-control', 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'origin_date'); ?>
	</div></div>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'resolution_date'); ?>
		<?php echo $form->textField($model,'resolution_date', array('class'=>'form-control', 'id'=>'datetimepicker2')); ?>
		<?php echo $form->error($model,'resolution_date'); ?>
	</div></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solver_id'); ?>
		<?php echo $form->textField($model,'solver_id',array('size'=>10,'maxlength'=>10, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'solver_id'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
	        format: 'YYYY-MM-DD HH:mm'
	    });
    });
    $(function () {
        $('#datetimepicker2').datetimepicker({
	        format: 'YYYY-MM-DD HH:mm'
	    });
    });
</script>
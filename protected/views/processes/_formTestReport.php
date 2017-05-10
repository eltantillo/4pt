<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-report-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'resume'); ?>
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'resume',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'test_case'); ?>
		<?php echo $form->textArea($model,'test_case',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'test_case',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'defect_level'); ?>
		<?php echo $form->textArea($model,'defect_level',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'defect_level',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'affected_functions'); ?>
		<?php echo $form->textArea($model,'affected_functions',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'affected_functions',array('class'=>'alert alert-danger')); ?>
	</div>

	<?php if ($model->isNewRecord){ ?>
	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'origin_date'); ?>
		<?php echo $form->textField($model,'origin_date', array('class'=>'form-control', 'readonly'=>true, 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'origin_date',array('class'=>'alert alert-danger')); ?>
	</div></div>
	</div>

	<?php }else{ ?>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'resolution_date'); ?>
		<?php echo $form->textField($model,'resolution_date', array('class'=>'form-control', 'readonly'=>true, 'id'=>'datetimepicker2')); ?>
		<?php echo $form->error($model,'resolution_date',array('class'=>'alert alert-danger')); ?>
	</div></div>
	</div>

	<?php } ?>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
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
    $(function () {
        $('#datetimepicker2').datetimepicker({
	        ignoreReadonly: true,
          format: 'YYYY-MM-DD HH:mm'
	    });
    });
</script>
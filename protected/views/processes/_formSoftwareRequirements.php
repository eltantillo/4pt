<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-requirements-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<div class="form-group">
		<?php echo $form->errorSummary(array($model), '', '',
		array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'introduction'); ?>
		<?php echo $form->textArea($model,'introduction',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Descripción General')); ?>
		<?php echo $form->error($model,'introduction',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'functionality'); ?>
		<?php echo $form->textArea($model,'functionality',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Necesidades establecidas a ser satisfechas por el software')); ?>
		<?php echo $form->error($model,'functionality',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'functionality_file'); ?>
		<?php echo $form->error($model,'functionality_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'user_interface'); ?>
		<?php echo $form->textArea($model,'user_interface',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Descripción Modelo Interfaz')); ?>
		<?php echo $form->error($model,'user_interface',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'user_interface_file'); ?>
		<?php echo $form->error($model,'user_interface_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'external_interfaces'); ?>
		<?php echo $form->textArea($model,'external_interfaces',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Definición de las interfaces con otro software o hardware')); ?>
		<?php echo $form->error($model,'external_interfaces',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'external_interfaces_file'); ?>
		<?php echo $form->error($model,'external_interfaces_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'reliability'); ?>
		<?php echo $form->textArea($model,'reliability',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Madurez, Tolerancia a fallas y Capacidad de recuperación')); ?>
		<?php echo $form->error($model,'reliability',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'reliability_file'); ?>
		<?php echo $form->error($model,'reliability_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'efficiency'); ?>
		<?php echo $form->textArea($model,'efficiency',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Especificación del nivel de ejecución del software en relación con el tiempo y el uso de los recursos')); ?>
		<?php echo $form->error($model,'efficiency',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'efficiency_file'); ?>
		<?php echo $form->error($model,'efficiency_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'maintenance'); ?>
		<?php echo $form->textArea($model,'maintenance',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Descripción de los elementos para facilitar la comprensión y ejecución de futuras modificaciones')); ?>
		<?php echo $form->error($model,'maintenance',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'maintenance_file'); ?>
		<?php echo $form->error($model,'maintenance_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'portability'); ?>
		<?php echo $form->textArea($model,'portability',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Descripción de las características del software que permiten a su transferencia de un lugar a otro')); ?>
		<?php echo $form->error($model,'portability',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'portability_file'); ?>
		<?php echo $form->error($model,'portability_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'limitations'); ?>
		<?php echo $form->textArea($model,'limitations',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Necesidades impuestas por el cliente')); ?>
		<?php echo $form->error($model,'limitations',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'limitations_file'); ?>
		<?php echo $form->error($model,'limitations_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'interoperability'); ?>
		<?php echo $form->textArea($model,'interoperability',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Capacidad Para Interactuar o intercambiar información entre dos o más personas')); ?>
		<?php echo $form->error($model,'interoperability',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'interoperability_file'); ?>
		<?php echo $form->error($model,'interoperability_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'reuse'); ?>
		<?php echo $form->textArea($model,'reuse',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Característica de cualquier producto o subproducto o de alguna de sus partes, para ser utilizado por varios usuarios como un producto final')); ?>
		<?php echo $form->error($model,'reuse',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'reuse_file'); ?>
		<?php echo $form->error($model,'reuse_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'legal'); ?>
		<?php echo $form->textArea($model,'legal',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Necesidades impuestas por las leyes, regulaciones, etc.')); ?>
		<?php echo $form->error($model,'legal',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'legal_file'); ?>
		<?php echo $form->error($model,'legal_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model,'sent'); ?>
		<?php echo $form->labelEx($model,'sent'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
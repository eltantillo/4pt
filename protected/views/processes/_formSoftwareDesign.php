<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-design-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'high_lvl_design'); ?>
		<?php echo $form->textArea($model,'high_lvl_design',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'•	Características de desempeño de software
•	Interfaces de hardware, Software y humanas 
•	Características de seguridad
•	Requisitos de diseño de base de datos
•	Manejo de errores y atributos  de recuperación 
')); ?>
		<?php echo $form->error($model,'high_lvl_design',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'low_lvl_design'); ?>
		<?php echo $form->textArea($model,'low_lvl_design',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'•	Proporciona diseño detallado (puede ser representado como un prototipo, diagrama de flujo, diagrama entidad relación, pseudo código)
•	Proporciona el formato de entrada / salida de los datos
•	Proporciona especificaciones de las necesidades de almacenamiento de los datos 
•	Establece convenciones de denominación de los datos requeridos 
•	Define el formato de las estructuras de datos requeridas
•	Define los campos de datos y el propósito de cada elemento de datos requerido 
•	Proporciona las especificaciones de las estructura del programa
•	Proporciona el mapeo (Hacia delante y hacia atrás) de los requisitos a los elementos del diseño de software, los casos de prueba y los procedimientos de prueba
•	Los estados utilizados son: verificado, en línea base y actualizado
')); ?>
		<?php echo $form->error($model,'low_lvl_design',array('class'=>'alert alert-danger')); ?>
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
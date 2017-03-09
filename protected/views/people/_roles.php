<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'people-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">

		<?php

		$items = array();
		$rolesCounter = array(
			0  => 0, '0Max'  => 3,
			1  => 0, '1Max'  => 2,
			2  => 0, '2Max'  => 4,
			3  => 0, '3Max'  => 2,
			4  => 0, '4Max'  => 5,
			5  => 0, '5Max'  => 7,
			);
		$roles = array();

		foreach ($model->capabilitiesArray as $key) {
			if ($key == 4 || $key == 5 || $key == 13){
				$rolesCounter[0]++;
			}
			if ($key == 0 || $key == 10){
				$rolesCounter[1]++;
			}
			if ($key == 5 || $key == 12 || $key == 13 || $key == 14){
				$rolesCounter[2]++;
			}
			if ($key == 5 || $key == 7){
				$rolesCounter[3]++;
			}
			if ($key == 9 || $key == 3 || $key == 2 || $key == 14 || $key == 15){
				$rolesCounter[4]++;
			}
			if ($key == 1 || $key == 2 || $key == 6 || $key == 8 || $key == 11 || $key == 16 || $key == 17){
				$rolesCounter[5]++;
			}
		}

		for ($i=0; $i < 6; $i++) {
			if (($rolesCounter[$i] / $rolesCounter[$i . 'Max']) * 100 > 75){
				array_push($roles, $i);
			}
		}

		foreach ($roles as $key) {
			$items[$key] = Language::$rolesArray[$key];
		}

		echo $form->checkBoxList($model, 'rolesArray', $items); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::htmlButton(Language::$reset, array('type'=>'reset', 'class'=>'btn btn-default')); ?>
		<?php echo CHtml::htmlButton($model->isNewRecord ? Language::$next : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
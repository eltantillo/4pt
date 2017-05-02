<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'people-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php

		$items = array();
		$capabilitiesCounter = array(
			0  => 0, '0Max'  => 2,
			1  => 0, '1Max'  => 8,
			2  => 0, '2Max'  => 3,
			3  => 0, '3Max'  => 3,
			4  => 0, '4Max'  => 1,
			5  => 0, '5Max'  => 1,
			6  => 0, '6Max'  => 1,
			7  => 0, '7Max'  => 2,
			8  => 0, '8Max'  => 5,
			9  => 0, '9Max'  => 1,
			10 => 0, '10Max' => 3,
			11 => 0, '11Max' => 3,
			12 => 0, '12Max' => 4,
			13 => 0, '13Max' => 2,
			14 => 0, '14Max' => 2,
			15 => 0, '15Max' => 2,
			16 => 0, '16Max' => 5,
			17 => 0, '17Max' => 2,
			);
		$habilities = array();

		foreach ($model->habilitiesArray as $key) {
			if ($key == 1 || $key == 12){
				$capabilitiesCounter[0]++;
			}
			if ($key == 2 || $key == 3 || $key == 6 || $key == 7 || $key == 8 || $key == 9 || $key == 10 || $key == 12){
				$capabilitiesCounter[1]++;
			}
			if ($key == 4 || $key == 8 || $key == 14){
				$capabilitiesCounter[2]++;
			}
			if ($key == 4 || $key == 8 || $key == 14){
				$capabilitiesCounter[3]++;
			}
			if ($key == 0){
				$capabilitiesCounter[4]++;
			}
			if ($key == 0){
				$capabilitiesCounter[5]++;
			}
			if ($key == 11){
				$capabilitiesCounter[6]++;
			}
			if ($key == 2 || $key == 6){
				$capabilitiesCounter[7]++;
			}
			if ($key == 0 || $key == 5 || $key == 7 || $key == 8 || $key == 11){
				$capabilitiesCounter[8]++;
			}
			if ($key == 0){
				$capabilitiesCounter[9]++;
			}
			if ($key == 0 || $key == 1 || $key == 12){
				$capabilitiesCounter[10]++;
			}
			if ($key == 0 || $key == 3 || $key == 11){
				$capabilitiesCounter[11]++;
			}
			if ($key == 0 || $key == 2 || $key == 6 || $key == 8){
				$capabilitiesCounter[12]++;
			}
			if ($key == 0 || $key == 2){
				$capabilitiesCounter[13]++;
			}
			if ($key == 4 || $key == 13){
				$capabilitiesCounter[14]++;
			}
			if ($key == 4 || $key == 14){
				$capabilitiesCounter[15]++;
			}
			if ($key == 3 || $key == 7 || $key == 8 || $key == 9 || $key == 12){
				$capabilitiesCounter[16]++;
			}
			if ($key == 2 || $key == 6){
				$capabilitiesCounter[17]++;
			}
		}

		for ($i=0; $i < 18; $i++) {
			if (($capabilitiesCounter[$i] / $capabilitiesCounter[$i . 'Max']) * 100 > 75){
				array_push($habilities, $i);
			}
		}

		foreach ($habilities as $key) {
			$items[$key] = Language::$capabilitiesArray[$key];
		}

		echo $form->checkBoxList($model, 'capabilitiesArray', $items); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::htmlButton(Language::$reset, array('type'=>'reset', 'class'=>'btn btn-default')); ?>
		<?php echo CHtml::htmlButton($model->isNewRecord ? Language::$next : Language::$next, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
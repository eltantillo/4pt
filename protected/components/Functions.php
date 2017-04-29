<?php
class Functions{
	public static function phoneFormat($phone){
		$len = strlen($phone);
		if ($len > 10){
			$code = 0;
			$code += $len - 10;
			return '+' . substr($phone, 0, $code) . ' (' . substr($phone, $code, 3) . ') ' . substr($phone, $code + 3, 3) . ' ' . substr($phone, $code + 6, 4);
		}
		else if ($len == 10){
			return '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . ' ' . substr($phone, 6, 4);
		}
		else if ($len == 7){
			return substr($phone, 0, 3) . ' ' . substr($phone, 3, 4);
		}
		else{
			return $phone;
		}
	}

	public static function habilitiesFormat($habilitiesString){
		$numbers = array();
		$habilities = array();

		$count = 0;
		foreach (Language::$habilitiesArray as $key) {
			array_push($numbers, '/\b' . $count . '\b/i');
			array_push($habilities, ' ' . $key);
			$count++;
		}
		return preg_replace($numbers, $habilities, $habilitiesString);
	}
	
	public static function capabilitiesFormat($capabilitiesString){
		$numbers = array();
		$capabilities = array();

		$count = 0;
		foreach (Language::$capabilitiesArray as $key) {
			array_push($numbers, '/\b' . $count . '\b/i');
			array_push($capabilities, ' ' . $key);
			$count++;
		}
		return preg_replace($numbers, $capabilities, $capabilitiesString);
	}
	
	public static function rolesFormat($rolesString){
		$numbers        = array();
		$roles          = array();
		$rolesPreString = array();
		$rolesArray     = explode(',', $rolesString);

		$count = 0;
		foreach ($rolesArray as $key) {
			if ($key != null && $key >= 0){
				array_push($numbers, '/\b' . $count . '\b/i');
				array_push($roles, ' ' . Language::$rolesArray[$key]);
				array_push($rolesPreString, $count);
			}
			$count++;
		}
		$rolesString = implode(',', $rolesPreString);
		return preg_replace($numbers, $roles, $rolesString);
	}
	
	public static function rolesAmountFormat($rolesString){
		$numbers = explode(',', $rolesString);
		$string = '';

		$count = 0;
		foreach ($numbers as $key) {
			$string .= Language::$rolesArray[$count] . ' (x' . $key . '), ';
			$count++;
		}

		return $string;
	}
	
	public static function levelFormat($level){
		switch ($level){
			case 1:
				return Language::$basic;
				break;
			case 2:
				return Language::$medium;
				break;
			case 3:
				return Language::$advanced;
				break;
		}
	}
	
	public static function productFormat($product){
		switch ($product){
			case 1:
				return Language::$product;
				break;
			case 2:
				return Language::$service;
				break;
		}
	}
	
	public static function templateFormat($templateId){
		switch ($templateId){
			case 0:
				return Language::$none;
				break;
			default:
				$template = templates::model()->findByAttributes(array('id'=>$templateId));
				return $template->name;
				break;
		}
	}
	
	public static function peopleFormat($rolesString, $peopleString){
		$numbers           = array();
		$peopleNameAndRole = array();
		$peoplePreString = array();

		$user   = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$people = people::model()->findAll('company_id=' . $user->company_id);

		$rolesArray = explode(',', $rolesString);
		$peopleArray = explode(',', $peopleString);

		$position = 0;
		$rolePosition = 0;
		foreach ($rolesArray as $roleAmount) {
			for ($i=0; $i < $roleAmount; $i++) {
				array_push($numbers, '/\b' . $position . '\b/i');
				array_push($peoplePreString, $position);
				foreach ($people as $person) {
					if (array_key_exists($position,$peopleArray)){
					if ($person->id == $peopleArray[$position]){
						array_push($peopleNameAndRole, ' ' . $person->first_name . ' ' . $person->middle_name . ' ' . $person->last_name . ' (' . Language::$rolesArray[$rolePosition]  . ')');
					}
					}
				}
				$position++;
			}
			$rolePosition++;
		}

		foreach ($peopleArray as $key) {
		}

		$peopleString = implode(',', $peoplePreString);
		return preg_replace($numbers, $peopleNameAndRole, $peopleString);
	}
	
	public static function personFormat($id){
		$user   = people::model()->findByAttributes(array('id'=>$id));

		return $user->first_name . " " . $user->middle_name . " " . $user->last_name;
	}

	public static function accessArray($sessionUser, $template, $projectPlan, $workStatement, $minutesValidated, $softwareRequirements, $userManual, $softwareDesign, $operationManual, $maintenanceManual, $actOfAcceptance){
		$projectPlanValue = !$projectPlan->project_manager_validated || !$projectPlan->technical_leader_validated;

		$projectExecutionValue = !$projectPlanValue;

		$softwareImplementationValue = !$projectPlanValue;

		$projectClosureValue = !(($softwareRequirements === null || (!$softwareRequirements->project_manager_validated || !$softwareRequirements->technical_leader_validated)) || ($userManual === null || (!$userManual->project_manager_validated  || !$userManual->technical_leader_validated)) || ($softwareDesign === null || (!$softwareDesign->project_manager_validated || !$softwareDesign->technical_leader_validated)) || ($operationManual === null || (!$operationManual->project_manager_validated || !$operationManual->technical_leader_validated)) || ($maintenanceManual === null || (!$maintenanceManual->project_manager_validated || !$maintenanceManual->technical_leader_validated))) && (in_array(0, $sessionUser->rolesArray) || (in_array(2, $sessionUser->rolesArray) && $actOfAcceptance != null));


		$workStatementValue = (in_array(2, $sessionUser->rolesArray) && ($workStatement === null || !$workStatement->sent || $workStatement->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $workStatement != null && $workStatement->sent && !$workStatement->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$workStatement->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$workStatement->technical_leader_validated);

		$deliveryInstructionsValue = $workStatement != null && $workStatement->project_manager_validated && $workStatement->technical_leader_validated && ((in_array(0, $sessionUser->rolesArray) && !$projectPlan->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$projectPlan->technical_leader_validated));

		$tasksValue = $workStatement != null && $workStatement->project_manager_validated && $workStatement->technical_leader_validated && ((in_array(0, $sessionUser->rolesArray) && !$projectPlan->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$projectPlan->technical_leader_validated));

		$risksValue = $workStatement != null && $workStatement->project_manager_validated && $workStatement->technical_leader_validated && ((in_array(0, $sessionUser->rolesArray) && !$projectPlan->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$projectPlan->technical_leader_validated));

		$minutesValue = $workStatement != null && $workStatement->project_manager_validated && $workStatement->technical_leader_validated && ((in_array(0, $sessionUser->rolesArray) && !$projectPlan->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$projectPlan->technical_leader_validated));

		$validationValue = $minutesValidated && $workStatement != null && $workStatement->project_manager_validated && $workStatement->technical_leader_validated && ((in_array(0, $sessionUser->rolesArray) && !$projectPlan->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$projectPlan->technical_leader_validated));

		$progressReportValue = !in_array(2, $sessionUser->rolesArray);

		$correctiveActionsValue = !in_array(2, $sessionUser->rolesArray);

		$softwareRequirementsValue = ((in_array(2, $sessionUser->rolesArray) || in_array(3, $sessionUser->rolesArray)) && ($softwareRequirements === null || !$softwareRequirements->sent || $softwareRequirements->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $softwareRequirements != null  && $softwareRequirements->sent && !$softwareRequirements->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$softwareRequirements->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$softwareRequirements->technical_leader_validated);

		$userManualValue = (in_array(3, $sessionUser->rolesArray) && ($softwareDesign != null && $softwareDesign->project_manager_validated && $softwareDesign->technical_leader_validated) && ($userManual === null || !$userManual->sent || $userManual->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $userManual != null  && $userManual->sent && !$userManual->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$userManual->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$userManual->technical_leader_validated);

		$softwareDesignValue = ((in_array(3, $sessionUser->rolesArray) || in_array(4, $sessionUser->rolesArray)) && ($softwareDesign === null || !$softwareDesign->sent || $softwareDesign->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $softwareDesign != null  && $softwareDesign->sent && !$softwareDesign->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$softwareDesign->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$softwareDesign->technical_leader_validated);

		$operationManualValue = (in_array(5, $sessionUser->rolesArray) && $softwareDesign != null && $softwareDesign->project_manager_validated && $softwareDesign->technical_leader_validated && ($operationManual === null || !$operationManual->sent || $operationManual->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $operationManual != null  && $operationManual->sent && !$operationManual->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$operationManual->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$operationManual->technical_leader_validated);

		$maintenanceManualValue = (in_array(5, $sessionUser->rolesArray) && ($maintenanceManual === null || !$maintenanceManual->sent || $maintenanceManual->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $maintenanceManual != null  && $maintenanceManual->sent && !$maintenanceManual->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$maintenanceManual->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$maintenanceManual->technical_leader_validated);

		$softwareComponentsValue = in_array(5, $sessionUser->rolesArray) && $softwareDesign != null && $softwareDesign->project_manager_validated && $softwareDesign->technical_leader_validated;

		$actOfAcceptanceValue = $projectClosureValue;

		if ($template != null){
			$workStatementValue = $template->work_statement && ((in_array(2, $sessionUser->rolesArray) && ($workStatement === null || !$workStatement->sent || $workStatement->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $workStatement != null && $workStatement->sent && !$workStatement->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$workStatement->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$workStatement->technical_leader_validated));

			$deliveryInstructionsValue = $template->delivery_instructions && (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray));
			$tasksValue = $template->tasks && (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray));
			$risksValue = $template->risks && (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray));
			$minutesValue = $template->minutes && (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray));
			$validationValue = false;

			$progressReportValue = $template->progress_report && !in_array(2, $sessionUser->rolesArray);
			$correctiveActionsValue = $template->corrective_actions && !in_array(2, $sessionUser->rolesArray);

			$softwareRequirementsValue = $template->software_requirements && (((in_array(2, $sessionUser->rolesArray) || in_array(3, $sessionUser->rolesArray)) && ($softwareRequirements === null || !$softwareRequirements->sent || $softwareRequirements->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $softwareRequirements != null  && $softwareRequirements->sent && !$softwareRequirements->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$softwareRequirements->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$softwareRequirements->technical_leader_validated));

			$userManualValue = $template->user_manual && ((in_array(3, $sessionUser->rolesArray) && ($userManual === null || !$userManual->sent || $userManual->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $userManual != null  && $userManual->sent && !$userManual->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$userManual->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$userManual->technical_leader_validated));

			$softwareDesignValue = $template->software_design && (((in_array(3, $sessionUser->rolesArray) || in_array(4, $sessionUser->rolesArray)) && ($softwareDesign === null || !$softwareDesign->sent || $softwareDesign->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $softwareDesign != null  && $softwareDesign->sent && !$softwareDesign->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$softwareDesign->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$softwareDesign->technical_leader_validated));

			$operationManualValue = $template->operation_manual && ((in_array(5, $sessionUser->rolesArray) && ($operationManual === null || !$operationManual->sent || $operationManual->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $operationManual != null  && $operationManual->sent && !$operationManual->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$operationManual->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$operationManual->technical_leader_validated));

			$maintenanceManualValue = $template->maintenance_manual && ((in_array(5, $sessionUser->rolesArray) && ($maintenanceManual === null || !$maintenanceManual->sent || $maintenanceManual->change_request)) || ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) && $maintenanceManual != null  && $maintenanceManual->sent && !$maintenanceManual->change_request) && ((in_array(0, $sessionUser->rolesArray) && !$maintenanceManual->project_manager_validated) || (in_array(1, $sessionUser->rolesArray)) && !$maintenanceManual->technical_leader_validated));

			$softwareComponentsValue = $template->software_components && in_array(5, $sessionUser->rolesArray);
			$actOfAcceptanceValue = $template->act_of_acceptance && (in_array(0, $sessionUser->rolesArray) || (in_array(2, $sessionUser->rolesArray) && $actOfAcceptance != null));

			$projectPlanValue = $workStatementValue || $deliveryInstructionsValue || $tasksValue || $risksValue || $minutesValue || $validationValue;
			$projectExecutionValue = $progressReportValue || $correctiveActionsValue;
			$softwareImplementationValue = $softwareRequirementsValue || $userManualValue || $softwareDesignValue || $operationManualValue || $maintenanceManualValue || $softwareComponentsValue;
			$projectClosureValue = $actOfAcceptanceValue;
		}

		$results = array(
			'workStatement'        => $workStatementValue,
			'deliveryInstructions' => $deliveryInstructionsValue,
			'tasks'                => $tasksValue,
			'risks'                => $risksValue,
			'minutes'              => $minutesValue,
			'validation'           => $validationValue,

			'progressReport'    => $progressReportValue,
			'correctiveActions' => $correctiveActionsValue,

			'softwareRequirements' => $softwareRequirementsValue,
			'userManual'           => $userManualValue,
			'softwareDesign'       => $softwareDesignValue,
			'operationManual'      => $operationManualValue,
			'maintenanceManual'    => $maintenanceManualValue,
			'softwareComponents'   => $softwareComponentsValue,
			'actOfAcceptance'      => $actOfAcceptanceValue,

			'projectPlan'            => $projectPlanValue,
			'projectExecution'       => $projectExecutionValue,
			'softwareImplementation' => $softwareImplementationValue,
			'projectClosure'         => $projectClosureValue,
		);
		return $results;
	}
}
?>
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
		$numbers    = array();
		$roles      = array();
		$rolesArray = explode(',', $rolesString);
		$rolesPreString = array();

		$count = 0;
		foreach ($rolesArray as $key) {
			if ($key > 0){
				array_push($numbers, '/\b' . $count . '\b/i');
				array_push($roles, ' ' . Language::$rolesArray[$count]);
				array_push($rolesPreString, $count);
			}
			$count++;
		}
		$rolesString = implode(',', $rolesPreString);
		return preg_replace($numbers, $roles, $rolesString);
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
					if ($person->id == $peopleArray[$position]){
						array_push($peopleNameAndRole, ' ' . $person->first_name . ' ' . $person->middle_name . ' ' . $person->last_name . ' (' . Language::$rolesArray[$rolePosition]  . ')');
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
}
?>
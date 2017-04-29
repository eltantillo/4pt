<?php

class ProductsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','workStatement','deliveryInstructions','tasks','taskadmin','taskdelete','risks','riskadmin','riskdelete','minutes','minuteadmin','minutedelete','projectplanvalidate','progressreports','progressreportadmin','correctiveactions','correctiveactionadmin','softwarerequirements','usermanual','softwaredesign','traceabilityrecord','operationmanual','maintenancemanual','softwarecomponents','softwarecomponentAdmin','testreports','testreportadmin','actofacceptance'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays the list of available tasks.
	 */
	public function actionView()
	{
		/*$sessionUser = people::model()->findAllByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);*/
		$project = $this->loadModel();
		$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));
		$workStatement = work_statement::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$deliveryInstructions = delivery_instructions::model()->findByAttributes(
			array('project_plan_id'=>$projectPlan->id)
			);
		$tasks = tasks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC')
			);
		$risks = risks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC')
			);
		$minutes = minutes::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC')
			);
		$progressReports = progress_reports::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$correctiveActions = corrective_actions::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$softwareRequirements = software_requirements::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$userManual = user_manual::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$softwareDesign = software_design::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$traceabilityRecord = traceability_record::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$operationManual = operation_manual::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$maintenanceManual = maintenance_manual::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$softwareComponents = software_component::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$testReports = test_report::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$actOfAcceptance = act_of_acceptance::model()->findByAttributes(
			array('process_id'=>$process->id)
			);

		$this->render('view',array(
			'project'              => $project,
			'projectPlan'          => $projectPlan,
			'workStatement'        => $workStatement,
			'deliveryInstructions'        => $deliveryInstructions,
			'tasks'                => $tasks,
			'risks'                => $risks,
			'minutes'              => $minutes,
			'progressReports'      => $progressReports,
			'correctiveActions'    => $correctiveActions,
			'softwareRequirements' => $softwareRequirements,
			'userManual'           => $userManual,
			'softwareDesign'       => $softwareDesign,
			'traceabilityRecord'   => $traceabilityRecord,
			'operationManual'      => $operationManual,
			'maintenanceManual'    => $maintenanceManual,
			'softwareComponents'   => $softwareComponents,
			'testReports'          => $testReports,
			'actOfAcceptance'      => $actOfAcceptance,
		));
	}

	/**
	 * Lists all projects.
	 */
	public function actionIndex()
	{
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$projects = projects::model()->findAllbyAttributes(array('company_id'=>$sessionUser->company_id));

		$this->render('index',array(
			'sessionUser'=>$sessionUser,
			'projects'=>$projects,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=projects::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}

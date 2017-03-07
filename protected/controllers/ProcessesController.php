<?php

class ProcessesController extends Controller
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
				'actions'=>array('create','update','workStatement','deliveryInstructions','tasks','taskadmin','risks','riskadmin','minutes','minuteadmin','softwarerequirements','usermanual','softwaredesign','traceabilityrecord','operationmanual','maintenancemanual','softwarecomponent','testreports','testreportadmin'),
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
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);
		$project = $this->loadModel();
		$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$workStatement = work_statement::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$this->render('view',array(
			'project'=>$project,
			'workStatement'=>$workStatement,
			'sessionUser'=>$sessionUser,
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
			'projects'=>$projects,
		));
	}

	public function actionWorkStatement(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project = $this->loadModel();
		$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model   = work_statement::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		
		if ($model === null || $model->change_request){
			$tempModel         = $model;
			$model             = new work_statement;
			$model->process_id = $process->id;

			if ($tempModel != null){
				$model->change_request_details = $tempModel->change_request_details;
				$model->product_description    = $tempModel->product_description;
				$model->scope                  = $tempModel->scope;
				$model->objectives             = $tempModel->objectives;
				$model->deliverables           = $tempModel->deliverables;
			}
		}

		if(isset($_POST['work_statement']))
		{
			$model->attributes=$_POST['work_statement'];
			if (in_array(1, $sessionUser->rolesArray) && $model->sent){
				$model->change_request_details = null;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('workStatement',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionDeliveryInstructions(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));
		$model       = delivery_instructions::model()->findByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC')
			);

		if ($model === null){
			$tempModel              = $model;
			$model                  = new delivery_instructions;
			$model->project_plan_id = $projectPlan->id;
		}

		if(isset($_POST['delivery_instructions']))
		{
			$model->attributes=$_POST['delivery_instructions'];
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('deliveryInstructions',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionTasks(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));
		$model       = tasks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id)
			);

		$this->render('tasks',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionTaskAdmin(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));

		if (isset($_GET['taskID'])){
			$model       = tasks::model()->findByAttributes(array('id'=>$_GET['taskID']));
		}
		else{
			$model                  = new tasks;
			$model->project_plan_id = $projectPlan->id;
		}

		if(isset($_POST['tasks']))
		{
			$model->attributes=$_POST['tasks'];
			if($model->save())
				$this->redirect(array('tasks','id'=>$project->id));
		}

		$this->render('taskAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionRisks(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));
		$model       = risks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id)
			);

		$this->render('risks',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionRiskAdmin(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));

		if (isset($_GET['riskID'])){
			$model       = risks::model()->findByAttributes(array('id'=>$_GET['riskID']));
		}
		else{
			$model                  = new risks;
			$model->project_plan_id = $projectPlan->id;
		}

		if(isset($_POST['risks']))
		{
			$model->attributes=$_POST['risks'];
			if($model->save())
				$this->redirect(array('risks','id'=>$project->id));
		}

		$this->render('riskAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionMinutes(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));
		$model       = minutes::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id)
			);

		$this->render('minutes',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionMinuteAdmin(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));

		if (isset($_GET['minuteID'])){
			$model       = minutes::model()->findByAttributes(array('id'=>$_GET['minuteID']));
		}
		else{
			$model                  = new minutes;
			$model->project_plan_id = $projectPlan->id;
		}

		if(isset($_POST['minutes']))
		{
			$model->attributes=$_POST['minutes'];
			if ($model->previous_minute_id == ''){
				$model->previous_minute_id = null;
			}
			if($model->save())
				$this->redirect(array('minutes','id'=>$project->id));
		}

		$this->render('minuteAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionSoftwareRequirements(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = software_requirements::model()->findByAttributes(array('process_id'=>$process->id));

		if ($model === null){
			$tempModel         = $model;
			$model             = new software_requirements;
			$model->process_id = $process->id;
		}

		if(isset($_POST['software_requirements']))
		{
			$model->attributes=$_POST['software_requirements'];
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('softwareRequirements',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionUserManual(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = user_manual::model()->findByAttributes(array('process_id'=>$process->id));

		if ($model === null){
			$tempModel         = $model;
			$model             = new user_manual;
			$model->process_id = $process->id;
		}

		if(isset($_POST['user_manual']))
		{
			$model->attributes=$_POST['user_manual'];
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('userManual',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionSoftwareDesign(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = software_design::model()->findByAttributes(array('process_id'=>$process->id));

		if ($model === null){
			$tempModel         = $model;
			$model             = new software_design;
			$model->process_id = $process->id;
		}

		if(isset($_POST['software_design']))
		{
			$model->attributes=$_POST['software_design'];
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('softwareDesign',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionTraceabilityRecord(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = traceability_record::model()->findByAttributes(array('process_id'=>$process->id));

		if ($model === null){
			$tempModel         = $model;
			$model             = new traceability_record;
			$model->process_id = $process->id;
		}

		if(isset($_POST['traceability_record']))
		{
			$model->attributes=$_POST['traceability_record'];
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('traceabilityRecord',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionOperationManual(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = operation_manual::model()->findByAttributes(array('process_id'=>$process->id));

		if ($model === null){
			$tempModel         = $model;
			$model             = new operation_manual;
			$model->process_id = $process->id;
		}

		if(isset($_POST['operation_manual']))
		{
			$model->attributes=$_POST['operation_manual'];
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('operationManual',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionMaintenanceManual(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = maintenance_manual::model()->findByAttributes(array('process_id'=>$process->id));

		if ($model === null){
			$tempModel         = $model;
			$model             = new maintenance_manual;
			$model->process_id = $process->id;
		}

		if(isset($_POST['maintenance_manual']))
		{
			$model->attributes=$_POST['maintenance_manual'];
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('maintenanceManual',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionSoftwareComponent(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = software_component::model()->findByAttributes(array('process_id'=>$process->id));

		if ($model === null){
			$tempModel         = $model;
			$model             = new software_component;
			$model->process_id = $process->id;
		}

		if(isset($_POST['software_component']))
		{
			$model->attributes=$_POST['software_component'];
			if($model->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('softwareComponent',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionTestReports(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = test_report::model()->findAllByAttributes(
			array('process_id'=>$process->id)
			);

		$this->render('testReports',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
		));
	}

	public function actionTestReportAdmin(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));

		if (isset($_GET['testReportID'])){
			$model       = test_report::model()->findByAttributes(array('id'=>$_GET['testReportID']));
		}
		else{
			$model                  = new test_report;
			$model->process_id = $process->id;
		}

		if(isset($_POST['test_report']))
		{
			$model->attributes=$_POST['test_report'];
			if($model->save())
				$this->redirect(array('testreports','id'=>$project->id));
		}

		$this->render('testReportAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
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

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='processes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

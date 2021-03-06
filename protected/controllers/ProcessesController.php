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
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);
		$project = $this->loadModel();
		$template = null;
		if ($project->template > 0){
			$template = templates::model()->findByAttributes(array('id'=>$project->template));
		}
		$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));
		$actOfAcceptance = act_of_acceptance::model()->findByAttributes(
			array('process_id'=>$process->id)
			);
		$workStatement = work_statement::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$deliveryInstructions = delivery_instructions::model()->findByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC')
			);
		$softwareRequirements = software_requirements::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$userManual = user_manual::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$softwareDesign = software_design::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$traceabilityRecord = traceability_record::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$operationManual = operation_manual::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$maintenanceManual = maintenance_manual::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$softwareComponent = software_component::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$minutes = minutes::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC')
			);
		$tasks = tasks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC')
			);
		$risks = risks::model()->findAllByAttributes(
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
		$softwareComponents = software_component::model()->findAllByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		$minutesValidated = false;
		foreach ($minutes as $minute) {
			if($minute->client_validated){
				$minutesValidated = true;
			}
			else{
				$minutesValidated = false;
				break;
			}
		}

		$this->render('view',array(
			'project'              => $project,
			'template'             => $template,
			'projectPlan'          => $projectPlan,
			'actOfAcceptance'      => $actOfAcceptance,
			'workStatement'        => $workStatement,
			'deliveryInstructions' => $deliveryInstructions,
			'tasks'                => $tasks,
			'minutes'              => $minutes,
			'risks'                => $risks,
			'progressReports'      => $progressReports,
			'correctiveActions'    => $correctiveActions,
			'softwareComponents'   => $softwareComponents,
			'softwareRequirements' => $softwareRequirements,
			'userManual'           => $userManual,
			'softwareDesign'       => $softwareDesign,
			'traceabilityRecord'   => $traceabilityRecord,
			'operationManual'      => $operationManual,
			'maintenanceManual'    => $maintenanceManual,
			'softwareComponent'    => $softwareComponent,
			'sessionUser'          => $sessionUser,
			'minutesValidated'     => $minutesValidated,
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

	public function actionWorkStatement(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project = $this->loadModel();
		$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));
		
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
			if (in_array(2, $sessionUser->rolesArray) && $model->sent){
				$model->change_request_details = null;
			}
			if($model->save()){
				$projectPlan->project_manager_validated  = 0;
				$projectPlan->technical_leader_validated = 0;
				$projectPlan->save();
				$this->redirect(array('view','id'=>$project->id));
			}
		}

		$this->render('workStatement',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
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
			if($model->save()){
				$projectPlan->project_manager_validated = 0;
				$projectPlan->technical_leader_validated = 0;
				$projectPlan->save();
				$this->redirect(array('view','id'=>$project->id));
			}
		}

		$this->render('deliveryInstructions',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
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
			'project'=>$project,
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

			if($model->start_date == ''){$model->start_date = null;}
			if($model->people_id == ''){$model->people_id = null;}
			if($model->save()){
				$projectPlan->project_manager_validated = 0;
				$projectPlan->technical_leader_validated = 0;
				$projectPlan->save();
				$this->redirect(array('tasks','id'=>$project->id));
			}
		}

		$this->render('taskAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionTaskDelete(){
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$task = tasks::model()->findByAttributes(array('id'=>$_GET['taskID']));
			$task->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('tasks','id'=>$_GET['id']));
		}
		else
			throw new CHttpException(400,Language::$invalidRequest);
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
			'project'=>$project,
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
			if($model->save()){
				$projectPlan->project_manager_validated = 0;
				$projectPlan->technical_leader_validated = 0;
				$projectPlan->save();
				$this->redirect(array('risks','id'=>$project->id));
			}
		}

		$this->render('riskAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionRiskDelete(){
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$task = risks::model()->findByAttributes(array('id'=>$_GET['riskID']));
			$task->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('risks','id'=>$_GET['id']));
		}
		else
			throw new CHttpException(400,Language::$invalidRequest);
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
			'project'=>$project,
		));
	}

	public function actionMinuteAdmin(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));

		$lastMinute = minutes::model()->findByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC'));

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
			if ($lastMinute != null){
				$model->previous_minute_id = $lastMinute->id;
			}
			else{
				$model->previous_minute_id = null;
			}

			if($model->date == ''){$model->date = null;}
			if($model->next_meeting == ''){$model->next_meeting = null;}
			if($model->save()){
				$projectPlan->project_manager_validated = 0;
				$projectPlan->technical_leader_validated = 0;
				$projectPlan->save();
				$this->redirect(array('minutes','id'=>$project->id));
			}
		}

		$this->render('minuteAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionMinuteDelete(){
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$task = minutes::model()->findByAttributes(array('id'=>$_GET['minuteID']));
			$task->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('minutes','id'=>$_GET['id']));
		}
		else
			throw new CHttpException(400,Language::$invalidRequest);
	}

	public function actionProjectPlanValidate(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));

		$workStatement = work_statement::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC'));
		$deliveryInstructions = delivery_instructions::model()->findByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC'));
		$tasks = tasks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));
		$risks = risks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));
		$minutes = minutes::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));

		if (isset($_GET['minuteID'])){
			$model       = minutes::model()->findByAttributes(array('id'=>$_GET['minuteID']));
		}
		else{
			$model                  = new minutes;
			$model->project_plan_id = $projectPlan->id;
		}

		if(isset($_POST['project_plan']))
		{
			$projectPlan->attributes=$_POST['project_plan'];
			if($projectPlan->save())
				$this->redirect(array('view','id'=>$project->id));
		}

		$this->render('projectPlan',array(
			'model'=>$projectPlan,
			'sessionUser'=>$sessionUser,
			'workStatement'=>$workStatement,
			'deliveryInstructions'=>$deliveryInstructions,
			'tasks'=>$tasks,
			'risks'=>$risks,
			'minutes'=>$minutes,
			'project'=>$project,
		));
	}

	public function actionProgressReports(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = progress_reports::model()->findAllByAttributes(
			array('process_id'=>$process->id)
			);

		$this->render('progressReports',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionProgressReportAdmin(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(
			array('project_id'=>$project->id),
			array('order'=>'id DESC'));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));

		$workStatement = work_statement::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC'));
		$deliveryInstructions = delivery_instructions::model()->findByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC'));
		$tasks = tasks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));
		$risks = risks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));
		$minutes = minutes::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));

		if (isset($_GET['progressReportID'])){
			$model       = progress_reports::model()->findByAttributes(array('id'=>$_GET['progressReportID']));
		}
		else{
			$model                  = new progress_reports;
			$model->process_id = $process->id;
		}

		if(isset($_POST['progress_reports']))
		{
			$model->attributes=$_POST['progress_reports'];
			if($model->save())
				$this->redirect(array('progressreports','id'=>$project->id));
		}

		$this->render('progressReportAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'workStatement'=>$workStatement,
			'deliveryInstructions'=>$deliveryInstructions,
			'tasks'=>$tasks,
			'risks'=>$risks,
			'minutes'=>$minutes,
			'project'=>$project,
		));
	}

	public function actionCorrectiveActions(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model       = corrective_actions::model()->findAllByAttributes(
			array('process_id'=>$process->id)
			);

		$this->render('correctiveActions',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionCorrectiveActionAdmin(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));

		if (isset($_GET['correctiveActionID'])){
			$model       = corrective_actions::model()->findByAttributes(array('id'=>$_GET['correctiveActionID']));
		}
		else{
			$model                  = new corrective_actions;
			$model->process_id = $process->id;
		}

		if(isset($_POST['corrective_actions']))
		{
			$model->attributes=$_POST['corrective_actions'];
			if ($model->responsible_id == ''){
				$model->responsible_id = null;
			}
			if ($model->open_date == ''){
				$model->open_date = null;
			}
			if ($model->close_date == ''){
				$model->close_date = null;
			}
			if($model->save())
				$this->redirect(array('correctiveactions','id'=>$project->id));
		}

		$this->render('correctiveActionAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionSoftwareRequirements(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));

		$workStatement = work_statement::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC'));
		$deliveryInstructions = delivery_instructions::model()->findByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC'));
		$tasks = tasks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));
		$risks = risks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));
		$minutes = minutes::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));

		$model   = software_requirements::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC'));
		
		if ($model === null || $model->change_request){
			$tempModel         = $model;
			$model             = new software_requirements;
			$model->process_id = $process->id;

			if ($tempModel != null){
				$model->change_request_details = $tempModel->change_request_details;
				$model->introduction           = $tempModel->introduction;
				$model->functionality          = $tempModel->functionality;
				$model->user_interface         = $tempModel->user_interface;
				$model->external_interfaces    = $tempModel->external_interfaces;
				$model->reliability            = $tempModel->reliability;
				$model->efficiency             = $tempModel->efficiency;
				$model->maintenance            = $tempModel->maintenance;
				$model->portability            = $tempModel->portability;
				$model->limitations            = $tempModel->limitations;
				$model->interoperability       = $tempModel->interoperability;
				$model->reuse                  = $tempModel->reuse;
				$model->legal                  = $tempModel->legal;

				$model->functionality_file       = $tempModel->functionality_file;
				$model->user_interface_file      = $tempModel->user_interface_file;
				$model->external_interfaces_file = $tempModel->external_interfaces_file;
				$model->reliability_file         = $tempModel->reliability_file;
				$model->efficiency_file          = $tempModel->efficiency_file;
				$model->maintenance_file         = $tempModel->maintenance_file;
				$model->portability_file         = $tempModel->portability_file;
				$model->limitations_file         = $tempModel->limitations_file;
				$model->interoperability_file    = $tempModel->interoperability_file;
				$model->reuse_file               = $tempModel->reuse_file;
				$model->legal_file               = $tempModel->legal_file;
			}
		}

		if(isset($_POST['software_requirements']))
		{
			$model->attributes = $_POST['software_requirements'];

			$functionality_file       = CUploadedFile::getInstance($model,'functionality_file');
			$user_interface_file      = CUploadedFile::getInstance($model,'user_interface_file');
			$external_interfaces_file = CUploadedFile::getInstance($model,'external_interfaces_file');
			$reliability_file         = CUploadedFile::getInstance($model,'reliability_file');
			$efficiency_file          = CUploadedFile::getInstance($model,'efficiency_file');
			$maintenance_file         = CUploadedFile::getInstance($model,'maintenance_file');
			$portability_file         = CUploadedFile::getInstance($model,'portability_file');
			$limitations_file         = CUploadedFile::getInstance($model,'limitations_file');
			$interoperability_file    = CUploadedFile::getInstance($model,'interoperability_file');
			$reuse_file               = CUploadedFile::getInstance($model,'reuse_file');
			$legal_file               = CUploadedFile::getInstance($model,'legal_file');

			if ((in_array(2, $sessionUser->rolesArray) || in_array(3, $sessionUser->rolesArray)) && $model->sent){
				$model->change_request_details = null;
			}
			
			if($model->save()){
				$path = 'files/' . $sessionUser->company_id . '/' . $project->id . '/softwareRequirements/'. $model->id . '/';

				if (!file_exists($path)){
					mkdir($path);
				}

				if ($functionality_file != null){
					$ext = explode('.' , $functionality_file)[1];
					$file = $path . 'functionality_file.' . $ext;
	            	$functionality_file->saveAs($file);
	            	$model->functionality_file = $file;
				}

				if ($user_interface_file != null){
					$ext = explode('.' , $user_interface_file)[1];
					$file = $path . 'user_interface_file.' . $ext;
	            	$user_interface_file->saveAs($file);
	            	$model->user_interface_file = $file;
				}

				if ($external_interfaces_file != null){
					$ext = explode('.' , $external_interfaces_file)[1];
					$file = $path . 'external_interfaces_file.' . $ext;
	            	$external_interfaces_file->saveAs($file);
	            	$model->external_interfaces_file = $file;
				}

				if ($reliability_file != null){
					$ext = explode('.' , $reliability_file)[1];
					$file = $path . 'reliability_file.' . $ext;
	            	$reliability_file->saveAs($file);
	            	$model->reliability_file = $file;
				}

				if ($efficiency_file != null){
					$ext = explode('.' , $efficiency_file)[1];
					$file = $path . 'efficiency_file.' . $ext;
	            	$efficiency_file->saveAs($file);
	            	$model->efficiency_file = $file;
				}

				if ($maintenance_file != null){
					$ext = explode('.' , $maintenance_file)[1];
					$file = $path . 'maintenance_file.' . $ext;
	            	$maintenance_file->saveAs($file);
	            	$model->maintenance_file = $file;
				}

				if ($portability_file != null){
					$ext = explode('.' , $portability_file)[1];
					$file = $path . 'portability_file.' . $ext;
	            	$portability_file->saveAs($file);
	            	$model->portability_file = $file;
				}

				if ($limitations_file != null){
					$ext = explode('.' , $limitations_file)[1];
					$file = $path . 'limitations_file.' . $ext;
	            	$limitations_file->saveAs($file);
	            	$model->limitations_file = $file;
				}

				if ($interoperability_file != null){
					$ext = explode('.' , $interoperability_file)[1];
					$file = $path . 'interoperability_file.' . $ext;
	            	$interoperability_file->saveAs($file);
	            	$model->interoperability_file = $file;
				}

				if ($reuse_file != null){
					$ext = explode('.' , $reuse_file)[1];
					$file = $path . 'reuse_file.' . $ext;
	            	$reuse_file->saveAs($file);
	            	$model->reuse_file = $file;
				}

				if ($legal_file != null){
					$ext = explode('.' , $legal_file)[1];
					$file = $path . 'legal_file.' . $ext;
	            	$legal_file->saveAs($file);
	            	$model->legal_file = $file;
				}

				$model->update();
				$this->redirect(array('view','id'=>$project->id));
			}
		}

		$this->render('softwareRequirements',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'workStatement'=>$workStatement,
			'deliveryInstructions'=>$deliveryInstructions,
			'tasks'=>$tasks,
			'risks'=>$risks,
			'minutes'=>$minutes,
			'project'=>$project,
		));
	}

	public function actionUserManual(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));

		$softwareRequirements = software_requirements::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$softwareDesign = software_design::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		$model   = user_manual::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

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
			'softwareRequirements'=>$softwareRequirements,
			'softwareDesign'=>$softwareDesign,
			'project'=>$project,
		));
	}

	public function actionSoftwareDesign(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));

		$softwareRequirements   = software_requirements::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		$model   = software_design::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		if ($model === null){
			$tempModel         = $model;
			$model             = new software_design;
			$model->process_id = $process->id;
		}

		if(isset($_POST['software_design']))
		{
			$model->attributes=$_POST['software_design'];

			$high_lvl_design_file = CUploadedFile::getInstance($model,'high_lvl_design_file');
			$low_lvl_design_file  = CUploadedFile::getInstance($model,'low_lvl_design_file');

			if($model->save()){
				$path = 'files/' . $sessionUser->company_id . '/' . $project->id . '/softwareDesign/'. $model->id . '/';

				if (!file_exists($path)){
					mkdir($path);
				}

				if ($high_lvl_design_file != null){
					$ext = explode('.' , $high_lvl_design_file)[1];
					$file = $path . 'high_lvl_design_file.' . $ext;
	            	$high_lvl_design_file->saveAs($file);
	            	$model->high_lvl_design_file = $file;
				}

				if ($low_lvl_design_file != null){
					$ext = explode('.' , $low_lvl_design_file)[1];
					$file = $path . 'low_lvl_design_file.' . $ext;
	            	$low_lvl_design_file->saveAs($file);
	            	$model->low_lvl_design_file = $file;
				}

				$model->update();
				$this->redirect(array('view','id'=>$project->id));
			}
		}

		$this->render('softwareDesign',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'softwareRequirements'=>$softwareRequirements,
			'project'=>$project,
		));
	}

	public function actionTraceabilityRecord(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));

		$softwareRequirements   = software_requirements::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		$model   = traceability_record::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

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
			'softwareRequirements'=>$softwareRequirements,
			'project'=>$project,
		));
	}

	public function actionOperationManual(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));

		$softwareRequirements = software_requirements::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$softwareDesign = software_design::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		$model   = operation_manual::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		if ($model === null){
			$tempModel         = $model;
			$model             = new operation_manual;
			$model->process_id = $process->id;
		}

		if(isset($_POST['operation_manual']))
		{
			$model->attributes=$_POST['operation_manual'];

			$aditional_sources_file = CUploadedFile::getInstance($model,'aditional_sources_file');

			if($model->save()){
				$path = 'files/' . $sessionUser->company_id . '/' . $project->id . '/operationManual/'. $model->id . '/';

				if (!file_exists($path)){
					mkdir($path);
				}

				if ($aditional_sources_file != null){
					$ext = explode('.' , $aditional_sources_file)[1];
					$file = $path . 'aditional_sources_file.' . $ext;
	            	$aditional_sources_file->saveAs($file);
	            	$model->aditional_sources_file = $file;
				}

				$model->update();
				$this->redirect(array('view','id'=>$project->id));
			}
		}

		$this->render('operationManual',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'softwareRequirements'=>$softwareRequirements,
			'softwareDesign'=>$softwareDesign,
			'project'=>$project,
		));
	}

	public function actionMaintenanceManual(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$model   = maintenance_manual::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		if ($model === null){
			$tempModel         = $model;
			$model             = new maintenance_manual;
			$model->process_id = $process->id;
		}

		if(isset($_POST['maintenance_manual']))
		{
			$model->attributes=$_POST['maintenance_manual'];

			$enviroment_file = CUploadedFile::getInstance($model,'enviroment_file');

			if($model->save()){
				$path = 'files/' . $sessionUser->company_id . '/' . $project->id . '/maintenanceManual/'. $model->id . '/';

				if (!file_exists($path)){
					mkdir($path);
				}

				if ($enviroment_file != null){
					$ext = explode('.' , $enviroment_file)[1];
					$file = $path . 'enviroment_file.' . $ext;
	            	$enviroment_file->saveAs($file);
	            	$model->enviroment_file = $file;
				}

				$model->update();
				$this->redirect(array('view','id'=>$project->id));
			}
		}

		$this->render('maintenanceManual',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionSoftwareComponents(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));

		$model       = software_component::model()->findAllByAttributes(
			array('process_id'=>$process->id)
			);

		$this->render('softwareComponents',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionSoftwareComponentAdmin(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));

		$softwareDesign = software_design::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);
		$traceabilityRecord = traceability_record::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC')
			);

		if (isset($_GET['softwareComponentID'])){
			$model       = software_component::model()->findByAttributes(array('id'=>$_GET['softwareComponentID']));
		}
		else{
			$model                  = new software_component;
			$model->process_id = $process->id;
		}

		if(isset($_POST['software_component']))
		{
			$model->attributes=$_POST['software_component'];

			$component_file = CUploadedFile::getInstance($model,'file');

			if($model->save()){$path = 'files/' . $sessionUser->company_id . '/' . $project->id . '/softwareComponents/'. $model->id . '/';

				if (!file_exists($path)){
					mkdir($path);
				}

				if ($component_file != null){
					$ext = explode('.' , $component_file)[1];
					$file = $path . 'component_file.' . $ext;
	            	$component_file->saveAs($file);
	            	$model->file = $file;
				}

				$model->update();
				$this->redirect(array('softwarecomponents','id'=>$project->id));
			}
		}

		$this->render('softwareComponentAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'softwareDesign'=>$softwareDesign,
			'traceabilityRecord'=>$traceabilityRecord,
			'project'=>$project,
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
			'project'=>$project,
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
			$model             = new test_report;
			$model->process_id = $process->id;
		}

		if(isset($_POST['test_report']))
		{
			$model->attributes=$_POST['test_report'];
			if ($model->resolution_date != '') {
				$model->solver_id = $sessionUser->id;
			}
			else{
				$model->tester_id = $sessionUser->id;
			}

			if ($model->tester_id == ''){
				$model->tester_id = null;
			}
			if ($model->solver_id == ''){
				$model->solver_id = null;
			}
			if ($model->origin_date == ''){
				$model->origin_date = null;
			}
			if ($model->resolution_date == ''){
				$model->resolution_date = null;
			}

			if($model->save())
				$this->redirect(array('testreports','id'=>$project->id));
		}

		$this->render('testReportAdmin',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'project'=>$project,
		));
	}

	public function actionActOfAcceptance(){
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$sessionUser->rolesArray = explode(',', $sessionUser->roles);

		$project     = $this->loadModel();
		$process     = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));

		$workStatement = work_statement::model()->findByAttributes(
			array('process_id'=>$process->id),
			array('order'=>'id DESC'));
		$deliveryInstructions = delivery_instructions::model()->findByAttributes(
			array('project_plan_id'=>$projectPlan->id),
			array('order'=>'id DESC'));
		$tasks = tasks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));
		$risks = risks::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));
		$minutes = minutes::model()->findAllByAttributes(
			array('project_plan_id'=>$projectPlan->id));

		$model       = act_of_acceptance::model()->findByAttributes(array('process_id'=>$process->id));

		if ($model === null){
			$model             = new act_of_acceptance;
			$model->process_id = $process->id;
		}

		if(isset($_POST['act_of_acceptance']))
		{
			$model->attributes=$_POST['act_of_acceptance'];
			if ($model->date == ''){$model->date = null;}
			if($model->save()){
				if ($model->client_validated)
					$this->redirect(array('index'));
				else
					$this->redirect(array('view','id'=>$project->id));
			}
		}

		$this->render('actOfAcceptance',array(
			'model'=>$model,
			'sessionUser'=>$sessionUser,
			'workStatement'=>$workStatement,
			'deliveryInstructions'=>$deliveryInstructions,
			'tasks'=>$tasks,
			'risks'=>$risks,
			'minutes'=>$minutes,
			'project'=>$project,
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

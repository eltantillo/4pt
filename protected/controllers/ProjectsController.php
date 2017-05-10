<?php

class projectsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
				'actions'=>array('index', 'view', 'admin', 'delete', 'create', 'update', 'createTemplate', 'editTemplate', 'roles', 'people'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new projects;
		$user  = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['projects']))
		{
			$model->attributes = $_POST['projects'];
			$model->company_id = $user->company_id;
			$model->product_type = 1;
			if ($model->template == 0){
				$model->template = null;
			}
			if($model->save()){
				$process = new processes;
				$process->project_id = $model->id;
				$process->save();
				$project = new project_plan;
				$project->process_id = $process->id;
				$project->save();

				$path = 'files/' . $user->company_id . '/' . $model->id . '/';
				mkdir($path);
				mkdir($path . 'maintenanceManual');
				mkdir($path . 'operationManual');
				mkdir($path . 'softwareComponents');
				mkdir($path . 'softwareDesign');
				mkdir($path . 'softwareRequirements');
				
				$this->redirect(array('Roles','ProjectId'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionRoles()
	{
		$model = projects::model()->findByAttributes(array('id'=>$_GET['ProjectId']));
		$roles = "";

		if(isset($_POST['projects']))
		{
			foreach($_POST['projects'] as $role_id){
				for ($i=0; $i < 6 ; $i++) {
					if ($role_id[$i] == null || !ctype_digit($role_id[$i]) || (int)$role_id[$i] < 1){
						$role_id[$i] = 1;
					}
				}
				$roles = implode(',', $role_id);
			}
			
			$model->roles = $roles;
			if($model->save())
				$this->redirect(array('people','ProjectId'=>$model->id));
		}

		$model->rolesArray = explode(',', $model->roles);
		if (sizeof($model->rolesArray) < 6){
			$model->rolesArray = array_fill(0,6,null);
		}

		$this->render('roles',array(
			'model'=>$model,
		));
	}

	public function actionPeople()
	{
		$model  = projects::model()->findByAttributes(array('id'=>$_GET['ProjectId']));
		$people = array();
		$model->rolesArray  = explode(',', $model->roles);
		$model->peopleArray = explode(',', $model->people);

		if(isset($_POST['projects']))
		{
			foreach($_POST['projects'] as $people_id){
				foreach ($people_id as $key) {
					array_push($people, $key);
				}

				$model->people = implode(',', $people);
			}
			if($model->save())
				$this->redirect(array('index'));
		}


		$this->render('people',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model = $this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['projects']))
		{
			$model->attributes=$_POST['projects'];
			if($model->save())
				$this->redirect(array('Roles','ProjectId'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$project = $this->loadModel();
			$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
			$projectPlan = project_plan::model()->findByAttributes(array('process_id'=>$process->id));
			$actOfAcceptance = act_of_acceptance::model()->findByAttributes(
				array('process_id'=>$process->id));
			$workStatement = work_statement::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$deliveryInstructions = delivery_instructions::model()->findAllByAttributes(
				array('project_plan_id'=>$projectPlan->id));
			$softwareRequirements = software_requirements::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$userManual = user_manual::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$softwareDesign = software_design::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$traceabilityRecord = traceability_record::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$operationManual = operation_manual::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$maintenanceManual = maintenance_manual::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$softwareComponent = software_component::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$minutes = minutes::model()->findAllByAttributes(
				array('project_plan_id'=>$projectPlan->id));
			$risks = risks::model()->findAllByAttributes(
				array('project_plan_id'=>$projectPlan->id));
			$tasks = tasks::model()->findAllByAttributes(
				array('project_plan_id'=>$projectPlan->id));

			$progressReports = progress_reports::model()->findAllByAttributes(
				array('process_id'=>$process->id));
			$correctiveActions = corrective_actions::model()->findAllByAttributes(
				array('process_id'=>$process->id));

			$testReports = test_report::model()->findAllByAttributes(
				array('process_id'=>$process->id));

			foreach ($workStatement as $key) {
				$key->delete();
			}
			foreach ($deliveryInstructions as $key) {
				$key->delete();
			}
			foreach ($tasks as $key) {
				$key->delete();
			}
			foreach ($risks as $key) {
				$key->delete();
			}
			foreach ($minutes as $key) {
				$key->delete();
			}

			foreach ($progressReports as $key) {
				$key->delete();
			}
			foreach ($correctiveActions as $key) {
				$key->delete();
			}

			foreach ($softwareRequirements as $key) {
				$key->delete();
			}
			foreach ($userManual as $key) {
				$key->delete();
			}
			foreach ($softwareDesign as $key) {
				$key->delete();
			}
			foreach ($traceabilityRecord as $key) {
				$key->delete();
			}
			foreach ($operationManual as $key) {
				$key->delete();
			}
			foreach ($maintenanceManual as $key) {
				$key->delete();
			}
			foreach ($softwareComponent as $key) {
				$key->delete();
			}
			foreach ($testReports as $key) {
				$key->delete();
			}

			if ($actOfAcceptance != null)
				$actOfAcceptance->delete();

			$projectPlan->delete();
			$process->delete();
			$project->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$user  = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$dataProvider = projects::model()->findAllByAttributes(array('company_id'=>$user->company_id));*/

		$user  = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$templates  = templates::model()->findAllByAttributes(array('company_id'=>$user->company_id));

		$criteria = new CDbCriteria;
		$criteria->compare('company_id',$user->company_id);
		$dataProvider = new CActiveDataProvider('projects', array('criteria'=>$criteria,));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'templates'=>$templates,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new projects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['projects']))
			$model->attributes=$_GET['projects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateTemplate()
	{
		$model = new templates;
		$user  = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['templates']))
		{
			$model->attributes=$_POST['templates'];
			$model->company_id = $user->company_id;
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('template',array(
			'model'=>$model,
		));
	}

	public function actionEditTemplate()
	{
		$model = new templates;
		if(isset($_GET['id']))
			$model=templates::model()->findbyPk($_GET['id']);

		$user = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['templates']))
		{
			$model->attributes=$_POST['templates'];
			$model->company_id = $user->company_id;
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('template',array(
			'model'=>$model,
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

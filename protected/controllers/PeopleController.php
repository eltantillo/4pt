<?php

class peopleController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete', 'habilities', 'capabilities', 'roles'),
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
		$sessionUser = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
		$user = $this->loadModel();

		if ($user->company_id == $sessionUser->company_id){
			$this->render('view',array(
				'model'=>$user,
			));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new people;
		$user  = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['people']))
		{
			$model->attributes=$_POST['people'];
			$model->company_id = $user->company_id;
			$model->password = md5($model->password);
			try{
				if($model->save()){
					$this->redirect(array('Habilities','userId'=>$model->id));
				}
			}
			catch(CDbException $e) {
				$model->addError(null, Language::$duplcateEmail);
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionHabilities()
	{
		$model = people::model()->findByAttributes(array('id'=>$_GET['userId']));

		$habilities = "";

		if(isset($_POST['people']))
		{
			foreach($_POST['people'] as $checkbox_id){
				if ($checkbox_id != null){
					$habilities = implode(',', $checkbox_id);
				}
			}
			
			$model->habilities = $habilities;
			if($model->save())
				$this->redirect(array('Capabilities','userId'=>$model->id));
		}
		$model->habilitiesArray = explode(',', $model->habilities);

		$this->render('habilities',array(
			'model'=>$model,
		));
	}

	public function actionCapabilities()
	{
		$model = people::model()->findByAttributes(array('id'=>$_GET['userId']));

		$capabilities = "";

		if(isset($_POST['people']))
		{
			foreach($_POST['people'] as $checkbox_id){
				if ($checkbox_id != null){
					$capabilities = implode(',', $checkbox_id);
				}
			}
			
			$model->capabilities = $capabilities;
			echo $model->capabilities;
			if($model->save())
				$this->redirect(array('Roles','userId'=>$model->id));
		}
		$model->habilitiesArray = explode(',', $model->habilities);
		$model->capabilitiesArray = explode(',', $model->capabilities);

		$this->render('capabilities',array(
			'model'=>$model,
		));
	}

	public function actionRoles()
	{
		$model = people::model()->findByAttributes(array('id'=>$_GET['userId']));

		$roles = "";

		if(isset($_POST['people']))
		{
			foreach($_POST['people'] as $checkbox_id){
				if ($checkbox_id != null){
					$roles = implode(',', $checkbox_id);
				}
			}
			
			$model->roles = $roles;
			echo $model->roles;
			if($model->save()){
				$this->redirect(array(
					'view',
					'id'=>$model->id,
				));
			}
		}
		
		$model->capabilitiesArray = explode(',', $model->capabilities);
		$model->rolesArray = explode(',', $model->roles);

		$this->render('roles',array(
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

		if(isset($_POST['people']))
		{
			$model->attributes=$_POST['people'];
			$user = people::model()->findByAttributes(array('id'=>$model->id));
			if ($model->password == ''){
				$model->password = $user->password;
			}
			else if ($user->password != $model->password){
				$model->password = md5($model->password);
			}
			try{
				if($model->save()){
					$this->redirect(array('Habilities','userId'=>$model->id));
				}
			}
			catch(CDbException $e) {
				$model->addError(null, Language::$duplcateEmail);
			}
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
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,Language::$invalidRequest);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$user = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));

		$dataProvider=new CActiveDataProvider('people', array(
		'criteria'=>array('condition'=>'company_id=' . $user->company_id),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new people('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['people']))
			$model->attributes=$_GET['people'];

		$this->render('admin',array(
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
				$this->_model=people::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,Language::$pageNoExists);
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='people-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

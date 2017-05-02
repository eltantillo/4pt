<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Displays the recover password page
	 */
	public function actionRecover()
	{
		$model = new people;
		$email = Yii::app()->request->getQuery('email');
		if (isset($_POST['email'])){
			$email = $_POST['email'];
		}
		$token = Yii::app()->request->getQuery('token');
		$user  = people::model()->findByAttributes(array('email' => $email));

		if(isset($token)){
			if($token == $user->password){
				//set new password
				if(isset($_POST['password'])){
					if ($_POST['password'] == $_POST['password2']){
						$user->password = md5($_POST['password']);
						$user->update();
						$this->redirect(array('/site/login'));
					}
					else{
						$this->render('message', array('message' => 5));
					}
				}
				else{
					$this->render('message', array('message' => 0));
				}
				
			}
			else{
				//invalid token
				$this->redirect(array('/'));
			}
		}
		else if (isset($email)){
			//send mail
			//phpinfo();
			if ($user != null){
				$headers = "MIME-Version: 1.0\r\n"; 
		        $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
		        $headers .= 'From: 4P+T <admin@4PT.com>' . "\r\n";
		        $headers .= 'Reply-To: admin@4PT.com\r\n';
		        $headers .= 'X-Mailer: PHP/' . phpversion();
		        mail($email,  'Recuperar contrasena', 'utilice el siguiente enlace para recuperar su contrasena: <br> ' .  Yii::app()->getBaseUrl(true) . '/site/recover/?email=' . $email . '&token=' . $user->password, $headers);

				$this->render('message', array('message' => 2, 'email' => $email));
			}
			else{
				$this->render('message', array('message' => 4));
			}
		}
		else{
			$this->render('message', array('message' => 3));
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
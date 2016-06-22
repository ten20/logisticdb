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
		/*
		$model=new LoginForm;
		$this->render('index',array('model'=>$model));
		*/
		//$this->render('index');
		$this->render('/menu/index');

	}	
	public function actionIndex_()
	{
		$models=new DockGain58;
		$datas=array();	
		//var_dump($_POST);	
		if(count($_POST)>0){
			$share_no = $_POST['DockGain58']["SHARE_NO"];
			$idno = $_POST['DockGain58']["password"];
			//$share_no = '14471';
			//$idno = '2392800970';
			$criteria = new CDbCriteria();
			$criteria->select = '*';
			$criteria->condition = " SHARE_NO = '$share_no' and (IDNO ='$idno' or ID13='$idno') ";
			$datas = DockGain58::model()->findAll($criteria);
            //echo "DATA=";
            //var_dump($datas);
			//  save Log
			if($datas){

			$url_address=$this->getId();
			$log_type='Login';
			$reference='share_no'.$share_no.' '.$datas[0]->CLASS.$datas[0]->NAME;
			// echo ชื่อ class :: ชื่อ function( ตัวแปรส่งค่า );
			LogAdd::save_log($url_address,$log_type,$reference,$share_no);
			
			//  save Log END
		}
            }
		$this->render('index',array('model'=>$models,'post'=>$_POST,'datas'=>$datas));
//        $models=new Evaluation;
//        $this->redirect(Yii::app()->baseUrl."/index.php/evaluation/evaluation");
	}
	public function actionGraph()
	{
        //$models = Evaluation::model()->findAll();
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
                 // Yii::app()->name=Globals::getOnwer();
		$this->render('graph');
//        $models=new Evaluation;
//        $this->redirect(Yii::app()->baseUrl."/index.php/evaluation/evaluation");
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
		$model=new LoginForm;

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
            //print_r($_POST['LoginForm']);
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                $url_address=$this->getId();
                $log_type='login';
                $reference='UserID='.$_POST['LoginForm']['username'];
                // echo ชื่อ class :: ชื่อ function( ตัวแปรส่งค่า );
                LogAdd::save_log($url_address,$log_type,$reference);
				$this->redirect(Yii::app()->user->returnUrl);
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
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
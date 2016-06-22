<?php

class MenuController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','admin','create','update','menu01','menu02','menu03','menu04','detail01','detail02','detail03','detail04','reform','menu0104'),
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
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionMenu01()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "id =1";
		$menu = IndustryH::model()->findAll($criteria);
		$this->render('menu01',array('menu'=>$menu));
	}
	public function actionMenu0104()
	{
		$this->render('menu0104');
	}

	public function actionMenu02()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "id in(2)";
		$menu = IndustryH::model()->findAll($criteria);
		$this->render('menu02',array('menu'=>$menu));
	}
	public function actionMenu03()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "id in(4,5)";
		$menu = IndustryH::model()->findAll($criteria);
		$this->render('menu03',array('menu'=>$menu));

	}
	public function actionMenu04()
	{
		$this->render('menu04');
	}
	public function actionDetail01()
	{
		$this->render('detail01');
	}
	public function actionDetail02()
	{
		$this->render('detail02');
	}
	public function actionDetail03()
	{
		$this->render('detail03');
	}
	public function actionDetail04()
	{
		$this->render('detail04');
	}
	public function actionReform()
	{
		$this->render('reform');
	}	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
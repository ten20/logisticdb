<?php

class ReportController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionProcure()
	{
		$model=new Procure;
		
		$model_unit=Unit::model()->findAll();

		$this->render('procure',array('model_unit'=>$model_unit));
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
<?php

class TbluserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('admin','create','update','viewme','updateme','AutoComplete'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
public function actionViewMe($id)
	{
		$this->render('viewme',array(
			'model'=>$this->loadModel($id),
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tbluser;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tbluser']))
		{
			$model->attributes=$_POST['Tbluser'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->user_id));
                        $model->user_pwd=md5($_POST['Tbluser']['user_pwd']);
			if($model->save()){
                           $lastid= $model->user_id;

                            //  save Log
                        $url_address=$this->getId();
                        $log_type='AddUser';
                         $reference='UserID='.$lastid.' '.$model->user_name.'
                        '.$model->first_name.' '.$model->last_name.' '.$model->email;
                        // echo ชื่อ class :: ชื่อ function( ตัวแปรส่งค่า );
                        LogAdd::save_log($url_address,$log_type,$reference);
                    //  save Log END
			$this->redirect(array('admin','id'=>$model->user_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tbluser']))
		{
			$model->attributes=$_POST['Tbluser'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->user_id));
			if(strlen($_POST['Tbluser']['user_pwd'])!=32){
				$model->user_pwd=md5($_POST['Tbluser']['user_pwd']);
			}
		    $model->modified=date("Y-m-d H:i:s");
				if($model->save()){
                            //  save Log
                        $url_address=$this->getId();
                        $log_type='UpdateUser';
                         $reference='UserID='.$model->user_id.' '.$model->user_name.'
                        '.$model->first_name.' '.$model->last_name.' '.$model->email;
                        // echo ชื่อ class :: ชื่อ function( ตัวแปรส่งค่า );
                        LogAdd::save_log($url_address,$log_type,$reference);
                    //  save Log END
				$this->redirect(array('admin','id'=>$model->user_id));
                        }

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionUpdateMe($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tbluser']))
		{
			$model->attributes=$_POST['Tbluser'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->user_id));
  if(strlen($_POST['Tbluser']['user_pwd'])!=32){
          $model->user_pwd=md5($_POST['Tbluser']['user_pwd']);
     }
          $model->modified=date("Y-m-d H:i:s");
			if($model->save()){
                            //  save Log
                        $url_address=$this->getId();
                        $log_type='UpdateUser';
                         $reference='UserID='.$model->user_id.' '.$model->user_name.'
                        '.$model->first_name.' '.$model->last_name.' '.$model->email;
                        // echo ชื่อ class :: ชื่อ function( ตัวแปรส่งค่า );
                        LogAdd::save_log($url_address,$log_type,$reference);
                    //  save Log END
				$this->redirect(array('admin','id'=>$model->user_id));
                        }

		}

		$this->render('updateme',array(
			'model'=>$model,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tbluser');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tbluser('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tbluser']))
			$model->attributes=$_GET['Tbluser'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tbluser the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tbluser::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tbluser $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbluser-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAutoComplete() {
			
		$criteria = new CDbCriteria;
	    $criteria->select = array('user_id','user_name','pre_name','first_name','last_name');

	    $criteria->addSearchCondition('pre_name',  strtoupper( $_GET['term']) ) ;
		$criteria->addSearchCondition('first_name', strtoupper ( $_GET['term']), true, 'or');
		$criteria->addSearchCondition('last_name', strtoupper ( $_GET['term']), true, 'or');
		$criteria->addSearchCondition('user_name', strtoupper ( $_GET['term']), true, 'or');
	        $criteria->limit = 15;
	        $data = TblUser::model()->findAll($criteria);

	        $res = array();
	        
	        foreach ($data as $item) {
	                        
	            $res[] = array(
	                'id' => $item->user_name,
	                'value' => $item->pre_name.$item->first_name.' '.$item->last_name,
	                'label' => $item->pre_name.$item->first_name.' '.$item->last_name."($item->user_name)",
	                                
	            );
	                        
	        }

	        echo CJSON::encode($res);
	}	

}//Class

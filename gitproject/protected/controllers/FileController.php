<?php

class FileController extends Controller
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
				'actions'=>array('create','update','adminshow','cotype'),
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
		$this->layout='column1';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id=null)
	{
		$model=new File;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['File']))
		{
			$model->attributes=$_POST['File'];
			//
 		if(!empty($_FILES)){
         /* อัพโหลดไฟล์ */
            // ชื่อ Field ที่ต้องการเก็บไฟล์
            $files = CUploadedFile::getInstances($model, 'filename');     
            $filenames = array();
 
            // กำหนดให้ใช้วันที่นำหน้าชื่อไฟล์ใหม่ Example. "2015-01-30-12-41-55"
            $name_filenew = $model->coid.'-'.date('Y-m-d-h-i-s', time());  
 
            if (isset($files) && count($files) > 0) {
 
                $id = 0;
                foreach ($files as $file) {
 
                    ++$id; // ลำดับไฟล์ที่ถูกอัพโหลดเข้ามา
                    // แบ่งแยกข้อมูลไฟล์ไฟล์ออกเป็น "ชื่อไฟล์" และ "นามสกุลไฟล์" Example. array('filename', 'pdf')
                    // ตั้งชื่อไฟล์ไฟล์ใหม่ เป็น "2015-01-30-12-41-55-1.pdf"
                    $name = explode(".", $file->name);   
                    $new_name = $name_filenew . "-" . $id . "." . $name[1];
 
                    /* Example. "2015-01-30-12-41-55-1.pdf"
                                "2015-01-30-12-41-55-2.pdf"
                                "2015-01-30-12-41-55-3.pdf"
                    */
 
                    // ระบุตำแหน่ง Path ที่ต้องการเก็บไฟล์ Example. [skeleton]\yii_workshop\uploadfiles
                    // Example. [skeleton]\yii_workshop\uploadfiles\2015-01-30-12-41-55-1.pdf
                    $path = Yii::getPathOfAlias('webroot') . '/uploadfiles/' . $new_name;
 
                    // อัพโหลดไฟล์เข้าไปเก็บไว้ตาม Path ที่ระบุด้านบน
                    if($file->saveAs($path)){
                        $filenames[] = $new_name;     // เพิ่มชื่อไฟล์ใหม่ลงไปในตัวแปร $filenames
                    }
 
                }
 
            }                    
 
            // เพิ่มข้อมูลชื่อไฟล์ลงในฐานข้อมูล Files (Field)
            // Example. 2015-01-30-12-41-55-1.pdf,2015-01-30-12-41-55-2.pdf (รูปแบบข้อมูลที่จะถูกบันทึกลงฐานข้อมูล)
            // แบ่งข้อมูลไฟล์ (array) เป็น (string) ด้วยเครื่องหมาย ","
            $model->filename = implode(",", $filenames); 			
			//
        }
			if($model->save()){
				$this->redirect(array('adminshow','id'=>$model->coid));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'id'=>$id,
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

		if(isset($_POST['File']))
		{
			$model->attributes=$_POST['File'];
			if(!empty($_FILES)){
         /* อัพโหลดไฟล์ */
            // ชื่อ Field ที่ต้องการเก็บไฟล์
            $files = CUploadedFile::getInstances($model, 'filename');     
            $filenames = array();
 
            // กำหนดให้ใช้วันที่นำหน้าชื่อไฟล์ใหม่ Example. "2015-01-30-12-41-55"
            $name_filenew = $model->coid.'-'.date('Y-m-d-h-i-s', time());  
 
            if (isset($files) && count($files) > 0) {
 
                $id = 0;
                foreach ($files as $file) {
 
                    ++$id; // ลำดับไฟล์ที่ถูกอัพโหลดเข้ามา
                    // แบ่งแยกข้อมูลไฟล์ไฟล์ออกเป็น "ชื่อไฟล์" และ "นามสกุลไฟล์" Example. array('filename', 'pdf')
                    // ตั้งชื่อไฟล์ไฟล์ใหม่ เป็น "2015-01-30-12-41-55-1.pdf"
                    $name = explode(".", $file->name);   
                    $new_name = $name_filenew . "-" . $id . "." . $name[1];
 
                    /* Example. "2015-01-30-12-41-55-1.pdf"
                                "2015-01-30-12-41-55-2.pdf"
                                "2015-01-30-12-41-55-3.pdf"
                    */
 
                    // ระบุตำแหน่ง Path ที่ต้องการเก็บไฟล์ Example. [skeleton]\yii_workshop\uploadfiles
                    // Example. [skeleton]\yii_workshop\uploadfiles\2015-01-30-12-41-55-1.pdf
                    $path = Yii::getPathOfAlias('webroot') . '/uploadfiles/' . $new_name;
 
                    // อัพโหลดไฟล์เข้าไปเก็บไว้ตาม Path ที่ระบุด้านบน
                    if($file->saveAs($path)){
                        $filenames[] = $new_name;     // เพิ่มชื่อไฟล์ใหม่ลงไปในตัวแปร $filenames
                    }
 
                }
 
            }                    
 
            // เพิ่มข้อมูลชื่อไฟล์ลงในฐานข้อมูล Files (Field)
            // Example. 2015-01-30-12-41-55-1.pdf,2015-01-30-12-41-55-2.pdf (รูปแบบข้อมูลที่จะถูกบันทึกลงฐานข้อมูล)
            // แบ่งข้อมูลไฟล์ (array) เป็น (string) ด้วยเครื่องหมาย ","
            $model->filename = implode(",", $filenames); 			
			//
        }
			if($model->save())
				$this->redirect(array('adminshow','id'=>$model->coid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionCotype($id=null)
	{
		$this->layout="column1";
		$model=new File('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['File']))
			$model->attributes=$_GET['File'];
		$cotypes = Cotype::model()->findByPk($id);
		//var_dump($cotypes->cotypename);
		//return;
		$this->render('cotypefile',array(
			'model'=>$model,
			'cotypename'=>$cotypes->cotypename,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('File');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new File('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['File']))
			$model->attributes=$_GET['File'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminShow()
	{
		$model=new File('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['File']))
			$model->attributes=$_GET['File'];

		$this->render('adminshow',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=File::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='file-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

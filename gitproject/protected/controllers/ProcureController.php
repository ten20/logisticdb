<?php

class ProcureController extends Controller
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
				'actions'=>array('create','update','ProcureType','ProcureStatus','AdminShow','Import','importcsv','importexcel','ImportExcelfile','report','ViewShow','search'),
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
	public function actionViewShow($id)
	{
		$this->layout='column1';
		$this->render('viewshow',array(
			'model'=>$this->loadModel($id),
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Procure;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Procure']))
		{
			$model->attributes=$_POST['Procure'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idprocure));
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

		if(isset($_POST['Procure']))
		{
			$model->attributes=$_POST['Procure'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idprocure));
		}

		$this->render('update',array(
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
		$dataProvider=new CActiveDataProvider('Procure');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Procure('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Procure']))
			$model->attributes=$_GET['Procure'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAdminShow()
	{
		$this->layout='column1';
		$model=new Procure('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Procure']))
			$model->attributes=$_GET['Procure'];

		$this->render('adminshow',array(
			'model'=>$model,
		));
	}
	public function actionSearch()
	{
		$this->layout='column1';
		$model=new Procure('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Procure']))
			$model->attributes=$_GET['Procure'];

		$this->render('search',array(
			'model'=>$model,
		));
	}

	public function actionProcureType()
	{
		$this->layout='column1';
		$model=new Procure('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Procure']))
			$model->attributes=$_GET['Procure'];
		//
		$procuretype='';
		$unitname='';
		if(isset($_GET['procuretype']))
		$procuretype=$_GET['procuretype'];
		if(isset($_GET['unitname']))
		$unitname=$_GET['unitname'];
		if(isset($_GET['budgetyear']))
		$budgetyear=$_GET['budgetyear'];
		$showunitname=$unitname;
		if(empty($unitname))
		$showunitname="รวม";
		$criteria=new CDbCriteria;
        $criteria->select = 'sum(approve_budget) as approve_budget';
        $criteria->condition="substr(budgetyear,1,2)='$budgetyear' and unitname='$unitname' and procure_type='$procuretype'";
        if(empty($procuretype))
    		$criteria->condition="substr(budgetyear,1,2)='$budgetyear' and unitname='$unitname'";
        $sumbudget = Procure::model()->find($criteria);
  
        $totalbudget=$sumbudget->approve_budget;
        //return;   
		//
		$this->render('procuretype',array(
			'model'=>$model,'totalbudget'=>$totalbudget,
		));
	}

	public function actionProcureStatus()
	{
		$this->layout='column1';

		$model=new Procure('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Procure']))
			$model->attributes=$_GET['Procure'];

		$this->render('procurestatus',array(
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
		$model=Procure::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='procure-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionImport()
	{
		$this->layout='column1';
		$this->render('import');
	}

	public function actionImportCsv(){
	$this->layout='column1';
	header('Content-Type: text/html; charset=utf-8');
	 $model=new UserImportForm;
	 $i=null;
           if(isset($_POST['UserImportForm']))
             {

               $model->attributes=$_POST['UserImportForm'];

               if($model->validate())
                 {

                  $csvFile=CUploadedFile::getInstance($model,'file');  
                  $tempLoc=$csvFile->getTempName();

			       	 //echo "<a href='".Yii::app()->request->baseUrl."/index.php/site/importcsv'>Upload CSV</a><br/>";
			
			        $csv = array();
				    $file = fopen($tempLoc, 'r');
				    while (($line = fgetcsv($file)) !== FALSE) {
				       //$line is an array of the csv elements
				        $csv[] = $line;
				    }
				    fclose($file);
				    $importqty=0;
				    for ($i = 1; $i < count($csv); $i++) {
				      $model = new Procure();
				      foreach ($csv[0] as $key => $value) {
				      	$data=$csv[$i][$key];
				      	//echo $data."<br/>";
				         $model->$value = $csv[$i][$key];
				     }
				        if($model->save()){
				          //do here what you want to do after saving model
				        	$importqty++;
				         }
				         //else{return $model->getErrors();}
				         
				    }
				    //echo $i." รายการ <br/><a href='".Yii::app()->request->baseUrl."/index.php/site/importcsv'>Upload CSV</a>";
				     $this->render("importcsv",array('model'=>$model,"importqty"=>$importqty)); 
				    return;
                 }
             }  

           $this->render("importcsv",array('model'=>$model,"importqty"=>$i));

	}		
public function actionImportExcel()
{
$this->layout='column1';
 $model=new ImportForm;
 //require_once Yii::app()->basePath.'/../upload/excel_reader2.php';
       
   if (isset($_POST['ImportForm']))
   {
     $a=$model->validate();
     if ($a) {
       //upload file
       $model->attributes=$_POST['ImportForm'];
       $file=CUploadedFile::getInstance($model,'file_excel');
       $file->saveAs(Yii::app()->basePath.'/../files/'.$file->name);
       ////
        $file = Yii::getPathOfAlias('webroot') . '/files/'.$file->name;
        Yii::import('application.vendors.PHPExcel',true);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load($file); //$file --> your filepath and filename
        
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
        $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
        $highestColumn = 'Q'; // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
        $highestColumnIndex=16;
        //echo '<table class="table table-border">' . "\n";
        
        //header
        $field=array();
        for ($row = 1; $row < 2; ++$row) {
          for ($col = 0; $col <= $highestColumnIndex; ++$col) {
            $field[$col]= trim($objWorksheet->getCellByColumnAndRow($col, $row)->getValue());
          }
        }
        $importqty=0;
        for ($row = 3; $row <= $highestRow; ++$row) {
          //echo '<tr>' . "\n";
          $modelprocure = new Procure();
          for ($col = 0; $col <= $highestColumnIndex; ++$col) {
            $value = trim($objWorksheet->getCellByColumnAndRow($col, $row)->getValue());
            if($col==0 && $row==1 && $value!='unitname'){
            	unlink ($file);
            	$modelprocure->$field[$col] = $value;
            	$errores = $modelprocure->getErrors();
//				return;
			} 
             $modelprocure->$field[$col] = $value;
           
            if($col==0)//unitname
  	          GLobals::setUnit($value);
  	        if($col==4)//procure_method
  	          GLobals::setProcureMethod($value);
            if($col==12)//country
  	          GLobals::setCountry($value);
  	          
 			}
          
          $modelprocure->save();
          ++$importqty;
       
    }
        
 		////
       
        Yii::app()->user->setFlash('success','นำเข้า '.$importqty.' รายการ เรียบร้อย...');
        //hapus file excel
        //unlink ($path);
        //$this->redirect(array('admin'));
       }
    }
    $this->render('importexcel',array('model'=>$model));
}
public function actionImportExcelfile()
{
$this->layout='column1';
 $model=new ImportForm;
 //require_once Yii::app()->basePath.'/../upload/excel_reader2.php';
       
 		$filename="2558.xlsx";
        $file = Yii::getPathOfAlias('webroot') . '/files/'.$filename;
        Yii::import('application.vendors.PHPExcel',true);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load($file); //$file --> your filepath and filename
        
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
        $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
        $highestColumn = 'Q'; // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
        $highestColumnIndex=16;
        //echo '<table class="table table-border">' . "\n";
        
        //header
        $field=array();
        for ($row = 1; $row < 2; ++$row) {
          for ($col = 0; $col <= $highestColumnIndex; ++$col) {
            $field[$col]= trim($objWorksheet->getCellByColumnAndRow($col, $row)->getValue());
          }
        }
        $importqty=0;
        for ($row = 3; $row <= $highestRow; ++$row) {
          //echo '<tr>' . "\n";
          $model = new Procure();
          for ($col = 0; $col <= $highestColumnIndex; ++$col) {
            $value = trim($objWorksheet->getCellByColumnAndRow($col, $row)->getValue());
            if($col==0 && $row==1 && $value!='unitname'){
            	unlink ($file);
            	$model->$field[$col] = $value;
            	$errores = $model->getErrors();
//				return;
			} 
             $model->$field[$col] = $value;
           /*	$global=new GLobals();
            if($col==0)//unitname
  	          $global->setUnit($value);
  	        if($col==4)//procure_method
  	          $global->setProcureMethod($value);
            if($col==12)//country
  	          $global->setCountry($value);
  	          */
 			}
          
          $model->save();
          ++$importqty;
       
    }
        
 		////
       
        Yii::app()->user->setFlash('success','นำเข้า '.$importqty.' รายการ เรียบร้อย...');
        //hapus file excel
        //unlink ($path);
        //$this->redirect(array('admin'));

    $this->render('importexcel',array('model'=>$model));
}
public function actionError()
{
    if($error=Yii::app()->errorHandler->error)
    {           
        if(Yii::app()->request->isAjaxRequest) {
        echo $error['message'];
    }
    else
        $this->render('error', $error);
    }
}	

	public function actionReport()
	{
		$this->layout='column1';
		$model=new Procure;
		
		$model_unit=Unit::model()->findAll();

		$this->render('report',array('model_unit'=>$model_unit));
	}
}

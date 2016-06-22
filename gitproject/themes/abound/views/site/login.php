<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
/*
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
*/
?><center><img src="<?php echo Yii::app()->request->baseUrl;?>/images/pic01.jpg" width="350"></center>

<!--<div class="page-header">
	<h1>Login <small><?php echo Yii::app()->name; ?></small></h1>
</div>-->
<br/>
<div class="row-fluid">
	
    <div class="span5 offset3">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"เข้าใช้งานเฉพาะผู้ที่ได้รับสิทธิ",
	));
	
?>

<!--    <p>Please fill out the following form with your login credentials:</p>-->
    
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    
        <p class="note">Fields with <span class="required">*</span> are required.</p>
    
        <div class="row">
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
            <!--<p class="hint">
                Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
            </p>-->
        </div>
    
       <!-- <div class="row rememberMe">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>-->
    
        <div class="row buttons">
            <?php echo CHtml::submitButton('เข้าระบบ',array('class'=>'btn btn-primary')); ?>
        </div>
    
    <?php $this->endWidget(); ?>
    </div><!-- form -->

<?php $this->endWidget();?>

    </div>

</div>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?>
                <br/></div>
            <div style="margin-left: 20px;font-size: 14px;font-weight: bold; color: blue;">กองส่งกำลังบำรุง สำนักนโยบายและแผน กรมการสื่อสารและเทคโนโลยีสารสนเทศทหารเรือ
                </div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'หน้าหลัก', 'url'=>array('/site/index')),
                array('label'=>'ทะเบียนหนังสือรับ','url'=>array('/evaluation/evaluation')),
				//array('label'=>'เกี่ยวกับระบบ', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'ติดต่อ', 'url'=>array('/site/contact')),
                array('label'=>'เพิ่มแบบสำรวจ', 'url'=>array('/evaluation'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'สรุปผลแบบสำรวจ', 'url'=>array('/evaluation/result')),
//                array('label'=>'สรุปผลแบบสำรวจ', 'url'=>array('/evaluation/result'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'ข้อมูลผู้ใช้ระบบ', 'url'=>array('/user'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'เข้าระบบ', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'ออกจากระบบ ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by กองพัฒนาระบบ ศทส.สสท.ทร.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

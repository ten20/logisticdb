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

		<div id="logo"> <?php echo CHtml::image(Yii::app()->baseUrl.'/images/ncc_logo.png', 'logo',array("width"=>"60px")); ?><?php echo CHtml::image(Yii::app()->baseUrl.'/images/arrest1.jpg', 'logo',array("width"=>"70px")); ?> <?php echo CHtml::encode(Yii::app()->name); ?>
                <br/></div>
            <!--<div style="margin-left: 20px;font-size: 14px;font-weight: bold; color: blue;">กองส่งกำลังบำรุง สำนักนโยบายและแผน กรมการสื่อสารและเทคโนโลยีสารสนเทศทหารเรือ
               </div>-->
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
                //echo Yii::app()->user->name;
			$user_level =  Yii::app()->user->getState('user_level');
            $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'หน้าหลัก', 'url'=>array('/site/index')),
                array('label'=>'บันทึกจับกุม', 'url'=>array('/ArrestData/admin'), 'visible'=>($user_level==1 || Yii::app()->user->name=='admin')),
                array('label'=>'ข้อมูลจับกุม', 'url'=>array('/ArrestData/showtype')),
                
                array('label'=>'รายงานการจับกุม', 'url'=>array('/ArrestData/index')),
                //array('label'=>'ข้อมูลผู้ใช้ระบบ', 'url'=>array('/tbluser/admin'), 'visible'=>Yii::app()->user->getState('user_level')==1),
//Setting
				array('label'=>'ตั้งค่าเริ่มต้น', 'url'=>array('/'), 
					'items'=>array(
					array('label'=>'หน่วยนับ', 'url'=>array('/UnitMeasure/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
	                array('label'=>'วัตถุประสงค์', 'url'=>array('/ArrestCategory/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
	                array('label'=>'เป้าหมาย', 'url'=>array('/ArrestGroup/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
	                array('label'=>'ประเภทจับกุม', 'url'=>array('/ArrestType/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
					array('label'=>'ประเภทเว็บไซต์', 'url'=>array('/webType/admin')),
					array('label'=>'การดำเนินการ', 'url'=>array('/operation/admin')),
					array('label'=>'สถานะเว็บไซต์', 'url'=>array('/webStatus/admin')),
				),'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),

                array('label'=>'ข้อมูลผู้ใช้ระบบ', 'url'=>array('/tbluser/admin'), 'visible'=>(Yii::app()->user->getState('user_level')==1 || Yii::app()->user->name=='admin')),
                array('label'=>'ตั้งค่าหน่วยผู้ใช้ระบบ', 'url'=>array('/RegisterOwner/admin'), 'visible'=>Yii::app()->user->name=='admin'),
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
		Copyright &copy; <?php echo 2015;//date('Y'); ?> by ร.อ.รัตนะ เต้นปักษี แผนกโปรแกรม กองพัฒนาระบบ สำนักปฏิบัติการ สสท.ทร. 
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); 
		echo "Version :".Yii::getVersion();
		?>
	</div><!-- footer -->

</div><!-- page -->

<style>
li.disabled a{ color:grey; }
.menu-top ul a, .menu-top ul a:hover{ text-decoration:none;}
.menu-top ul { list-style: none; margin: 0; padding: 0; position: relative; height: 30px;}
.menu-top ul li { display: block; height: 28px;  overflow: visible; }
.menu-top ul li:hover > ul { display: block; }
.menu-top ul li a { float: left; display: block; }
.menu-top ul li ul { display: none; position: absolute; top:100%;
background: white; color: blue; height: auto;box-shadow: 0px 0px 6px 2px #666; border-radius:4px;
}
.menu-top ul li ul li a { padding: 4px 14px; display: block; }
.menu-top ul li ul li.active a,
.menu-top ul li ul li:hover { background-color:#F2FDFF;}

#mainmenu ul { list-style: none; margin: 0; padding: 0; position: relative; height: 26px; }
#mainmenu ul li { display: block; height: 26px; float: left; overflow: visible; }
#mainmenu ul li:hover > ul { display: block; }
#mainmenu ul li a { float: left; display: block; }
#mainmenu ul li ul { display: none; position: absolute; top: 100%; background: #589FC8; color: #fff; height: auto; width: auto; }
#mainmenu ul li ul li a { color: #fff; padding: 4px 14px; display: block; width: 120px;}
#mainmenu ul li ul li.active a, #mainmenu ul li ul li a:hover { color: #F8744E; }
#mainmenu ul li ul li { clear: left;}

</style>
</body>
</html>

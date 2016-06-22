<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="<?php echo Yii::app()->request->baseUrl;?>"><i class="fa fa-gear"></i> <?php echo Yii::app()->name; ?> <small></small></a>
          
 
        <div id="mainmenu" class="nav-collapse">
        <?php 
                
                //echo Yii::app()->user->name;
            $user_level =  Yii::app()->user->getState('user_level');
            //echo $user_level;
            $this->widget('zii.widgets.CMenu',array(
                'htmlOptions'=>array('class'=>'pull-right nav'),
                'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                'itemCssClass'=>'item-test',
                'encodeLabel'=>false,

                'items'=>array(
                    array('label'=>'หน้าแรก', 'url'=>array('/site/index')),
                    array('label'=>'เมนูหลัก', 'url'=>array('/menu/index'), 'visible'=>($user_level==1 || Yii::app()->user->name=='admin')),
   //Report
        /*            
                   array('label'=>'รายงาน <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                        array('label'=>'สรุปสถานภาพการจัดซื้อ/จ้าง', 'url'=>array('/report/procure'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'Log', 'url'=>array('/log/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                    ),'visible'=>($user_level==1 || Yii::app()->user->name=='admin')),
*/
    //Setting
                    
                   array('label'=>'ตั้งค่า <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                        array('label'=>'หน่วย', 'url'=>array('/unit/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'ประเทศ', 'url'=>array('/country/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'วิธีจัดซื้อ', 'url'=>array('/ProcureMethod/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'ชื่อเรื่อง', 'url'=>array('/industryH/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'รายละเอียด', 'url'=>array('/industryD/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'จัดซื้อ/จ้าง', 'url'=>array('/procure/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'Importจัดซื้อ/จ้าง', 'url'=>array('/procure/import'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'กฏ ระเบียบ คำสั่ง ที่เกี่ยวข้อง', 'url'=>array('/manual/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        array('label'=>'ขั้นตอนการจัดซื้อ/จ้าง และเอกสารประกอบ ', 'url'=>array('/file/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        
                        //array('label'=>'ความร่วมมือ', 'url'=>array('/cotype/admin'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                        //array('label'=>'เมนูหลัก', 'url'=>array('/menu/index'), 'visible'=>($user_level==1 ||Yii::app()->user->name=='admin')),
                    ),'visible'=>($user_level==1 || Yii::app()->user->name=='admin')),

                    array('label'=>'ข้อมูลผู้ใช้ระบบ', 'url'=>array('/tbluser/admin'), 'visible'=>(Yii::app()->user->getState('user_level')==1 || Yii::app()->user->name=='admin')),
                   // array('label'=>'ตั้งค่าหน่วยผู้ใช้ระบบ', 'url'=>array('/RegisterOwner/admin'), 'visible'=>Yii::app()->user->name=='admin'),
                    array('label'=>'เข้าระบบ', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'ออกจากระบบ ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                ),
            )); ?>
    </div><!-- mainmenu -->
          <!--<div class="nav-collapse">
            <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                    'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Dashboard', 'url'=>array('/site/index')),
                        array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs')),
                        array('label'=>'Forms', 'url'=>array('/site/page', 'view'=>'forms')),
                        array('label'=>'Tables', 'url'=>array('/site/page', 'view'=>'tables')),
                        array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),
                        array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                        array('label'=>'My Account <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'My Messages <span class="badge badge-warning pull-right">26</span>', 'url'=>'#'),
                            array('label'=>'My Tasks <span class="badge badge-important pull-right">112</span>', 'url'=>'#'),
                            array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
                            array('label'=>'Separated link', 'url'=>'#'),
                            array('label'=>'One more separated link', 'url'=>'#'),
                        )),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
        </div>-->   
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> 
        <br/>  
        <!--<marquee><span>ระบบฐานข้อมูลกองสรรพกำลัง สนผ.กห.</span></marquee>     -->
        <center><span><?php echo Yii::app()->name;   ?></span></center  >     
           <!-- <div class="style-switcher pull-left">               
            <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
            <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
            <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
            <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
            <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
            <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
            <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
            </div>-->
          <!--<form class="navbar-search pull-right" action="">             
           <input type="text" class="search-query span2" placeholder="Search">           
           </form>-->
        </div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->

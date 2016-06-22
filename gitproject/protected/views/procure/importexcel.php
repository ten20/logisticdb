<?php 
//GLobals::setProcureMethod('วิธีจัดซท้อ');
//GLobals::setCountry('ไทยแลนด์');
?>
<div class="alert alert-success">
	<h1>Import Excel</h1>
<?php $this->renderPartial('_formimport', array('model'=>$model)); ?> 
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<p class="alert alert-danger"><b>*หมายเหตุ</b> ไฟล์ excel ต้องมีรูปแบบรายการที่ 1 และ 2 ตามตัวอย่างด้านล่าง ต่อจากนั้นเป็นรายการของข้อมูล</p>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/import_excel.jpg">
</div>

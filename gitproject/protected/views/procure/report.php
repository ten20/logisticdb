<?php
/* @var $this ReportController */
$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
/*
$this->breadcrumbs=array(
	'Report'=>array('/report'),
	'Procure',
);
*/
$date=date('Y-m-d');
$mm=date('m');
$budgetyear=substr(date('Y')+543,-2);

if($mm>=10){
	$budgetyear=substr(date('Y')+544,-2);
}
$starty=57;
$endy=$budgetyear;
$ypost=$budgetyear;
if(isset($_POST['byear']))
 $ypost=$_POST['byear'];
$byear=$ypost;
?>

<div class="form-control">
<div class="alert alert-success" style="text-align:center">
<h4>สรุปสถานภาพการจัดซื้อ/จ้าง ของ นขต.สป., นขต.กห. และ เหล่าทัพ <br/>ประจำปีงบประมาณ 
<form method="post" name="form1">
<select class="span1" name="byear" onchange="this.form.submit();">
<?php 
for($y=$starty;$y<=$endy;$y++){
	$selected='';
	if($y==$byear)
	$selected="selected='selected'";
	echo "<option value='$y' $selected>".$y."</option>";
} ?>	
</select>
<br/>
ข้อมูล ณ <?php echo Globals::setDateFormat($date, $f=1); ?>
</form>

</h4>
<!--<p>Please fill out the following form with your login credentials:</p>-->
</div>
</div>
<div class="container">
<!--	<p style="color: green; background-color: #ffff42">Text color: green, background-color: yellow</p>-->
<table class="table table-bordered">
  <thread>
    <tr class="alert alert-info">
      <th rowspan="2" style="background-color:#aaff80">หน่วย</th>
      <th colspan="3" style="text-align:center;background-color:#ffeb99;">รายการจัดซื้อ/จ้างที่รายงาน รมว.กห.</th>
      <th colspan="2"  style="text-align:center;background-color:#ffcce6">การอนุมัติ</th>
      <th rowspan="2" class="span2" style="text-align:center">อยู่ระหว่างนำเรียน ปล.กห./<br/>รมว.กห.</th>
      <th rowspan="2" class="span2" style="text-align:center">อยู่ระหว่างการดำเนินการของ สป.กห.</th>
      <th rowspan="2" class="span2" style="text-align:center">อยู่ระหว่างการดำเนินการของ นขต.สป. และเหล่าทัพฯ</th>
    </tr>
    <tr class="alert alert-info" >
      <th style="background-color:#ffeb99">จัดซื้อ</th>
      <th style="background-color:#ffeb99">จัดจ้าง</th>
      <th style="background-color:#ffeb99">รวม</th>
      <th style="text-align:center;background-color:#ffcce6">รมว.กห.อนุมัติ แล้ว</th>
      <th style="text-align:center;background-color:#ffcce6">ปล.กห.อนุมัติ แล้ว</th>

    </tr>
  </thread>
  <tbody>
  	<?php 
  	$sum1=0;
  	$sum2=0;
  	$sum3=0;
  	$sum4=0;
  	$sum42=0;
  	$sum5=0;
  	$sum6=0;
  	$sum7=0;
		
  	//var_dump($model_unit);
  	foreach($model_unit as $key=>$value){
  		echo "<tr>";
        echo "<td style='background-color:#bbff99'>";
  		echo "<h4>".$value['unitname']."</h4>";
  		echo "</td>";
		echo "<td style='text-align:center;background-color:#fffb99;'>";
		$model=new Procure;
		$datas1=$model->countprocuretype($byear,$value['unitname'],'จัดซื้อ');
		$sum1+=$datas1;
		//echo $datas1;
		echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procuretype/?itemqty='.$datas1.'&budgetyear='.$byear.'&procuretype=จัดซื้อ&unitname='.$value['unitname'].'" class="btn btn-info" style="font-size:20px">'.$datas1.'</a>';		
		echo "</td>";
		echo "<td style='text-align:center;background-color:#fffb99;'>";
		$datas2=$model->countprocuretype($byear,$value['unitname'],'จัดจ้าง');
		$sum2+=$datas2;
		//echo $datas2;		
		echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procuretype/?itemqty='.$datas2.'&budgetyear='.$byear.'&procuretype=จัดจ้าง&unitname='.$value['unitname'].'" class="btn btn-info" style="font-size:20px">'.$datas2.'</a>';		
		echo "</td>";  		  	
		echo "<td style='text-align:center;background-color:#fffb99;'>";  		  			
		$datas3=$datas1+$datas2; 
		$sum3+=$datas3;				  
		//echo $datas3;  
		echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procuretype/?itemqty='.$datas3.'&budgetyear='.$byear.'&unitname='.$value['unitname'].'" class="btn btn-info" style="font-size:20px">'.$datas3.'</a>';		
		echo "</td>"; 
		echo "<td style='text-align:center;background-color:#ffdce6;'>";  		  			
		$datas4=$model->countprocurestatus($byear,$value['unitname'],'รมว.กห.อนุมัติแล้ว');		  	
		$sum4+=$datas4;
		//echo $datas4;  
		echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$datas4.'&budgetyear='.$byear.'&procurestatus=รมว.กห.อนุมัติแล้ว&unitname='.$value['unitname'].'" class="btn btn-info" style="font-size:20px">'.$datas4.'</a>';				
		
		echo "</td>";
		echo "<td style='text-align:center;background-color:#ffdce6;'>";  		
		$datas42=$model->countprocurestatus($byear,$value['unitname'],'ปล.กห.อนุมัติแล้ว');		  	
		$sum42+=$datas42;
		//echo $datas4;  
		echo ' <a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$datas42.'&budgetyear='.$byear.'&procurestatus=ปล.กห.อนุมัติแล้ว&unitname='.$value['unitname'].'" class="btn btn-info" style="font-size:20px">'.$datas42.'</a>';				
		echo "</td>";
		echo "<td style='text-align:center'>";  		  					
		$datas5=$model->countprocurestatus($byear,$value['unitname'],'นำเรียน ปล.กห./รมว.กห.');		  	
		$sum5+=$datas5;
		//echo $datas5;  
		echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$datas5.'&budgetyear='.$byear.'&procurestatus=นำเรียน ปล.กห./รมว.กห.&unitname='.$value['unitname'].'" class="btn btn-info" style="font-size:20px">'.$datas5.'</a>';		
		echo "</td>";	
		echo "<td style='text-align:center'>";  		  			
		$datas6=$model->countprocurestatus($byear,$value['unitname'],'การดำเนินการของ สงป.กห.');		  	
		$sum6+=$datas6;
		//echo $datas6; 
		echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$datas6.'&budgetyear='.$byear.'&procurestatus=การดำเนินการของ สงป.กห.&unitname='.$value['unitname'].'" class="btn btn-info" style="font-size:20px">'.$datas6.'</a>';		
		echo "</td>";			 
		echo "<td style='text-align:center'>";  		  			
		$datas7=$model->countprocurestatus($byear,$value['unitname'],'การดำเนินการ ของ นขต.สป. และเหล่าทัพ');		  	
		$sum7+=$datas7;
		//echo $datas7;  
		echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$datas7.'&budgetyear='.$byear.'&procurestatus=การดำเนินการ ของ นขต.สป. และเหล่าทัพ&unitname='.$value['unitname'].'" class="btn btn-info" style="font-size:20px">'.$datas7.'</a>';		
		echo "</td>";			 
  		echo "</tr>";
  	}
  	 ?>

  
      <tr class="alert alert-info">
        <td style='background-color:#aaff80'><h4>รวม</h4></td>
        <td style='text-align:center;background-color:#ffeb99;'><?php echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procuretype/?itemqty='.$sum1.'&budgetyear='.$byear.'&procuretype=ซื้อ" class="btn btn-success">'.$sum1.'</a>'; ?></td>
     	<td style='text-align:center;background-color:#ffeb99;'><?php echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procuretype/?itemqty='.$sum2.'&budgetyear='.$byear.'&procuretype=จ้าง" class="btn btn-success">'.$sum2.'</a>'; ?></td>
     	<td style='text-align:center;background-color:#ffeb99;'><?php echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procuretype/?itemqty='.$sum3.'&budgetyear='.$byear.'" class="btn btn-success">'.$sum3.'</a>'; ?></td>
     	<td style='text-align:center;background-color:#ffcce6;'><?php echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$sum4.'&budgetyear='.$byear.'&procurestatus=รมว.กห.อนุมัติแล้ว" class="btn btn-success" style="font-size:20px">'.$sum4.'</a>'; ?></td>
     	<td style='text-align:center;background-color:#ffcce6;'><?php echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$sum42.'&budgetyear='.$byear.'&procurestatus=ปล.กห.อนุมัติแล้ว" class="btn btn-success" style="font-size:20px">'.$sum42.'</a>'; ?></td>
     	<td style='text-align:center;'><?php echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$sum5.'&budgetyear='.$byear.'&procurestatus=นำเรียน ปล.กห./รมว.กห." class="btn btn-success" style="font-size:20px">'.$sum5.'</a>'; ?></td>
     	<td style='text-align:center;'><?php echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$sum6.'&budgetyear='.$byear.'&procurestatus=การดำเนินการของ สงป.กห." class="btn btn-success" style="font-size:20px">'.$sum6.'</a>'; ?></td>
     	<td style='text-align:center;'><?php echo '<a href="'.Yii::app()->request->baseUrl.'/index.php/procure/procurestatus/?itemqty='.$sum7.'&budgetyear='.$byear.'&procurestatus=การดำเนินการ ของ นขต.สป. และเหล่าทัพ" class="btn btn-success" style="font-size:20px">'.$sum7.'</a>'; ?></td>

      </tr>
  </tbody>
</table>
<h3><i class="fa fa-search"></i><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/procure/search">ค้นหา</a></h3>

</div>
<hr/><p align="right"><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/menu/menu01?title=คณะกรรมการพัฒนา และปฏิรูประบบงานด้านการส่งกำลังบำรุงของ สป." class="btn btn-primary">Back</a></p>
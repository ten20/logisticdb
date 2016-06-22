<?php
class Globals {

  public function getOnwer($short = null)
  {
    $criteria = new CDbCriteria();
    $criteria->select = 'owner_fullname,owner_shortname';
    $model = RegisterOwner::model()->find($criteria);
    //var_dump($model);
    $deptname       = $model->owner_fullname;
    if( !empty($short))
    $deptname       = $model->owner_shortname;
    return $deptname;
  }
  public function UserLevel($id=null){
    $user_levels=array("1"=>"admin","2"=>"user");
    if(!empty($id))
      return $user_levels[$id];
    else
      return $user_levels;
  }

public function getExtension($filename = null)    
  {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    return strtolower($ext);
  }

  public function getIcon($extension = null)    
  { 
    $extensions=array('pdf','doc','docx','ppt','pptx');
    $icon=$extension.".png";
    //if(in_array($extension, $extensions)){
     // return CHtml::image(Yii::app()->request->baseUrl.'/images/'.$icon, null, array('width' => '32px'));
    //}
      $exists = file_exists(Yii::getPathOfAlias('webroot').'/images/'.$icon); 
        if ($exists){
          return CHtml::image(Yii::app()->request->baseUrl.'/images/'.$icon, null, array('width' => '32px'));
        }else{
          $icon="file-unknown.jpg";
          $icon="unknown.png";
          return CHtml::image(Yii::app()->request->baseUrl.'/images/'.$icon, null, array('width' => '32px'));
        }
  }
  public function isImage($extension = null)
  {
    $extensions=array('png','jpg','jpeg','gif','tif');
    $icon=$extension.".png";
    if(in_array($extension, $extensions)){
      return true;
    }
    return false;
  }  
  public function ranks()
  {
    $arr_rank=array(
'พลเรือเอก'=>'พล.ร.อ.',
'พลเรือเอก'=>'พล.ร.อ.',
'พลเรือโท'=>'พล.ร.ท.',
'พลเรือโทหญิง'=>'พล.ร.ท.หญิง',
'พลเรือตรี'=>'พล.ร.ต.',
'พลเรือตรีหญิง'=>'พล.ร.ต.หญิง',
'นาวาเอก'=>'น.อ.',
'นาวาเอกหญิง'=>'น.อ.หญิง',
'นาวาเอก'=>'น.อ.',
'นาวาเอกหญิง'=>'น.อ.หญิง',
'ว่าที่นาวาเอก'=>'ว่าที่ น.อ.',
'ว่าที่นาวาเอกหญิง'=>'ว่าที่ น.อ.หญิง',
'นาวาโท'=>'น.ท.',
'นาวาโทหญิง'=>'น.ท.หญิง',
'ว่าที่นาวาโท'=>'ว่าที่ น.ท.',
'ว่าที่นาวาโทหญิง'=>'ว่าที่ น.ท.หญิง',
'นาวาตรี'=>'น.ต.',
'นาวาตรีหญิง'=>'น.ต.หญิง',
'ว่าที่นาวาตรี'=>'ว่าที่ น.ต.',
'ว่าที่นาวาตรีหญิง'=>'ว่าที่ น.ต.หญิง',
'เรือเอก'=>'ร.อ.',
'เรือเอกหญิง'=>'ร.อ.หญิง',
'ว่าที่เรือเอก'=>'ว่าที่ ร.อ.',
'ว่าที่เรือเอกหญิง'=>'ว่าที่ ร.อ.หญิง',
'เรือโท'=>'ร.ท.',
'เรือโทหญิง'=>'ร.ท.หญิง',
'ว่าที่เรือโท'=>'ว่าที่ ร.ท.',
'ว่าที่เรือโทหญิง'=>'ว่าที่ ร.ท.หญิง',
'เรือตรี'=>'ร.ต.',
'เรือตรีหญิง'=>'ร.ต.หญิง',
'ว่าที่เรือตรี'=>'ว่าที่ ร.ต.',
'ว่าที่เรือตรีหญิง'=>'ว่าที่ ร.ต.หญิง',
'พันจ่าเอก'=>'พ.จ.อ.',
'พันจ่าเอกหญิง'=>'พ.จ.อ.หญิง',
'พันจ่าเอก'=>'พ.จ.อ.',
'พันจ่าเอกหญิง'=>'พ.จ.อ.หญิง',
'พันจ่าโท'=>'พ.จ.ท.',
'พันจ่าโทหญิง'=>'พ.จ.ท.หญิง',
'พันจ่าตรี'=>'พ.จ.ต.',
'พันจ่าตรีหญิง'=>'พ.จ.ต.หญิง',
'จ่าเอก'=>'จ.อ.',
'จ่าเอกหญิง'=>'จ.อ.หญิง',
'จ่าโท'=>'จ.ท.',
'จ่าโทหญิง'=>'จ.ท.หญิง',
'จ่าตรี'=>'จ.ต.',
'จ่าตรีหญิง'=>'จ.ต.หญิง',
'พลทหาร'=>'พลฯ',
'พลอาสาสมัคร'=>'พลอาสาฯ',
'นาย'=>'นาย',
'นาง'=>'นาง',
'นางสาว'=>'น.ส.'

      );
    return $arr_rank;
  }  

public function setDateFormat($date, $f=1) { 
        // Full month array 
        $f_m = array("01"=>"มกราคม",  
                "02"=>"กุมภาพันธ์",  
                "03"=>"มีนาคม",  
                "04"=>"เมษายน",  
                "05"=>"พฤษภาคม",  
                "06"=>"มิถุนายน",  
                "07"=>"กรกฎาคม",  
                "08"=>"สิงหาคม",  
                "09"=>"กันยายน", 
                "10"=>"ตุลาคม", 
                "11"=>"พฤศจิกายน", 
                "12"=>"ธันวาคม" 
        ); 
         
        // Quick month array 
        $q_m = array("01"=>"ม.ค.",  
                "02"=>"ก.พ.",  
                "03"=>"มี.ค.",  
                "04"=>"เม.ย.",  
                "05"=>"พ.ค.",  
                "06"=>"มิ.ย.",  
                "07"=>"ก.ค.",  
                "08"=>"ส.ค.",  
                "09"=>"ก.ย.",  
                "10"=>"ต.ค.",  
                "11"=>"พ.ย.",  
                "12"=>"ธ.ค." 
        ); 
         
        if($f == '1')  
            return ((int) substr($date, 8)).' '. 
                         $q_m[substr($date, 5, -3)].''.(substr($date, 2, -6)+43); 
        if($f == '2')  
            return (int)substr($date, 8).' '. 
                         $f_m[substr($date, 5, -3)].' '.((int)substr($date, 0, -6) + 543); 
        if($f == '3')  
            return 'วันที่ '.(int)substr($date, 8).' เดือน '. 
                         $f_m[substr($date, 5, -3)].' พ.ศ. '.((int)substr($date, 0, -6) + 543);  
        if($f == '4')  //เดือน ปี
            return $f_m[substr($date, 5, -3)].' '.((int)substr($date, 0, -6) + 543); 
        if($f == '5')  // ปี
            return ((int)substr($date, 0, -6) + 543); 
    } 
     
    # Set time format 
    public function setTimeFormat($time, $f) { 
        if($f == '1')  
            return substr($time, 0, -6).':'. 
                         substr($time, 3, -3).' น.'; 
        if($f == '2')  
            return substr($time, 0, -6).':'. 
                         substr($time, 3, -3).':'. 
                         substr($time, 6); 
    } 
 public function published($data)
  {
    $arr=array(
      'T'=>'Yes',
      'F'=>'No',
      );
    return $arr[$data];
  }
 public function getThmonth($m) { 
          // Full month array 
        $f_m = array("01"=>"มกราคม",  
                "02"=>"กุมภาพันธ์",  
                "03"=>"มีนาคม",  
                "04"=>"เมษายน",  
                "05"=>"พฤษภาคม",  
                "06"=>"มิถุนายน",  
                "07"=>"กรกฎาคม",  
                "08"=>"สิงหาคม",  
                "09"=>"กันยายน", 
                "10"=>"ตุลาคม", 
                "11"=>"พฤศจิกายน", 
                "12"=>"ธันวาคม" 
        ); 
        return  $f_m[$m];
}
 public function setProcureMethod($value=null) { 
    $model=null;
    if($value!=null){
      $criteria = new CDbCriteria();
      $criteria->select = 'idprocuremethod,procuremethodname';
      $criteria->condition = "procuremethodname='$value'";
      $model = ProcureMethod::model()->find($criteria);
    }
      //var_dump($model);
      if($model==null){
        $model = new ProcureMethod();
        $model->procuremethodname=$value;
        $model->save();
    }
  }
 public function setCountry($value=null) { 
    $model=null;
    if($value!=null){
      $criteria = new CDbCriteria();
      $criteria->select = 'idcountry,countryname_th';
      $criteria->condition = "countryname_th='$value'";
      $model = Country::model()->find($criteria);
    }
      //var_dump($model);
      if($model==null){
        $model = new Country();
        $model->countryname_th=$value;
        $model->countryname_en='-';
        $model->picture='-';
        $model->save();
    }
  }
 public function setUnit($value=null) { 
    $model=null;
    if($value!=null){
      $criteria = new CDbCriteria();
      $criteria->select = 'idunit,unitname';
      $criteria->condition = "unitname='$value'";
      $model = Unit::model()->find($criteria);
    }
      //var_dump($model);
      if($model==null){
        $model = new Unit();
        $model->unitname=$value;
        $model->save();
    }
  }  
}//class
?>

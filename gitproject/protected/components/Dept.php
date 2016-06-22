<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Dept {
    // public static function datethai( ตัวแปรที่รับ ) {}
 public static function save_dept($deptname) {
 $criteria = new CDbCriteria();
$criteria->condition = 'dept_longname=:deptname';
$criteria->params = array(':deptname'=>$deptname);
$qty = Department::model()->count($criteria);
//$qty  = RegisterReceive::getMax($year,$type);
//echo $year." t=".$type." n= ".$number;
if($qty==0){
 //   echo "INSERT";
          $conn = Yii::app()->db->createCommand()
            ->insert('department', array(
                'dept_longname' => $deptname,
                'dept_shortname' => $deptname,
                'entryby' => Yii::app()->user->name,
                'entrydate' => date("Y-m-d H:i:s"),
            ));

}


        return "Year Saved";
    }
}
?>

<?php
class MaxNumber {
public function getMax($year = null,$type=1)
{
$criteria = new CDbCriteria();
$criteria->select = 'regis_number';
$criteria->condition = 'regis_year=:year AND regis_type=:type';
$criteria->params = array(':year'=>$year, ':type'=>$type);
$model = RegisterYear::model()->find($criteria);
//var_dump($model);
$max        = $model->regis_number+1;
if( empty($max))
$max        = 1;
return $max;
}
}
?>

<?php

/**
 * This is the model class for table "procure".
 *
 * The followings are the available columns in table 'procure':
 * @property integer $idprocure
 * @property string $unitname
 * @property string $procure_type
 * @property string $description
 * @property string $budgetyear
 * @property string $method
 * @property string $budget
 * @property string $approve_type
 * @property string $procure_status
 * @property string $approvedate
 * @property string $saler
 * @property string $product
 * @property string $approve_budget
 * @property string $country
 * @property integer $period
 * @property string $editor
 * @property string $remark
 * @property string $file
 * @property string $lastupdate
 */
class Procure extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'procure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unitname, procure_type, description, budgetyear, approve_type', 'required'),
			array('period', 'numerical', 'integerOnly'=>true),
			array('unitname, method, country', 'length', 'max'=>100),
			array('procure_type', 'length', 'max'=>12),
			array('description, saler, product, file', 'length', 'max'=>255),
			array('budgetyear', 'length', 'max'=>5),		
			array('budget, approve_budget', 'length', 'max'=>15),
			array('approve_type', 'length', 'max'=>24),
			array('procure_status', 'length', 'max'=>98),
			array('approvedate, editor, remark', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idprocure, unitname, procure_type, description, budgetyear, method, budget, approve_type, procure_status, approvedate, saler, product,  approve_budget, country, period, editor, remark, file', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idprocure' => 'รหัส',
			'unitname' => 'หน่วย',
			'procure_type' => 'จัดซื้อ/จ้าง',
			'description' => 'รายการ',
			'budgetyear' => 'งบปี',
			'method' => 'วิธีการจัดซื้อ/จ้าง',
			'budget' => 'วงเงินตามแผน',
			'approve_type' => 'อำนาจอนุมัติ',
			'procure_status' => 'สถานะ',
			'approvedate' => 'วันที่ รมว.กห/ปล.กห..อนุมัติ',
			'saler' => 'ผู้ขาย/ผู้รับจ้าง',
			'product' => 'ผลิตภัณฑ์/ตราอักษร',
			'approve_budget'=>'วงเงินอนุมัติ',
			'country' => 'ประเทศ',
			'period' => 'ระยะเวลาส่งมอบ',
			'editor' => 'วันที่แก้ไขสัญญา',
			'remark' => 'หมายเหตุ',
			'file' => 'เอกสารอ้างอิง',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idprocure',$this->idprocure);
		$criteria->compare('unitname',$this->unitname,true);
		$criteria->compare('procure_type',$this->procure_type,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('budgetyear',$this->budgetyear,true);
		$criteria->compare('method',$this->method,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('approve_type',$this->approve_type,true);
		$criteria->compare('procure_status',$this->procure_status,true);
		$criteria->compare('approvedate',$this->approvedate,true);
		$criteria->compare('saler',$this->saler,true);
		$criteria->compare('product',$this->product,true);
		$criteria->compare('approve_budget',$this->approve_budget,true);		
		$criteria->compare('country',$this->country,true);
		$criteria->compare('period',$this->period);
		$criteria->compare('editor',$this->editor,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
         		'pageSize' => 500,
    		),
		));
	}
	public function searchprocuretype($budgetyear=null,$procure_type=null,$unitname=null)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idprocure',$this->idprocure);
		$criteria->compare('unitname',$this->unitname,true);
		$criteria->compare('procure_type',$this->procure_type,true);
		if($procure_type!=null)
			$criteria->compare('procure_type',$procure_type,true);
		if($unitname!=null)	
			$criteria->compare('unitname',$unitname,true);
		
		$criteria->compare('description',$this->description,true);
		$criteria->compare('substr(budgetyear,1,2)',$budgetyear,true);
		$criteria->compare('method',$this->method,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('approve_type',$this->approve_type,true);
		$criteria->compare('procure_status',$this->procure_status,true);
		$criteria->compare('approvedate',$this->approvedate,true);
		$criteria->compare('saler',$this->saler,true);
		$criteria->compare('product',$this->product,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('period',$this->period);
		$criteria->compare('editor',$this->editor,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
         		'pageSize' => 200,
    		),
		));
	}
	public function searchprocurestatus($budgetyear=null,$procure_status=null,$unitname=null)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idprocure',$this->idprocure);
		$criteria->compare('unitname',$this->unitname,true);
		$criteria->compare('procure_type',$this->procure_type,true);
		if($unitname!=null)	
			$criteria->compare('unitname',$unitname,true);
		
		$criteria->compare('description',$this->description,true);
//		$criteria->compare('budgetyear',$budgetyear,true);
		$criteria->compare('substr(budgetyear,1,2)',$budgetyear,true);

		$criteria->compare('method',$this->method,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('approve_type',$this->approve_type,true);
		$criteria->compare('procure_status',$this->procure_status,true);
		if($procure_status!=null)
			$criteria->compare('procure_status',$procure_status,true);
		$criteria->compare('approvedate',$this->approvedate,true);
		$criteria->compare('saler',$this->saler,true);
		$criteria->compare('product',$this->product,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('period',$this->period);
		$criteria->compare('editor',$this->editor,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
         		'pageSize' => 100,
    		),
		));
	}

	public function countprocuretype($year=null,$unit=null,$type=null)
	{
		$Criteria = new CDbCriteria();
		$Criteria->condition = "budgetyear='$year' and procure_type='$type'";
		if($unit!=null)
		$Criteria->condition = "substr(budgetyear,1,2)='$year' and unitname='$unit' and procure_type='$type'";
		//$datas = $this->findAll($Criteria);
		$count = $this->count($Criteria);

		return $count;
	}
	public function countprocurestatus($year=null,$unit=null,$type=null)
	{
		$Criteria = new CDbCriteria();
		$Criteria->condition = "substr(budgetyear,1,2)='$year' and procure_status='$type'";
		if($unit!=null)
		$Criteria->condition = "substr(budgetyear,1,2)='$year' and unitname='$unit' and procure_status='$type'";
		//$datas = $this->findAll($Criteria);
		$count = $this->count($Criteria);

		return $count;
	}	
	public function beforeSave()
	{
	    if( !empty($this->approvedate) && $this->approvedate !='0000-00-00')
	    {
	        $this->approvedate = date('Y-m-d',strtotime(str_replace('/','.',$this->approvedate) ));
	    }
	
	    if( !empty($this->editor) &&  $this->editor !='0000-00-00')
	    {
	        $this->editor = date('Y-m-d',strtotime(str_replace('/','.',$this->editor) ));
	    }
	    return parent::beforeSave();
	}
	

	protected function afterFind(){
    parent::afterFind();
    //$y=substr($this->editor,0,4)+543;
    //$this->editor=date("d/m/$y", strtotime(str_replace("-", "", $this->editor)));       
    if( !empty($this->approvedate)  && $this->approvedate!='0000-00-00' )
	    {
	    	$this->approvedate=date("d/m/Y", strtotime(str_replace("-", "", $this->approvedate)));       
	 }
	 if( !empty($this->editor)  && $this->editor!='0000-00-00' )
	    {
	    	$this->editor=date("d/m/Y", strtotime(str_replace("-", "", $this->editor)));       
	    }

	}
	
/*
protected function beforeSave(){
    if(parent::beforeSave()){
    	if( $this->approvedate )
	    {
        $this->approvedate = date('Y-m-d',strtotime(str_replace('/','.',$this->approvedate) ));
        }
         if( $this->editor )
	    {
	    	$this->editor=date('Y-m-d', strtotime(str_replace("/", ".", $this->editor)));
        }
        return true;
    }
    else return false;
}
*/
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Procure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getTotal($records, $column)
        {
                $total = 0;
                foreach ($records as $record) {
                        $total += $record->$column;
                }
                return number_format($total,2);
        }
}

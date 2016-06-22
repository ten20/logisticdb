<?php

/**
 * This is the model class for table "plan".
 *
 * The followings are the available columns in table 'plan':
 * @property integer $id
 * @property string $planyear
 * @property string $plandate
 * @property string $plandetail
 * @property string $planfile
 * @property integer $coid
 *
 * The followings are the available model relations:
 * @property CologisticD $co
 */
class Plan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('planyear, plandate, plandetail, coid', 'required'),
			array('coid', 'numerical', 'integerOnly'=>true),
			array('planyear', 'length', 'max'=>4),
			array('planfile', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, planyear, plandate, plandetail, planfile, coid', 'safe', 'on'=>'search'),
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
			'co' => array(self::BELONGS_TO, 'CologisticD', 'coid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'รหัส',
			'planyear' => 'ปี',
			'plandate' => 'ว.ด.ป.',
			'plandetail' => 'สรุปสาระสำคัญ',
			'planfile' => 'เอกสาร',
			'coid' => 'ความร่วมมือ',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('planyear',$this->planyear,true);
		$criteria->compare('plandate',$this->plandate,true);
		$criteria->compare('plandetail',$this->plandetail,true);
		$criteria->compare('planfile',$this->planfile,true);
		$criteria->compare('coid',$this->coid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchshow($id=null)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('planyear',$this->planyear,true);
		$criteria->compare('plandate',$this->plandate,true);
		$criteria->compare('plandetail',$this->plandetail,true);
		$criteria->compare('planfile',$this->planfile,true);
		$criteria->compare('coid',$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Plan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

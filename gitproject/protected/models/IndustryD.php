<?php

/**
 * This is the model class for table "industry_d".
 *
 * The followings are the available columns in table 'industry_d':
 * @property integer $id
 * @property integer $industryhid
 * @property string $background
 * @property string $objecttive
 * @property string $about
 * @property string $status
 *
 * The followings are the available model relations:
 * @property IndustryH $industryh
 */
class IndustryD extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'industry_d';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('industryhid, background, objecttive, about', 'required'),
			array('industryhid', 'numerical', 'integerOnly'=>true),
			array('status', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, industryhid, background, objecttive, about, status', 'safe', 'on'=>'search'),
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
			'industryh' => array(self::BELONGS_TO, 'IndustryH', 'industryhid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'รหัส',
			'industryhid' => 'ชื่อเรื่อง',
			'background' => 'ความเป็นมา',
			'objecttive' => 'วัตถุประสงค์',
			'about' => 'เรื่องที่เกี่ยวข้องกับ กห.',
			'status' => 'สรุปสาระสำคัญ',
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
		$criteria->compare('industryhid',$this->industryhid);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('objecttive',$this->objecttive,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IndustryD the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "register_owner".
 *
 * The followings are the available columns in table 'register_owner':
 * @property integer $owner_id
 * @property string $owner_fullname
 * @property string $owner_shortname
 */
class RegisterOwner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'register_owner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner_fullname, owner_shortname', 'required'),
			array('owner_fullname', 'length', 'max'=>100),
			array('owner_shortname', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('owner_id, owner_fullname, owner_shortname', 'safe', 'on'=>'search'),
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
			'owner_id' => 'PK',
			'owner_fullname' => 'ชื่อเต็มหน่วย',
			'owner_shortname' => 'ชื่อย่อหน่วย',
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

		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('owner_fullname',$this->owner_fullname,true);
		$criteria->compare('owner_shortname',$this->owner_shortname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RegisterOwner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

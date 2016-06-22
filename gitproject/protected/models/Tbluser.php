<?php

/**
 * This is the model class for table "tbluser".
 *
 * The followings are the available columns in table 'tbluser':
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_pwd
 * @property string $pre_name
 * @property string $first_name
 * @property string $last_name
 * @property string $department
 * @property string $email
 * @property string $tel
 * @property string $position
 * @property string $created
 * @property string $modified
 * @property string $user_level
 * @property string $last_login
 * @property integer $count_visit
 */
class Tbluser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbluser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, user_pwd,first_name, last_name, email', 'required'),
			array('count_visit', 'numerical', 'integerOnly'=>true),
			array('user_name, user_pwd, pre_name, email, tel', 'length', 'max'=>45),
			array('first_name, last_name, position', 'length', 'max'=>100),
			array('department', 'length', 'max'=>150),
			array('user_level', 'length', 'max'=>1),
			array('created, modified, last_login', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_name, user_pwd, pre_name, first_name, last_name, department, email, tel, position, created, modified, user_level, last_login, count_visit', 'safe', 'on'=>'search'),
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
			'user_id' => 'รหัส',
			'user_name' => 'ชือผู้ใช้',
			'user_pwd' => 'รหัสผ่าน',
			'pre_name' => 'คำนำหน้า',
			'first_name' => 'ชื่อ',
			'last_name' => 'นามสกุล',
			'department' => 'สังกัดหน่วยงาน',
			'email' => 'อีเมล์',
			'tel' => 'เบอร์โทรศัพท์',
			'position' => 'ตำแหน่ง',
			'created' => 'วันที่สร้าง',
			'modified' => 'วันที่แก้ไข',
			'user_level' => 'ระดับผู้ใช้',
			'last_login' => 'เข้าระบบล่าสุด',
			'count_visit' => 'จำนวนที่เข้า',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_pwd',$this->user_pwd,true);
		$criteria->compare('pre_name',$this->pre_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('user_level',$this->user_level,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('count_visit',$this->count_visit);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tbluser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
         //Add
        public function validatePassword($password)
     {
        return $this->hashPassword($password,$this->user_name)===$this->user_pwd;
     }
        public function hashPassword($password,$username)
     {
        return md5($password);
     }

	

}

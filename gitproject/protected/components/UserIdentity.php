<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate_old()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
    private $_id;

    public function authenticate()
    {
        $username=strtolower($this->username);
        $user=Tbluser::model()->find('LOWER(user_name)=?',array($username));
        if($user===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } else if(!$user->validatePassword($this->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id=$user->user_id;
            $this->username=$user->user_name;
            //Update lastvisit
            $date=date("Y-m-d H:i:s");
            $user=Tbluser::model()->findByPk(array($this->_id));
            Yii::app()->user->setState('user_level',$user->user_level);
            Yii::app()->user->setState('users',$user);
            Tbluser::model()->updateByPk(array($this->_id),array('last_login'=>$date));            
            Tbluser::model()->updateCounters(array('count_visit'=>+1),'user_id=:id',array(':id'=>$this->_id));
            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;


    }


    public function authenticate_mixed()
    {
        $options = Yii::app()->params['ldap'];
        $connection = ldap_connect($options['host'], $options['port']);
        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
        $ldaprdn="uid={$this->username},".$options['ldap_basedn'];
        if($connection)
        {
            try
            {
            //LDAP
            $bind = @ldap_bind($connection, $ldaprdn, $this->password);
            $this->errorCode=self::ERROR_NONE;
            //DB
                $username=strtolower($this->username);
                $user=Tbluser::model()->find('LOWER(user_name)=?',array($username));
                if($user===null){
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                //} else if(!$user->validatePassword($this->password)){
                    //$this->errorCode=self::ERROR_PASSWORD_INVALID;
                } else {
                    $this->_id=$user->user_id;
                    $this->username=$user->user_name;
                    //Update lastvisit
                    $date=date("Y-m-d H:i:s");
                    $user=Tbluser::model()->findByPk(array($this->_id));
                    Yii::app()->user->setState('user_level',$user->user_level);
                    Yii::app()->user->setState('users',$user);

                    Tbluser::model()->updateByPk(array($this->_id),array('last_login'=>$date));
                    
                    Tbluser::model()->updateCounters(array('count_visit'=>+1),'user_id=:id',array(':id'=>$this->_id));
                }  
                
            }
            catch (Exception $e){
                echo $e->getMessage();
            }
            if(!$bind) {
            //    $this->errorCode = self::ERROR_PASSWORD_INVALID;
//DB
                $username=strtolower($this->username);
                $user=Tbluser::model()->find('LOWER(user_name)=?',array($username));
                if($user===null){
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                } else if(!$user->validatePassword($this->password)){
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
                } else {
                    $this->_id=$user->user_id;
                    $this->username=$user->user_name;
                    //Update lastvisit
                    $date=date("Y-m-d H:i:s");
                    $user=Tbluser::model()->findByPk(array($this->_id));
                    Yii::app()->user->setState('user_level',$user->user_level);
                    Yii::app()->user->setState('users',$user);

                    Tbluser::model()->updateByPk(array($this->_id),array('last_login'=>$date));
                    
                    Tbluser::model()->updateCounters(array('count_visit'=>+1),'user_id=:id',array(':id'=>$this->_id));
                }  

            }
            else{ $this->errorCode = self::ERROR_NONE;}
        }
        return $this->errorCode==self::ERROR_NONE;
    }
    public function getId()
    {
        return $this->_id;
    }
}
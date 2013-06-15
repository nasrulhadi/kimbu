<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class RootIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $criteria = new CDbCriteria;
        $criteria->condition = 'USERNAME=:username AND TYPE=:type';
        $criteria->params = array(':username'=>$this->username,':type'=>WebUser::ROLE_SUPER_ADMIN);
        $record=User::model()->find($criteria);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->PASSWORD!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
			$this->setState('isLogin', true);
			$this->setState('type', $record->TYPE);
            $this->setState('nama',$record->NAMA);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
}
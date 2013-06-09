<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
        //$users = User::model()->findByAttributes(array('USERNAME'=>$th));
        $users = User::model()->findByAttributes(array('USERNAME'=>$this->username));
		if($users === NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users->PASSWORD !== md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
        {
            $this->setState('isLogin', true);
            $this->setState('id', $users->ID_USER);
            $this->setState('name',$users->NAMA);
			$this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}
}
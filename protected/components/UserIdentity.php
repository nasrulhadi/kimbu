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
        $users = User::model()->findByAttributes(array('USERNAME'=>$this->username));
        $criteria = new CDbCriteria;
        $criteria->condition = 'ID_DIVISI=:iddivisi';
        $criteria->params = array(':iddivisi'=>$users->ID_DIVISI);
        $record = Divisi::model()->find($criteria);
		if($users === NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users->PASSWORD !== md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
        {
            $this->setState('isLogin', true);
            $this->setState('name',$users->NAMA);
            $this->setState('type', $users->TYPE);
            $this->setState('idUser',$users->ID_USER);
            $this->setState('idDivisi', $users->ID_DIVISI);
            $this->setState('divisi', $users->Divisi->NAMA);
            $this->setState('perusahaan', $record->Perusahaan->NAMA);
            $this->setState('email', $users->EMAIL);
			$this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}
}
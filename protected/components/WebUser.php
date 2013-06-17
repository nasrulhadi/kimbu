<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author andy
 */
class WebUser extends CWebUser {
    const ROLE_SUPER_ADMIN='1';
    const ROLE_ADMIN='2';
    const ROLE_SURVEYOR='3';
    const ROLE_CLIENT='4';
    
    // module 
    const MODULE_ADMIN = 'root';
    const MODULE_ADMIN_CS = 'admincs';
    const MODULE_SURVEYOR = 'surveyor';
    const MODULE_CLIENT = 'client';


    /**
     * this method is used for checking user right access
     * @param <string> $operation
     * @param <array> $params
     * @return <boolean>
     */
    public function checkAccess($operation, $params=array()) {
        $type = $this->getState('type');
        return ($operation === $type);
    }
    
    public static function isRoot()
    {
        return (Yii::app()->user->getState('type')==WebUser::ROLE_SUPER_ADMIN);
    }
    
    public static function isAdmin()
    {
        return (Yii::app()->user->getState('type')==WebUser::ROLE_ADMIN);
    }
    
    public static function isSurveyor()
    {
        return (Yii::app()->user->getState('type')==WebUser::ROLE_SURVEYOR);
    }
    
    public static function isClient()
    {
        return (Yii::app()->user->getState('type')==WebUser::ROLE_CLIENT);
    }
    
    public static function isGuest()
    {
        return Yii::app()->user->isGuest;
    }
    
    public static function getModuleByRole()
    {
        if(WebUser::isRoot())        {
            return WebUser::MODULE_ADMIN;
        }elseif (WebUser::isAdmin()) {
            return WebUser::MODULE_ADMIN_CS;
        }elseif (WebUser::isSurveyor()) {
            return WebUser::MODULE_SURVEYOR;
        }elseif (WebUser::isClient()) {
            return WebUser::MODULE_CLIENT;
        }else {
            return NULL;
        }
    }
}
?>

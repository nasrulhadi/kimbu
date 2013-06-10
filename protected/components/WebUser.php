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
}
?>

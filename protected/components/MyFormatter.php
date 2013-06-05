<?php
class MyFormatter extends CFormatter
{
    public static function alertInfo($message)
    {
        return '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
    public static function alertWarning($message)
    {
        return '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
    public static function alertError($message)
    {
        return '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
    public static function alertSuccess($message)
    {
        return '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
}
?>
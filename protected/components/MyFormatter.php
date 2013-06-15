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
    
    public static function alertForgot($message)
    {
        return '<div class="alert alert-warning alert-login"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
    
    public function formatStatusAktif($value)
    {
        if($value==User::STATUS_AKTIF)
            return '<span class="label label-warning">Active</span>';
        else
            return '<span class="label label-danger">Disabled</span>';
    }
    
    public function formatRole($value)
    {
        if($value==WebUser::ROLE_SUPER_ADMIN)
            return '<span class="label label-danger">Administrator</span>';
        else if($value==WebUser::ROLE_ADMIN)
            return '<span class="label label-danger">Admin Perusahaan</span>';
        else if($value==WebUser::ROLE_SURVEYOR)
            return '<span class="label label-danger">Surveyor</span>';
        else if($value==WebUser::ROLE_CLIENT)
            return '<span class="label label-danger">Client User</span>';
        else
            return '<span class="label label-danger">Unknown</span>';
    }
    
    public function formatDateFormat($value)
	{
		$date = explode('-',$value);
		$bulan = '';
		switch($date[1])
		{
			case '01':
				$bulan = 'Januari';
				break;
			case '02':
				$bulan = 'Februari';
				break;
			case '03':
				$bulan = 'Maret';
				break;
			case '04':
				$bulan = 'April';
				break;
			case '05':
				$bulan = 'Mei';
				break;
			case '06':
				$bulan = 'Juni';
				break;
			case '07':
				$bulan = 'Juli';
				break;
			case '08':
				$bulan = 'Agustus';
				break;
			case '09':
				$bulan = 'September';
				break;
			case '10':
				$bulan = 'Oktober';
				break;
			case '11':
				$bulan = 'Nopember';
				break;
			case '12':
				$bulan = 'Desember';
				break;
		}
		
		return substr($date[2],0,2).' '.$bulan.' '.$date[0];
	}
    
    
}
?>
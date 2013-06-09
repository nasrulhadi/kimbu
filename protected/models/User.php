<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $ID_USER
 * @property integer $ID_DIVISI
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $NAMA
 * @property string $EMAIL
 * @property string $TLP
 * @property string $HP
 * @property string $FOTO
 * @property integer $TYPE
 * @property string $TANGGAL_DIBUAT
 * @property integer $TERAKHIR_LOGIN
 * @property integer $STATUS
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
    public $username;
    public $password;
    
    //STATUS USER
    const STATUS_AKTIF=1;
    const STATUS_NON_AKTIF=2;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_DIVISI, TYPE, TERAKHIR_LOGIN, STATUS', 'numerical', 'integerOnly'=>true),
            array('USERNAME, PASSWORD, NAMA, STATUS, EMAIL', 'required'),
            array('EMAIL', 'email'),
			array('TANGGAL_DIBUAT', 'safe'),
            array('FOTO','file','types'=>'jpg, jpeg, png'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USERNAME, NAMA, EMAIL, STATUS', 'safe', 'on'=>'search'),
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
			'ID_USER' => 'Id User',
			'ID_DIVISI' => 'Divisi',
			'USERNAME' => 'Username',
			'PASSWORD' => 'Password',
			'NAMA' => 'Nama',
			'EMAIL' => 'Email',
			'TLP' => 'No. Telepon',
			'HP' => 'Hp',
			'FOTO' => 'Foto',
			'TYPE' => 'Type',
			'TANGGAL_DIBUAT' => 'Tanggal Dibuat',
			'TERAKHIR_LOGIN' => 'Terakhir Login',
			'STATUS' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('ID_DIVISI',$this->ID_DIVISI);
		$criteria->compare('USERNAME',$this->USERNAME,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('TLP',$this->TLP,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('FOTO',$this->FOTO,true);
		$criteria->compare('TYPE',$this->TYPE);
		$criteria->compare('TANGGAL_DIBUAT',$this->TANGGAL_DIBUAT,true);
		$criteria->compare('TERAKHIR_LOGIN',$this->TERAKHIR_LOGIN);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function generatePassword()
    {
        $password = substr(md5(microtime()),3,6);
        return $password;
    }
    
    public function displayPicture($pictureName)
    {
        if($pictureName==null || $pictureName=='')
            echo '<img src="'.Yii::app()->theme->baseUrl.'/img/profilethumb.png" alt="" class="img-polaroid" />';
        else
            echo '<img src="'.Yii::app()->request->baseUrl.'/file/foto/'.$pictureName.'" alt="" class="img-polaroid"/>';
    }
    
    public function sendEmail()
    {
        $to = 'phe@localhost';
        $message = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <title></title>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <style type="text/css">#outlook a {padding:0;} 
                body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;} 
                .ExternalClass {width:100%;}
                .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
                #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
                img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;} 
                a img {border:none;} 
                .image_fix {display:block;}
                p {margin: 1em 0;}
                h1, h2, h3, h4, h5, h6 {color: black !important;}

                h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

                h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
                color: red !important;
                }

                h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
                color: purple !important;
                }

                table td {border-collapse: collapse;}
            table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
                a {color: #0058A8;}

                @media only screen and (max-device-width: 480px) {

                    a[href^="tel"], a[href^="sms"] {
                                text-decoration: none;
                                color: blue; 
                                pointer-events: none;
                                cursor: default;
                            }

                    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                                text-decoration: default;
                                color: orange !important;
                                pointer-events: auto;
                                cursor: default;
                            }

                }

                @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
                    a[href^="tel"], a[href^="sms"] {
                                text-decoration: none;
                                color: blue; 
                                pointer-events: none;
                                cursor: default;
                            }

                    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                                text-decoration: default;
                                color: orange !important;
                                pointer-events: auto;
                                cursor: default;
                            }
                }

                @media only screen and (-webkit-min-device-pixel-ratio: 2) {
                }
                @media only screen and (-webkit-device-pixel-ratio:.75){
                }
                @media only screen and (-webkit-device-pixel-ratio:1){
                }
                @media only screen and (-webkit-device-pixel-ratio:1.5){
                }
            </style>
        </head>
        <body>
        <table align="center" border="0" cellpadding="0" cellspacing="0" id="backgroundTable">
            <tbody>
                <tr>
                    <td valign="top">
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td height="50" width="600">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="90" style="color:#999999" width="600">Kimbu - Administrator</td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF" height="200" style="background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif" valign="top" width="600">
                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td height="10" width="560">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="560">
                                            <h4>Reset Password</h4>

                                            <p style="font-size:12px; font-family:Helvetica,Arial,sans-serif">Hallo, {user_by_email}</p>

                                            <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Beberapa saat yang lalu system telah menerima permintaan untuk mereset Password Anda. <br />Klik link dibawah ini <strong>JIKA</strong> Anda ingin mereset Password, dan Password baru akan dikirimkan beberapa saat kemudian.<br /><br />
                                            <a href=" '. Yii::app()->baseUrl() .' " style="color: #0eb6ce; text-decoration: none;">{link_to_reset}</a><br />
                                            <br />
                                            Salam,<br />
                                            Kimbu</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="10" width="560">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="10" width="600">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="right"><span style="font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif">{perusahaan}</span></td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
            </tbody>
        </table>
        </body>
        </html>

        ';
        $subject = "[Kimbu] Permintaan untuk Reset Password";
        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . Yii::app()->params['adminEmail'] . "\r\n";
        if(mail($to, $subject, $message, $headers))
            return true;
        else
            return false;
    }

        //send email forgot password
    public function sendEmailUser()
    {
        //$to = $this->EMAIL;
        $to = 'phe@localhost';
        $message = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <title></title>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <style type="text/css">#outlook a {padding:0;} 
                body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;} 
                .ExternalClass {width:100%;}
                .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
                #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
                img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;} 
                a img {border:none;} 
                .image_fix {display:block;}
                p {margin: 1em 0;}
                h1, h2, h3, h4, h5, h6 {color: black !important;}

                h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

                h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
                color: red !important;
                }

                h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
                color: purple !important;
                }

                table td {border-collapse: collapse;}
            table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
                a {color: #0058A8;}

                @media only screen and (max-device-width: 480px) {

                    a[href^="tel"], a[href^="sms"] {
                                text-decoration: none;
                                color: blue; 
                                pointer-events: none;
                                cursor: default;
                            }

                    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                                text-decoration: default;
                                color: orange !important;
                                pointer-events: auto;
                                cursor: default;
                            }

                }

                @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
                    a[href^="tel"], a[href^="sms"] {
                                text-decoration: none;
                                color: blue; 
                                pointer-events: none;
                                cursor: default;
                            }

                    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                                text-decoration: default;
                                color: orange !important;
                                pointer-events: auto;
                                cursor: default;
                            }
                }

                @media only screen and (-webkit-min-device-pixel-ratio: 2) {
                }
                @media only screen and (-webkit-device-pixel-ratio:.75){
                }
                @media only screen and (-webkit-device-pixel-ratio:1){
                }
                @media only screen and (-webkit-device-pixel-ratio:1.5){
                }
            </style>
        </head>
        <body>
        <table align="center" border="0" cellpadding="0" cellspacing="0" id="backgroundTable">
            <tbody>
                <tr>
                    <td valign="top">
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td height="50" width="600">&nbsp;</td>
                            </tr>
                            <tr>
                                <td height="90" style="color:#999999" width="600">Kimbu - Administrator</td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF" height="200" style="background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif" valign="top" width="600">
                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td height="10" width="560">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="560">
                                            <h4>Reset Password</h4>

                                            <p style="font-size:12px; font-family:Helvetica,Arial,sans-serif">Hallo, '. $this->EMAIL .'</p>

                                            <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Permintaan reset password berhasil, berikut adalah Password baru Anda.<br /><br />Password : ' . $this->PASSWORD . '<br /><br />Perlu diingat, setelah Login menggunakan password baru ini, Anda <strong>DIWAJIBKAN</strong> untuk mengubah password di halaman <strong>Profile User</strong> <span style="font-style:italic;color:#999999;">(pojok kanan atas)</span>.
                                            <br />
                                            <br />
                                            Salam,<br />
                                            Admin - Kimbu</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="10" width="560">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="10" width="600">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="right"><span style="font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif">Kimbu</span></td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
            </tbody>
        </table>
        </body>
        </html>
        ';
        $subject = "[Kimbu] Permintaan untuk Reset Password";
        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . Yii::app()->params['adminEmail'] . "\r\n";
        if(mail($to, $subject, $message, $headers))
            return true;
        else
            return false;
    }
}
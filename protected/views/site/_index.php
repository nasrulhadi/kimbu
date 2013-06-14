<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kimbu Admin Panel - Login Page</title>
        <?php $baseUrl = Yii::app()->theme->baseUrl; ?>
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/blue.css" />
        <!-- tooltip -->    
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/lib/qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo $baseUrl; ?>/css/style.css" />
    
        <!-- Favicon -->
            <link rel="shortcut icon" href="<?php echo $baseUrl; ?>/favicon.ico" />
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
        <!--[if lte IE 8]>
            <script src="<?php echo $baseUrl; ?>/js/ie/html5.js"></script>
            <script src="<?php echo $baseUrl; ?>/js/ie/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="ptrn_a">
        <div class="login_box">
            
            <?php $form = $this->beginWidget('CActiveForm',array(
                'id'=>'login_form',
                'enableAjaxValidation'=>false,
            )) ?>
                <div class="top_b">Lupa password?</div>
                <div class="cnt_b">
                    <div class="alert alert-error alert-login">
                        Reset password sukses dan telah dikirimkan ke <strong><?php echo $model->EMAIL; ?></strong>. Silahkan di cek pada email Anda.
                    </div>
                </div>
                <div class="btm_b clearfix">
                    <span class="link_reg pull-right">Kimbu Administrator</span>
                    <span class="link_reg"><a href="<?php echo Yii::app()->request->baseUrl?>/site/login">Kembali pada halaman Login.</a></span>
                </div>
            <?php $this->endWidget();?>
        </div>
        <script src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/jquery-migrate.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/jquery.actual.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/lib/validation/jquery.validate.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                
                //* boxes animation
                form_wrapper = $('.login_box');
                function boxHeight() {
                    form_wrapper.animate({ marginTop : ( - ( form_wrapper.height() / 2) - 24) },400);   
                };
                form_wrapper.css({ marginTop : ( - ( form_wrapper.height() / 2) - 24) });
                $('.linkform a,.link_reg a').on('click',function(e){
                    var target  = $(this).attr('href'),
                        target_height = $(target).actual('height');
                    $(form_wrapper).css({
                        'height'        : form_wrapper.height()
                    }); 
                    $(form_wrapper.find('form:visible')).fadeOut(400,function(){
                        form_wrapper.stop().animate({
                            height   : target_height,
                            marginTop: ( - (target_height/2) - 24)
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
                            $(form_wrapper).css({
                                'height'        : ''
                            }); 
                        });
                    });
                    e.preventDefault();
                });
                
                //* validation
                $('#login_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    rules: {
                        "LoginForm[username]": { required: true, minlength: 3 },
                        "LoginForm[password]": { required: true, minlength: 3 }
                    },
                    highlight: function(element) {
                        $(element).closest('div').addClass("f_error");
                        setTimeout(function() {
                            boxHeight()
                        }, 200)
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f_error");
                        setTimeout(function() {
                            boxHeight()
                        }, 200)
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    }
                });
            });
        </script>
    </body>
</html>

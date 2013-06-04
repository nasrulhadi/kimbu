<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'reg_form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('style="display:none"')
)); ?>
    <div class="top_b">Sign up to Kimbu Admin</div>
    <div class="alert alert-login">
        By filling in the form bellow and clicking the "Sign Up" button, you accept and agree to <a data-toggle="modal" href="#terms">Terms of Service</a>.
    </div>
    <div id="terms" class="modal hide fade" style="display:none">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Terms and Conditions</h3>
        </div>
        <div class="modal-body">
            <p>
                Nulla sollicitudin pulvinar enim, vitae mattis velit venenatis vel. Nullam dapibus est quis lacus tristique consectetur. Morbi posuere vestibulum neque, quis dictum odio facilisis placerat. Sed vel diam ultricies tortor egestas vulputate. Aliquam lobortis felis at ligula elementum volutpat. Ut accumsan sollicitudin neque vitae bibendum. Suspendisse id ullamcorper tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum at augue lorem, at sagittis dolor. Curabitur lobortis justo ut urna gravida scelerisque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam vitae ligula elit.
                Pellentesque tincidunt mollis erat ac iaculis. Morbi odio quam, suscipit at sagittis eget, commodo ut justo. Vestibulum auctor nibh id diam placerat dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse vel nunc sed tellus rhoncus consectetur nec quis nunc. Donec ultricies aliquam turpis in rhoncus. Maecenas convallis lorem ut nisl posuere tristique. Suspendisse auctor nibh in velit hendrerit rhoncus. Fusce at libero velit. Integer eleifend sem a orci blandit id condimentum ipsum vehicula. Quisque vehicula erat non diam pellentesque sed volutpat purus congue. Duis feugiat, nisl in scelerisque congue, odio ipsum cursus erat, sit amet blandit risus enim quis ante. Pellentesque sollicitudin consectetur risus, sed rutrum ipsum vulputate id. Sed sed blandit sem. Integer eleifend pretium metus, id mattis lorem tincidunt vitae. Donec aliquam lorem eu odio facilisis eu tempus augue volutpat.
            </p>
        </div>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn" href="#">Close</a>
        </div>
    </div>
    <div class="cnt_b">

        <div class="formRow">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="Username" />
            </div>
        </div>
        <div class="formRow">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span><input type="text" placeholder="Password" />
            </div>
        </div>
        <div class="formRow">
            <div class="input-prepend">
                <span class="add-on">@</span><input type="text" placeholder="Your email address" />
            </div>
            <small>The e-mail address is not made public and will only be used if you wish to receive a new password.</small>
        </div>

    </div>
    <div class="btm_b tac">
        <button class="btn btn-inverse" type="submit">Sign Up</button>
    </div>  
<?php $this->endWidget(); ?>
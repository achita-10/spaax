<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class=" degradado">
    </div>
</div>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100" >
            
				<span class="login100-form-title p-b-34 p-t-27">Inicio de Sesión</span>
            <br>
            <div id="formError" style="display: none; border:1px solid red;" id="on-hold-message" >
                <p>
                <?php
                echo 'Tu acceso a la cuenta ha sido bloqueado por ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutos.';
                ?>
                </p>
            </div>
            <div id="formAcceso" style="display: block;">
                <?php
                if(! isset($on_hold_message))
                {
                    ?>
                    <?php
                    echo form_open('login/ajax_attempt_login',['class' => 'std-form login100-form validate-form']);
                    ?>
                    <div class="wrap-input100 validate-input" >
                        <input type="text" class="input100"  name="login_string" autocomplete="off" maxlength="50" id="login_string" placeholder="Usuario">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input type="password" class="input100 form_input password" name="login_pass" id="login_pass"  placeholder="Contraseña"
                        <?php
                        if(config_item('max_chars_for_password')>0)
                            echo 'maxlength="'.config_item('max_chars_for_password').'"';
                        ?> autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');"/>
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <?php
                    if(config_item('allow_remember_me'))
                    {
                        ?>
                        <label for="remember_me" class="form_label">Recordar</label>
                        <input type="checkbox" id="remember_me" name="remember_me" value="yes">

                        <?php
                    }
                    ?>
                    <input type="hidden" id="max_allowed_attempts" value="<?php echo config_item('max_allowed_attempts'); ?>" />
                    <input type="hidden" id="mins_on_hold" value="<?php echo ( config_item('seconds_on_hold') / 60 ); ?>" />
                    <div class="container-login100-form-btn">
                        <button type="submit" class="btn login100-form-btn" value="Login" id="submit_button" />Iniciar Sesión</button>
                    </div>
                    <?php
                }

                // EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
                $error_display = ! isset( $on_hold_message )
                    ? 'display:none;'
                    : '';

                echo '
                    <div id="on-hold-message" style="border:1px solid red;'. $error_display.'">
                     <p>Intentos de inicio de sesión excesivos</p>
                     <p>  Tu acceso a la cuenta ha sido bloqueado por ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutos.</p>
                    </div>   ';

                ;?>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- End of file login_form.php
Location: /community_auth/views/examples/ajax_login_form.php -->

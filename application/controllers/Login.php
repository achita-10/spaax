<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }
    public function index(){
        $this->user_login();
    }

    public function user_login()
    {
        $this->is_logged_in();
        $this->tokens->name = config_item('login_token_name');
        $data['javascripts'] = [
            base_url() .  'assets/js/jquery-1.12.0.min.js'
        ];
        if ($this->authentication->on_hold == TRUE) {
            $data['on_hold_message'] = 1;

        } // This check for on hold is for normal login attempts
        else if ($on_hold = $this->authentication->current_hold_status()) {
            $data['on_hold_message'] = 1;
        }
        $link_protocol = USE_SSL ? 'https' : NULL;
       $data['final_head'] = "<script>
			$(document).ready(function(){
				$(document).on( 'submit', 'form', function(e){
					$.ajax({
						type: 'post',
						cache: false,
						url: '" . site_url('login/ajax_attempt_login', $link_protocol) . "',
						data: {
							'login_string': $('#login_string').val(),
							'login_pass': $('#login_pass').val(),
							'" . config_item('login_token_name') . "': $('[name=\"" . config_item('login_token_name') . "\"]').val()
						},
						dataType: 'json',
						success: function(response){
							$('[name=\"" . config_item('login_token_name') . "\"]').val( response.token );
							console.log(response);
							if(response.status == 1){		
                                
								window.location.replace('Principal');
							}else if(response.status == 0 && response.on_hold){
								//$('#formulario_inicio').hide();
								$('#on-hold-message').show();
								swal('Ha excedido la cantidad máxima de intentos de inicio de sesión.','','error');
                                document.getElementById('formAcceso').style.display='none';
                                document.getElementById('formError').style.display='block';
							}else if(response.status == 0 && response.count){
								swal('Intento de inicio de sesión fallido ' + response.count + ' de ' + $('#max_allowed_attempts').val(),'','error');
							}
						}
					});
					return false;
				});
			});
		</script>";

     $html = $this->load->view('frontend/users/page_header',$data, TRUE);
     $html .= $this->load->view('frontend/users/login', $data, TRUE);
     $html .= $this->load->view('frontend/users/footer', '', TRUE);
     echo $html;

    }

    public function ajax_attempt_login()
    {
        if( $this->input->is_ajax_request() )
        {
            // Allow this page to be an accepted login page
            $this->config->set_item('allowed_pages_for_login', ['login/ajax_attempt_login'] );
            // Make sure we aren't redirecting after a successful login
            $this->authentication->redirect_after_login = FALSE;
            // Do the login attempt
            $this->auth_data = $this->authentication->user_status( 0 );
            // Set user variables if successful login
            if( $this->auth_data )
                $this->_set_user_variables();
            // Call the post auth hook
            $this->post_auth_hook();
            // Login attempt was successful
            if( $this->auth_data )
            {
                echo json_encode([
                    'status'   => 1,
                    'user_id'  => $this->auth_user_id,
                    'username' => $this->auth_username,
                    'level'    => $this->auth_level,
                    'role'     => $this->auth_role,
                    'email'    => $this->auth_email
                ]);
            }
            // Login attempt not successful
            else
            {
                $this->tokens->name = config_item('login_token_name');

                $on_hold = (
                    $this->authentication->on_hold === TRUE OR
                    $this->authentication->current_hold_status()
                )
                    ? 1 : 0;
                echo json_encode([
                    'status'  => 0,
                    'count'   => $this->authentication->login_errors_count,
                    'on_hold' => $on_hold,
                    'token'   => $this->tokens->token()
                ]);
            }
        }
        // Show 404 if not AJAX
        else
        {
            show_404();
        }
    }

    public function logout()
    {
       $this->authentication->logout();

        // Set redirect protocol
        $redirect_protocol = USE_SSL ? 'https' : NULL;

        redirect( site_url( LOGIN_PAGE . '?' . AUTH_LOGOUT_PARAM . '=1', $redirect_protocol ) );
    }
}
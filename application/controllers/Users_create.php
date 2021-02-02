<?php

/**
 * Created by PhpStorm.
 * User: AndresPava
 * Date: 23/11/2018
 * Time: 05:38 PM
 */
class Users_create extends MY_Controller
{

    /**
     * Users_create constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->is_logged_in()){
            redirect(base_url());
        }else {
        // Load resources
            $this->load->helper('auth');
            $this->load->model('examples/examples_model');
            $this->load->model('examples/validation_callables');
            $this->load->model('Users_model');
            $this->load->model('Model_empleados');
            $this->load->model('Usuarios_model','Modelo');

        }
    }

    public function index(){
        
            $data = new stdClass();

            $data->title = "Administrar Cuentas";
            $data->contenido = 'users/account';
            $this->load->view('frontend', $data);
        
    }
    public function ajax_tabla_empleados(){
        $tabla='Empleado';
        $list = $this->Modelo->get_datatables_doc_recepcion($tabla);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            
            $row[] = $person->Nombre_U;
            $row[] = $person->Apellido_P_U;
            $row[] = $person->Apellido_M_U;
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Modifcar al cliente" onclick="crear_usuario('."'".$person->ID."'".')"><i class="fas fa-arrow-alt-circle-down"></i> Empleado</a>
                ';
            
            $data[] = $row;
        }
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->Modelo->count_all_doc_recepcion($tabla),
                        "recordsFiltered"   => $this->Modelo->count_filtered_doc_recepcion($tabla),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function save()
    {
        if($this->input->is_ajax_request()){

            $data = array('success' => false, 'messages' => array());
           // $this->form_validation->set_data( $user_data );
            $validation_rules = [
                [
                    'field' => 'nombre_usuario',
                    'label' => 'Usuario',
                    'rules' => 'trim|required|min_length[3]|max_length[20]|is_unique[' . db_table('user_table') . '.username]',
                ],
                [
                    'field' => 'passwd',
                    'label' => 'contraseña',
                    'rules' => [
                        'trim',
                        'required',
                        [
                            '_check_password_strength',
                            [ $this->validation_callables, '_check_password_strength' ]
                        ]
                    ],

                ],

                [
                    'field' => 'r_passwd',
                    'label' => 'confirmar contraseña',
                    'rules' => ['trim','required','matches[passwd]',
                    ],
                ],

                [
                    'field'  => 'correo',
                    'label'  => 'email',
                    'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
                    'errors' => [
                        'is_unique' => 'el correo debe ser unico'
                    ]
                ],
                [
                    'field' => 'role_level',
                    'label' => 'role',
                    'rules' => 'required|integer|in_list[1,2,11]',
                    'errors' => [
                        'in_list' => 'no se encuentra en lista']
                ]
            ];

            $this->form_validation->set_rules( $validation_rules );
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            if($this->form_validation->run())
            {
                $user_data['username'] = $this->input->post('nombre_usuario');
                $user_data['passwd'] = $this->authentication->hash_passwd($this->input->post('passwd'));
                $user_data['email'] = $this->input->post('correo');
                $user_data['auth_level'] = $this->input->post('role_level');
                $user_data['user_id']    = $this->examples_model->get_unused_id();
                $user_data['created_at'] = date('Y-m-d H:i:s');

                $id_empleado = $this->input->post('id_empleado');

                $lastID = $this->Users_model->save($user_data);

                $id_user['ID_User'] = $user_data['user_id'];

                if($lastID > 0 && $this->Model_empleados->update_id_user($id_user,$id_empleado)){
                    $data['success'] = true;
                }

            }else{
                    foreach ($_POST as $key => $value) {
                        $data['messages'][$key] = form_error($key);
                    }
                }
              echo json_encode($data);
                    }else{
            show_404();

        }

    }

    public function registrar_empleado(){
        if(!$this->form_validation->run()){
            $json   =   array(
                'nombre_empleado' => form_error('nombre_empleado','<span class="text-danger">','</span>'),
                'appaterno_empleado' => form_error('appaterno_empleado','<span class="text-danger">','</span>'),
                'apmaterno_empleado' => form_error('apmaterno_empleado','<span class="text-danger">','</span>'),
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($json));
        }else{
            $Nombre         =   $this->input->post('nombre_empleado');
            $Apellido_P     =   $this->input->post('appaterno_empleado');
            $Apellido_M     =   $this->input->post('apmaterno_empleado');
            $empleado        =   [
                            'Nombre_U'        =>  $Nombre,
                            'Apellido_P_U'    =>  $Apellido_P,
                            'Apellido_M_U'    =>  $Apellido_M,
                            
                        ];
            $this->Model_empleados->save($empleado);
            echo json_encode(array('status'=>'Validado'));
        }
    }

}
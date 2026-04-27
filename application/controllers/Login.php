<?php

  class Login extends CI_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->helper('form');
      }

      public function index(){
          $this->load->view("login");
      }

      public function validar(){
          $dados = $this->input->post();
          $dados['pass'] = md5($dados['pass']);

          $this->db->select('id_user, full_name, income, user_u, pass');
          $query = $this->db->get_where('user_cad', $dados);
          if($query->num_rows()==1){
              $registro = $query->row_array();
              $this->session->set_userdata('logado', $registro);
              redirect('user');
          }else{
              $dados['msg'] = "E-mail ou senha Incorretos";
              $this->load->view("login", $dados);
          }
      }

      public function logout(){
          $this->session->unset_userdata('logado', array());
          redirect('login');
      }
  }
 ?>

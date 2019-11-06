<?php

  class Register extends CI_Controller{

      
      public function __construct(){
          parent::__construct();
          
          $this->load->helper('form');
        }
        
        public function index(){
            $this->load->view("register");
        }
        
        public function cadastrar(){
          $this->load->helper('form');
          $this->load->library('form_validation');

          $dados = $this->input->post();
          $dados['pass'] = md5($dados['pass']);
          
          $this->form_validation->set_rules('full_name', 'Nome Completo', 'required');
          $this->form_validation->set_rules('income', 'Renda', 'required');
          $this->form_validation->set_rules('user_u', 'Usuário', "required|is_unique[user_cad.user_u]");
          $this->form_validation->set_rules('pass', 'Senha', 'required');

          if($this->form_validation->run() === false){
            $dados['msg'] = "Usuário já existe";
            $this->load->view("register", $dados);
          }else{   
            if($this->db->insert('user_cad', $dados)){
              $dados['cadastro'] = true;
              $this->load->view("register", $dados);
            }
          }
        }
      }
 ?>

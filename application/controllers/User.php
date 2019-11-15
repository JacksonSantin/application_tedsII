<?php
  class User extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('user_model');

      }

      public function index(){
        $dados['titulo']= "Manutenção de Usuários";
        $dados['lista'] = $this->user_model->get();

        $this->template->load('template', 'user/viewUser', $dados);
      }

      public function cadastrar($id=null)
      {
        $this->load->helper('form');
        $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Usuário";

          //definição de regras para o formulário
          $this->form_validation->set_rules('full_name', 'Nome Completo', 'required');
          $this->form_validation->set_rules('income', 'Renda', 'required');
          $this->form_validation->set_rules('image', 'Foto', '');
          $this->form_validation->set_rules('user_u', 'Usuário', 'required');
          
          if($id == null){
            $rule_nome = 'required' . (($id==null)? '|is_unique[user_cad.user_u]' : '');
            $this->form_validation->set_rules('user_u', 'Usuário', $rule_nome);
            $this->form_validation->set_rules('pass', 'Senha', '');
          }

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "user/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
            $dados['acao']    .= $id; //concatenando o id
            $dados['registro'] = $this->user_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              $this->template->load('template', 'user/formUser', $dados);
          }
          else{ //neste caso, form submetido e ok!
            $config['upload_path']          = './arquivos/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image'))
            {
              $error = array('error' =>$this->upload->display_errors());
              $dados['error'] = $error['error'];
              $this->template->load('template', 'user/formUser', $dados);
            }
            else
            {
              $this->user_model->cadastrar($this->upload->data('full_path'),$this->input->post(), $id);
              redirect('user/index'); //redireciona o fluxo da aplicação
            }
          }
      }

      public function remover($id){
        if(!$this->user_model->remover($id)){
            die('Erro ao tentar remover');
        }
        $this->index('user/index');
    }
  }

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

      public function remover($id){
        if(!$this->user_model->remover($id)){
            die('Erro ao tentar remover');
        }
        $this->index('user/index');
    }


      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Usuário";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[user_cad.user_u]' : '');

          $this->form_validation->set_rules('full_name', 'Nome Completo', 'required');
          $this->form_validation->set_rules('income', 'Renda', 'required');
          $this->form_validation->set_rules('user_u', 'Usuário', $rule_nome);
        
          if($id == null){
            $this->form_validation->set_rules('pass', 'Senha', 'required');
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
          }else{ //neste caso, form submetido e ok!
              
              if(!$this->user_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('user/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>

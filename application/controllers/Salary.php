<?php
  class Salary extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('salary_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Salário";
          $dados['lista'] = $this->salary_model->get();

          $this->template->load('template', 'salary/viewSalary', $dados);
      }

      public function remover($id){
          if(!$this->salary_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index('salary/index');
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //load da model de user_cad
          $this->load->model('user_model');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Salário";

          //definição de regras para o formulário
          $this->form_validation->set_rules('salary', 'Local', 'required');
          $this->form_validation->set_rules('id_user', 'Usuário', '');
        
          //acao dinamica que sera enviada para a view
          $dados['acao'] = "salary/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->salary_model->get($id);
          }

          //buscando a lista de pessoas
          $dados['listaUser'] = $this->user_model->get();


          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              
              $this->template->load('template', 'salary/formSalary', $dados);
          }else{ //neste caso, form submetido e ok!
              
              if(!$this->salary_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('salary/index'); //redireciona o fluxo da aplicação
          }
      }
  }
 ?>

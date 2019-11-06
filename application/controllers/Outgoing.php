<?php
  class Outgoing extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('outgoing_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Gastos";
          $dados['lista'] = $this->outgoing_model->get();

          $this->template->load('template', 'outgoing/viewOutgoing', $dados);
      }

      public function remover($id){
          if(!$this->outgoing_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index('outgoing/index');
      }


      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');
          //load da model de place
          $this->load->model('place_model');
          //load da model de user_cad
          $this->load->model('user_model');
            
          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Gastos";

          //definição de regras para o formulário
          $this->form_validation->set_rules('outgoing', 'Gasto', 'required');
          $this->form_validation->set_rules('outdate', 'Data do Gasto', 'required');
          $this->form_validation->set_rules('rating', 'Valor', 'required');
          $this->form_validation->set_rules('id_place', 'Local', '');
          $this->form_validation->set_rules('id_user', 'Usuário', '');

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "outgoing/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->outgoing_model->get($id);
          }
          //buscando a lista de pessoas
          $dados['listaPlace'] = $this->place_model->get();

          //buscando a lista de pessoas
          $dados['listaUser'] = $this->user_model->get();

          
          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              
              $this->template->load('template', 'outgoing/formOutgoing', $dados);
            }else{ //neste caso, form submetido e ok!
                
                if(!$this->outgoing_model->cadastrar($id)){
                    die("Erro ao tentar cadastrar os dados");
                }
                redirect('outgoing/index'); //redireciona o fluxo da aplicação
            }
        }
  }
 ?>

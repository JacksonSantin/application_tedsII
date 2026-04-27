<?php
  class Place extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('place_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Lugar";
          $dados['lista'] = $this->place_model->get();

          $this->template->load('template', 'place/viewPlace', $dados);
      }

      public function remover($id){
          if(!$this->place_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index('place/index');
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Lugar";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[place.place]' : '');
          
          $this->form_validation->set_rules('place', 'Local', $rule_nome);
        
          //acao dinamica que sera enviada para a view
          $dados['acao'] = "place/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->place_model->get($id);
          }


          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              
              $this->template->load('template', 'place/formPlace', $dados);
          }else{ //neste caso, form submetido e ok!
              
              if(!$this->place_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('place/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>

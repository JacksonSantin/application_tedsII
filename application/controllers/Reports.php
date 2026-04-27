<?php

  class Reports extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('reports_model');
      }

      public function formGastoPeriodo(){
          $dados['titulo'] = "Relatório de Gastos por período";
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->template->load('template', 'reports/formGastoPeriodo', $dados);
      }

      public function formLocais(){
        $dados['titulo'] = "Relatório de Lugares";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->template->load('template', 'reports/formLocais', $dados);
      }
      
      public function formSalarioRel(){
        $dados['titulo'] = "Relatório de Salários por Usuário";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->template->load('template', 'reports/formSalarioRel', $dados);
      }
      
      public function formUsuarios(){
        $dados['titulo'] = "Relatório de Usuários";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->template->load('template', 'reports/formUsuarios', $dados);
      }

      public function gastoPeriodo() {
          $ini   = $this->input->post('data_inicial');
          $fim   = $this->input->post('data_final');
          $dados['titulo'] = "Gasto por período";
          $dados['data']   = $this->reports_model->getGastoPeriodo($ini, $fim);
          $this->load->library('MY_FPDF');
          $this->load->view('reports/gastoPeriodoPDF', $dados);
      }
      public function locais() {
        $dados['titulo'] = "Locais";
        $dados['data']   = $this->reports_model->getLocais($dados);
        $this->load->library('MY_FPDF');
        $this->load->view('reports/locaisPDF', $dados);
      }
      public function salario() {
        $salaryIni   = $this->input->post('salario_inicial');
        $salaryFin   = $this->input->post('salario_final');
        $dados['titulo'] = "Salário";
        $dados['data']   = $this->reports_model->getSalario($salaryIni, $salaryFin);
        $this->load->library('MY_FPDF');
        $this->load->view('reports/salarioPDF', $dados);
      }
      public function usuarios() {
        $dados['titulo'] = "Usuários";
        $dados['data']   = $this->reports_model->getUsuarios($dados);
        $this->load->library('MY_FPDF');
        $this->load->view('reports/usuariosPDF', $dados);
      }

  }
 ?>

<?php
  class Salary_model extends CI_Model{
	private $tabelaNome;
      public function __construct(){
		$this->tabelaNome = 'salary';
      }

      public function get($id=null){
          if($id==null){
            $this->db->select('s.*, u.full_name as user_cad');
            $this->db->from('salary s');
            $this->db->join('user_cad u', 's.user=u.id_user');
              $query = $this->db->get();
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('id'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('id'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('id'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>

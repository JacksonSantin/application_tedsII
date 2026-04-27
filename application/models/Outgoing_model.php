<?php
  class Outgoing_model extends CI_Model{
	private $tabelaNome;
      public function __construct(){
		$this->tabelaNome = 'outgoing';
      }

      public function get($id=null){
          if($id==null){
            $this->db->select('o.*, p.place as place, u.full_name as user_cad'); 
            $this->db->from('outgoing o');
            $this->db->join('place p', 'p.id_place=o.place');
            $this->db->join('user_cad u', 'u.id_user=o.user');
              $query = $this->db->get();
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('id_outgoin'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('id_outgoin'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();
          //print_r($registro);
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('id_outgoin'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>

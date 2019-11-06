<?php
  class Reports_model extends CI_Model{

      public function __construct(){ }

      public function getGastoPeriodo($ini, $fim){
          $this->db->select('o.*, p.place as place, u.full_name as user_cad');
          $this->db->from('outgoing o');
          $this->db->join('place p', 'o.place=p.id_place');
          $this->db->join('user_cad u', 'o.user=u.id_user');

          $where = array('o.outdate>='=>$ini, 'o.outdate<='=>$fim);
          $this->db->where($where);
          $query = $this->db->get();
          return $query->result_array(); //todos os registros

      }

      public function getLocais(){
            $this->db->select('p.*');
            $this->db->from('place p');
            $query = $this->db->get();
            return $query->result_array(); //todos os registros
       }
       public function getSalario(){
        $this->db->select('s.*, u.full_name as user_cad');
        $this->db->from('salary s');
        $this->db->join('user_cad u', 's.user=u.id_user');
        $query = $this->db->get();
        return $query->result_array(); //todos os registros
       }
       public function getUsuarios(){
        $this->db->select('u.*');
        $this->db->from('user_cad u');
        $query = $this->db->get();
        return $query->result_array(); //todos os registros
       }
  }
 ?>

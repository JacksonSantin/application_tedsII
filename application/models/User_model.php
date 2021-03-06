<?php
  class User_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
		  $this->tabelaNome = 'user_cad';
      }
      
      public function get($id=null){
          if($id==null){
              $query = $this->db->get($this->tabelaNome);
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('id_user'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('id_user'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($path,$registro, $id=null){ 
        $registro['image'] = $path;

        if($id==null){ //registro novo
            $registro['pass'] = md5($registro['pass']);
            return $this->db->insert($this->tabelaNome, $registro);
        }

        return $this->db->where(array('id_user'=>$id))->update($this->tabelaNome,$registro);
    }

    //   public function cadastrar($id=null){
    //       $registro = $this->input->post();
    //       //criptografando a pass
    //       if($id==null){ //registro novo
    //           $registro['pass'] = md5($registro['pass']);
    //           return $this->db->insert($this->tabelaNome, $registro);
    //       }
    //       return $this->db->where(array('id_user'=>$id))->update($this->tabelaNome,$registro);
    //   }
  }
 ?>

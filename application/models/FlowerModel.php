<?php
class FlowerModel extends CI_Model {
 
function getFlowers(){
      $query=$this->db->get('flori');
    return $query->result();
}
function getFlower($id){
  $this->db->where('id',$id);
  $query = $this->db->get('flori');
  return $query->row();
} 
}

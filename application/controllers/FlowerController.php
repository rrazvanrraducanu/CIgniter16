<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FlowerController extends CI_Controller {
 
function __Construct(){
  parent::__Construct ();
   $this->load->model('FlowerModel','f'); // load model; 
//the model will be further referred with the letter f 
}
 
public function index() {
    $this->load->view('flowers_view');
}
public function view($id=NULL){
    $row=$this->f->getFlower($id);
    $data['r']=$row;
    $this->load->view('single_flower_view',$data);
}
public function insert(){
    $this->load->view('insert_view');
}
public function save(){
    //create array with input data
    $data=array(
        'nume'=>$this->input->post('nume'),
        'culoare'=>$this->input->post('culoare'),
        'marime'=>$this->input->post('marime'),
        'pret'=>$this->input->post('pret'),
    );
     //insert data
    $this->db->insert('flori',$data);
    //redirect
    redirect('FlowerController/index');
}

public function edit($id){
    $row=$this->f->getFlower($id);
    $data['r']=$row;
    $this->load->view('edit_view',$data);
}
public function update(){
    $id=$this->input->post('id');
    //create array with input data
    $data=array(
        'nume'=>$this->input->post('nume'),
        'culoare'=>$this->input->post('culoare'),
        'marime'=>$this->input->post('marime'),
        'pret'=>$this->input->post('pret'),
    );
    //update data
    $this->db->where('id',$id);
    $this->db->update('flori',$data);
     //redirect
    redirect('FlowerController/index');
}
public function delete($id){
    $id=$this->db->where('id',$id);
    $this->db->delete('flori');
    redirect('FlowerController/index');
}

}


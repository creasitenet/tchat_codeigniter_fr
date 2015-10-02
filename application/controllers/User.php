<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct(); 		
		$this->load->model('user_model', 'users');
		//$this->output->enable_profiler(TRUE);
	}
		
	public function login()	{
		//	Chargement de la bibliothèque
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pseudo', '"Pseudo"', 'trim|required|min_length[5]|max_length[50]|alpha_dash|encode_php_tags|callback_check_pseudo');
		$this->form_validation->set_rules('email', '"Email"', 'trim|required|valid_email|callback_check_email');
			
		if($this->form_validation->run()) {
			$insert_data = array('username'=>$this->input->post('pseudo'),'email'=>$this->input->post('email'));
			$id = $this->users->insert($insert_data);
			$data = array('user'=>$this->input->post('pseudo'),'user_id'=>$id, 'logged'=>true);
        	$this->session->set_userdata($data);
        	$this->session->set_flashdata('success_growl','Connecté');
			redirect(site_url());
		} else {
        	$this->session->set_flashdata('error_growl','Erreur. Veuillez corriger.');
			$this->template->view('tchat/index');
		}
	}
	
	public function logout() {
		$this->load->model('tchat_model', 'tchats');
		$this->tchats->where('user_id',$this->session->userdata('user_id'))->delete();
		$this->users->delete($this->session->userdata('user_id'));
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
        $this->session->set_flashdata('success_growl','Déconnecté');
		redirect(site_url());
	}
	
	// Refresh Liste des utilisateurs // Appel Ajax
    public function getAjaxRefresh() {
		$data['users'] = $this->users->where('active',1)->as_object()->get_all(); 
		print ($this->load->view('tchat/_users',$data, TRUE));
    }

	// fonction de callback
  	function check_pseudo() {
    	if($this->input->post('pseudo')) {
    		$this->db->select('id');
			$this->db->from('users');
			$this->db->where('username',$this->input->post('pseudo'));
			if($this->db->count_all_results()>0) {
        		$this->form_validation->set_message('check_pseudo','Ce pseudo est déjà pris');
        		return false;
      		} else {
        		return true;
      		}
    	}
  	}
  
  	function check_email() {
   		if($this->input->post('email'))	{
      		$this->db->select('id');
      		$this->db->from('users');
      		$this->db->where('email',$this->input->post('email'));
      		if($this->db->count_all_results()>0) {
        		$this->form_validation->set_message('check_email','Cet email est déjà utilisé');
        		return false;
      		} else {
        		return true;
      		}
    	}
  	}

}

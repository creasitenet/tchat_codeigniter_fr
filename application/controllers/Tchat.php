<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tchat extends CI_Controller {

	public function __construct() {
		//	Obligatoire
		parent::__construct();

		$this->load->model('tchat_model', 'tchats');
			
		//$this->output->enable_profiler(TRUE);
	}
	
	// Index // page d'accueil
	public function index()	{
		$data['messages'] = $this->tchats->with_user()->as_object()->get_all(); 
	    $this->template->view('tchat/index',$data);
	}
	
	// Ajouter un message // Appel Ajax
	public function postAjaxAdd() {
    	$d['result']= 0;
    	if(!$this->session->userdata('logged')) {
    		$d['message'] = "Vous devez être identifié pour participer.";
    	} else {
        	$text = $this->input->post('value');
			if ($text=="") {
				$d['message'] = "Vous devez écrire quelque chose pour participer.";
			} else {
				$insert_data = array('user_id'=>$this->session->userdata('user_id'),'text'=>$text);
				$this->tchats->insert($insert_data);
				$d['result'] = 1;
				$d['message'] = "";
				// Pour le refresh
				$d['url'] = 'tchat/getAjaxRefresh';
	            $d['data'] = '';
				$d['div'] = '#tchat_messages';
			}
		}
   		header('Content-Type: application/json');
		echo json_encode($d);
	}
	
    // Refresh Liste des messages // Appel Ajax
    public function getAjaxRefresh() {    	
		$data['messages'] = $this->tchats->with_user()->as_object()->get_all(); 
		print ($this->load->view('tchat/_messages',$data, TRUE));
    }	
   		
	// Pour l'admin
	// Utilisateur avec role = 100
	public function getAjaxDelete($id) {
		//$id = intval($this->input->post('value'));
        if ($this->tchats->delete($id)) {
            $d['result'] =  1;
            $d['message'] =  "Le message a été supprimé.";
        } else {
            $d['result'] =  0;
            $d['message'] = "Impossible de supprimer le message.";
        }
   		header('Content-Type: application/json');
    	echo json_encode( $d );
	}
	// AJAX // Retour Json	
		
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {
	
	public function __construct()
	{
        $this->table = 'users';
        $this->primary_key = 'id';
        $this->has_many['tchats'] = array(
        	'model'=>'Tchat_model',
        	'foreign_table'=>'tchats',
        	'foreign_key'=>'user_id',
        	'local_key'=>'id'
		);

		parent::__construct();
	}
		
	function get_user($username, $passwordcrypt) {
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $passwordcrypt));
		if ($query->num_rows()==1) {
			return $query->row();
		}
		return NULL;
	}
	
	function retrieve_user_email($email) {
		$query = $this->db->get_where('users', array('email' => $email));
		if ($query->num_rows()==1) {
			return $query->row();
		}
		return NULL;
	}
	
	function retrieve_user_username($username) {
		$query = $this->db->get_where('users', array('username' => $username));
		if ($query->num_rows()==1) {
			return $query->row();
		}
		return NULL;
	}
	
	/* Mot de passe aléatoire */
	function new_random_password() {
		$randomsize = 5;
		$letters = "abcdefghijklmnopqrstuvwxyz0123456789";
		srand(time());
		for ($i=0;$i<$randomsize;$i++) {
			$idc.=substr($letters,(rand()%(strlen($letters))),1);
		}
		return($idc);
	}
	
	function update_password($id, $passwordcrypt) {
		$datas = array(
			'password'=>$passwordcrypt,
		);
		return (bool) $this->db->where('id', $id)
	                           ->update('users', $datas);
	}

}
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
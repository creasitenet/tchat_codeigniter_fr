<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tchat_model extends MY_Model {
	
	public function __construct()
	{
        $this->table = 'tchats';
        $this->primary_key = 'id';
        $this->has_one['user'] = array(
        	'model'=>'User_model',
        	'foreign_table'=>'users',
        	'foreign_key'=>'id',
        	'local_key'=>'user_id'
		);
		parent::__construct();
	}
	
	
}

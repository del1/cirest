<?php
class TestApi_model extends CI_Model

{
    public function __construct(){
       	parent::__construct();
       	$this->load->database();
    }

    function getUserRecords()
	{ //get states by country id
		return $this->db->select('user.*')->get_where('user',array('userid'=>1))->result_array();
	}

	public function get_list_of_active_article()
	{
		return $this->db->select('articles.*')->get_where('articles',array('artcstatusid'=>1))->result_array();
	}

}
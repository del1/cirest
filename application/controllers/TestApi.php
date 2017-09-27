<?php
require(APPPATH.'/libraries/REST_Controller.php');
defined('BASEPATH') OR exit('No direct script access allowed');
class TestApi extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	//HTTP_NOT_FOUND //404
	//HTTP_OK //200
	//HTTP_CREATED //201 Created
	//HTTP_BAD_REQUEST//400 Bad requet
	//HTTP_NO_CONTENT //204
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TestApi_model');
/*        if(!authCheck($this->post('auth'))){
	        returnFailedResponse();
	        exit();
        }*/
	}
	public function record_get()
	{//test purpose
		//$this->response($this->TestApi_model->getUserRecords());
		$data=$this->TestApi_model->getUserRecords();
		/*$this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code*/

		 //$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        //$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        $this->set_response($data, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
		//$this->set_response($d, REST_Controller::HTTP_NO_CONTENT); 
	}

	public function active_article_list_post()
	{
		//$data=$_POST;
		//$this->set_response($data, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
		$data=$this->TestApi_model->get_list_of_active_article();
		$this->response([
                'status' => FALSE,
                'message' => 'Invalid Request'
            ], REST_Controller::HTTP_NOT_FOUND);

		/*$this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code*/
	}
}

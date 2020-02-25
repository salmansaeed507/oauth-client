<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url','auth']);
	}

	public function login()
	{
		$this->load->view('user/login');
	}

	public function post()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		Auth()->do_login($username,$password);
	}
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User');
		}

		public function index()
		{
			$users = $this->User->get_users();
			$this->load->view('dashboard/index', array('users' => $users));
		}

		public function admin()
		{
			$users = $this->User->get_users();
			$this->load->view('dashboard/admin', array('users' => $users));
		}
	}
?>
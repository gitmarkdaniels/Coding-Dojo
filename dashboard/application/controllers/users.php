<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User');
			$this->load->model('Wall');
		}
		public function index()
		{
			$this->load->view('users/index');
		}

		public function signin()
		{
			$user_input = $this->input->post(NULL, TRUE);

			if ($user_input)
			{
				$user_row = $this->User->login($user_input);

				if($user_row)
				{
					$user_data = array(
						'user_id' => $user_row['id'],
						'first_name' => $user_row['first_name'],
						'last_name' => $user_row['last_name'],
						'email' => $user_row['email'],
						'logged_in' => true);

					$this->session->set_userdata('user', $user_data);

					$this->session->set_flashdata('login_success', 'You are logged in');
					redirect('/users/show/' . $user_data['user_id']);
				}
				else
				{
					$this->session->set_flashdata('login_fail', 'Login failed');
					redirect('users/signin');
				}
			}
			else
			{
				$this->load->view('users/signin');
			}
		}

		public function register()
		{
			$user_input = $this->input->post(NULL, TRUE);
			var_dump($user_input);
			
			if ($user_input)
			{
				$user_row = $this->User->register($user_input);
			
				if($user_row)
				{
					$this->session->set_userdata('user', $user_row);
					$this->load->view('dashboard/index');
				}
				else
				{
					$this->session->set_flashdata('login_msg', 'Registration failed');
					redirect('/register');
				}
			}
			else
			{
				$this->load->view('users/register');
			}
		}

		public function add_new()
		{
			$this->load->view('users/add_new');
		}

		public function show($user_id)
		{
			$user = $this->User->show($user_id);
			$wall = $this->Wall->show($user_id);

			if ($wall == NULL)
			{
				$this->Wall->create($user_id);
			}

			$wall = $this->Wall->show($user_id);
			



			$this->load->view('users/show');
		}

		public function edit($user_id)
		{
			$this->load->view('users/edit');
		}
	}
?>
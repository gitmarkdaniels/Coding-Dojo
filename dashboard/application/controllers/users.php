<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User');
			$this->load->model('Wall');
			$this->load->model('Message');
			$this->load->model('Comment');
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
						'logged_in' => true,
						'admin' => $user_row['admin']);

					$this->session->set_userdata('user', $user_data);

					$this->session->set_flashdata('login_success', 'You are logged in');
					redirect('users/show/' . $user_data['user_id']);
				}
				else
				{
					$this->session->set_flashdata('login_fail', 'Login failed');
					redirect('signin');
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
					redirect('register');
				}
			}
			else
			{
				$this->load->view('users/register');
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('users');
		}

		public function new_user()
		{
			$this->load->view('users/add_new');
		}

		public function show($user_id)
		{
			// USER
			$user = $this->User->get_user($user_id);

			// WALL
			$wall = $this->Wall->show($user_id);

			if ($wall == NULL)
			{
				$this->Wall->create($user_id);
			}
			$wall = $this->Wall->show($user_id);

			// MESSAGE
			$messages = $this->Message->get_messages($wall['id']);

			// COMMENT
			$comments = [];
			foreach ($messages as $message)
			{
				$comments[] = $this->Comment->get_comments($message['id']);
			}

			// LOAD VIEW
			$this->load->view('Users/show', array('user' => $user,
												  'wall' => $wall,
												  'messages' => $messages,
												  'comments' => $comments));
		}

		public function edit($user_id)
		{
			$user = $this->User->get_user($user_id);
			$this->load->view('users/edit', array('user' => $user));
		}

		public function save($user_id)
		{
			$user_input = $this->input->post(NULL, TRUE);

			if ($user_input)
			{
				$user_row = $this->User->save_user($user_input);
			
				if($user_row)
				{
					redirect('users/edit/' . $user_id);
				}
				else
				{
					$this->session->set_flashdata('login_msg', 'Save failed');
					redirect('users/edit/' . $user_id);
				}
			}
			else
			{
				$this->session->set_flashdata('edit_msg', 'No user input');
				redirect('users/edit/' . $user_id);
			}
		}
	}
?>
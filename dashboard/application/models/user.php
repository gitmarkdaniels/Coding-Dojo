<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Model
	{
		public function register($user_input)
		{
			$admin = $this->db->get('users')->num_rows();
			if ($admin == 0)
			{
				$admin = true;
			}
			else
			{
				$admin = false;
			}
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$encrypted_password = md5($user_input['password'] . '' . $salt);

			$user_input = array(
				'first_name' => $user_input['first_name'], 
				'last_name' => $user_input['last_name'], 
				'email' => $user_input['email'],
				'password' => $encrypted_password,
				'admin' => $admin,
				'salt' => $salt);
			var_dump($user_input);

			$query = "INSERT INTO user_dashboard.users (first_name, last_name,
						email, password, admin, created_at, updated_at, salt)
						VALUES (?, ?, ?, ?, ?, now(), now(), ?)";
			$user_row = $this->db->query($query, $user_input);
			return $user_row;
		}

		public function login($user_input)
		{
			$query = "SELECT * FROM user_dashboard.users
						WHERE users.email = ?";

			$user_row = $this->db->query($query, $user_input['email'])->row_array();

			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$encrypted_password = md5($user_input['password'] . '' . $user_row['salt']);

			if(!empty($user_row))
			{
				if ($user_input['email'] == $user_row['email'] &&
					$user_row['password'] == $encrypted_password)
				{
					return $user_row;
				}
				else
				{
					return false;
				}
			}
			else
			{
				echo '$user_row is empty';
			}
		} // End of login()

		public function get_user($user_id)
		{
			$query = "SELECT * FROM users WHERE id = ?";
			return $this->db->query($query, $user_id)->row_array();
		}

		public function get_users()
		{
			$query = "SELECT * FROM users";
			return $this->db->query($query)->result_array();
		}

		public function save_user($user_input)
		{
			$user_input = array(
				'first_name' => $user_input['first_name'], 
				'last_name' => $user_input['last_name'], 
				'email' => $user_input['email'],
				'admin' => $user_input['level'],
				'id' => $user_input['user_id']);

			$query = "UPDATE user_dashboard.users 
						SET first_name = ?, last_name = ?, email = ?, admin = ?, updated_at = now()
						WHERE id = ?";
			$user_row = $this->db->query($query, $user_input);

			return $user_row; // returns a boolean
		}
	} // End of class
?>
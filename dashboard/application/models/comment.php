<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Comment extends CI_Model
	{
		public function create_comment($comment_info)
		{
			$query = "INSERT INTO comments (
							content, created_at,
							updated_at, user_id, message_id
						)
						VALUES (?, now(), now(), ?, ?)";

			$comment = array($comment_info['comment_content'],
								$comment_info['user_id'],
								$comment_info['message_id']);

			$this->db->query($query, $values);

			return true;
		}

		public function get_comments($message_id)
		{
			// $query = "SELECT comments.id, comments.content, comments.created_at,
			// 					users.first_name, users.last_name
			// 			FROM messages
			// 			LEFT JOIN users ON messages.users_id = users.id
			// 			LEFT JOIN comments ON messages.id = comments.message_id
			// 			WHERE messages.id = ?";
			// return $this->db->query($query, $message_id)->result_array();
		}
	}
?>
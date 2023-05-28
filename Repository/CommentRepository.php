<?php

require_once(ROOT . '/config/DB.php');
require_once(ROOT . '/Interface/CommentRepositoryInterface.php');

class CommentRepository implements CommentRepositoryInterface
{

    private $db;
    function __construct()
	{
        $this->db = DB::getInstance();
	}

    /**
     * TODO: get All from news table
     */
    public function getAllComments()
    {
        $db = $this->db;
		return $db->select('SELECT * FROM `comment`');
    }

	/**
	 * Adds comment for news
	 * @param mixed $body
	 * @param mixed $newsId
	 * @return mixed 
	 */
    public function addCommentForNews($body, $newsId)
	{
		$db = $this->db;
		$sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES('". $body . "','" . date('Y-m-d') . "','" . $newsId . "')";
		$db->exec($sql);
		return $db->lastInsertId($sql);
	}

	/**
	 * deletes a news, and also linked comments
	 * @param mixed $id
	 * @return string|void
	 */
	public function deleteComment($id)
	{
		$db = $this->db;
		$sql = "DELETE FROM `comment` WHERE `id`=" . $id;
		return $db->exec($sql);
	}
}
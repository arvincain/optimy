<?php

require_once(ROOT . '/config/DB.php');
require_once(ROOT . '/Interface/NewsRepositoryInterface.php');

class NewsRepository implements NewsRepositoryInterface
{

    private $db;
    function __construct()
	{
        $this->db = DB::getInstance();
	}

    /**
     * TODO: get All from news table
     */
    public function getAllNews()
    {
		return $this->db->select('SELECT * FROM `news`');
    }

	/**
	* add a record in news table
	*/
	public function addNews($title, $body)
	{
        $db = $this->db;
		$sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES('". $title . "','" . $body . "','" . date('Y-m-d') . "')";
		$db->exec($sql);
		return $db->lastInsertId($sql);
	}

	/**
	* deletes a news, and also linked comments
	*/
	public function deleteNews($id)
	{
		$db = $this->db;
		$sql = "DELETE FROM `news` WHERE `id`=" . $id;
		return $db->exec($sql);
	}
}
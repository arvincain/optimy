<?php

class DB
{
	private $pdo;

	private static $instance = null;

	private function __construct()
	{
		$dsn = 'mysql:dbname=phptest;host=127.0.0.1';
		$user = 'root';
		$password = '';

		$this->pdo = new \PDO($dsn, $user, $password);
	}

	/**
	 * @return object
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
	 * @param mixed $sql
	 * @return array|false
	 */
	public function select($sql)
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	/**
	 * @param mixed $sql
	 * @return int|false
	 */
	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}

	/**
	 * @return string|false
	 */
	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}
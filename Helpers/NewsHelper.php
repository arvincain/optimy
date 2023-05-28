<?php

class NewsHelper
{
	protected $id, $title, $body, $createdAt;
	
	/**
	 * @param mixed $id
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $title
	 * @return $this
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * @return mixed 
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $body
	 * @return $this
	 */
	public function setBody($body)
	{
		$this->body = $body;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * @param mixed $createdAt
	 * @return $this 
	 */	
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * @return mixed 
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}
}
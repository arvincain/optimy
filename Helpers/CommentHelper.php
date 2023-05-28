<?php

class CommentHelper
{
    protected $id, $body, $createdAt, $newsId;

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

    /**
     * @return mixed
     */
	public function getNewsId()
	{
		return $this->newsId;
	}

    /**
     * @param mixed $newsId
     * @return $this
     */
	public function setNewsId($newsId)
	{
		$this->newsId = $newsId;
		return $this;
	}
}
?>
<?php

require_once(ROOT . '/Services/CommentService.php');

class CommentController
{
    private static $instance = null;
    private $commentService;

	private function __construct()
	{
        $this->commentService = new CommentService();
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
	 * Insertion of comment for news 
	 * @param mixed $body
	 * @param mixed $newsId
	 * @return mixed
	 */
    public function addCommentForNews($body, $newsId)
	{
        return $this->commentService->addCommentForNews($body,$newsId);
	}

    /**
	 * deletes a news, and also linked comments
	 * @param mixed $id
	 * @return string|void
	 */
	public function deleteComment($id)
	{
        return $this->commentService->deleteComment($id);
	}
}
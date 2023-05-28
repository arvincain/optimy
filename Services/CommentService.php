<?php

require_once(ROOT . '/Repository/CommentRepository.php');
require_once(ROOT . '/Helpers/CommentHelper.php');

class CommentService
{

    private $commentRepository;
    function __construct()
	{
        $this->commentRepository = new CommentRepository();
	}

	/**
     * Gets all news from database
	 * @var array|string $listAllComments
	 */
    public function listComments()
	{
		try {
			$rows = $this->commentRepository->getAllComments();
			$comments = [];
			foreach($rows as $row) {
				$commentHelper = new CommentHelper();
				$comments[] = $commentHelper->setId($row['id'])
				  ->setBody($row['body'])
				  ->setCreatedAt($row['created_at'])
				  ->setNewsId($row['news_id']);
			}
			return $comments;

		  } catch(Exception $e) {
			return $e->getMessage();
		  }
	}

	/**
	 * Retrieves Ids to delete
	 * @param mixed $id
	 * @return array|string
	 */
	public function getIdsToDelete($id)
	{
		try {
			$comments = $this->listComments();
			$idsToDelete = [];
			foreach ($comments as $comment) {
				if ($comment->getNewsId() == $id) {
					$idsToDelete[] = $comment->getId();
				}
			}
			return $idsToDelete;

		} catch(Exception $e) {
			return $e->getMessage();
		}

	}
	/**
	 * Adds comment for news
	 * @param mixed $body
	 * @param mixed $newsId
	 * @return mixed 
	 */
	public function addCommentForNews($body, $newsId)
	{
        try{
            return $this->commentRepository->addCommentForNews($body, $newsId);
        } catch(Exception $e) {
			return $e->getMessage();
		}
	}

	/**
	 * deletes a news, and also linked comments
	 * @param mixed $id
	 * @return string|void
	 */
	public function deleteComment($id)
	{
		try {
			$idsToDelete = $this->getIdsToDelete($id);
			foreach($idsToDelete as $id) {
				$this->commentRepository->deleteComment($id);
			}

		} catch(Exception $e) {
			return $e->getMessage();
		}
	}
}
?>
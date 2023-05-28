<?php

require_once(ROOT . '/Helpers/NewsHelper.php');
require_once(ROOT . '/Repository/NewsRepository.php');
require_once(ROOT . '/Services/CommentService.php');

class NewsService
{

    private $newsRepository;
    private $commentService;
    function __construct()
	{
        $this->newsRepository = new NewsRepository();
        $this->commentService = new CommentService();
	}

    /**
     * Gets all news from database
     * @return array
     */
    public function listAllNews()
    {
        try {
            $rows = $this->newsRepository->getAllNews();
            $news = [];
            foreach($rows as $row) {
                $newsHelper = new NewsHelper();
                $news[] = $newsHelper->setId($row['id'])
                  ->setTitle($row['title'])
                  ->setBody($row['body'])
                  ->setCreatedAt($row['created_at']);
            }
            return $news;
        } catch(Exception $e) {
			return $e->getMessage();
		}
    }

    /**
     * add a record in news table
     * @param mixed $title
     * @param mixed $body
     * @return mixed
	*/
	public function addNews($title, $body)
	{
        try {
            return $this->newsRepository->addNews($title, $body);
		} catch(Exception $e) {
			return $e->getMessage();
		}
	}

    /**
     * deletes a news, and also linked comments
     * @param mixed $id
     * @return string|void
	*/
	public function deleteNews($id)
	{
        try {
            $this->commentService->deleteComment($id);
            $this->newsRepository->deleteNews($id);
        } catch(Exception $e) {
			return $e->getMessage();
		}
	}
}

?>
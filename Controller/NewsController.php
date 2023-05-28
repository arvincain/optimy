<?php

require_once(ROOT . '/Services/NewsService.php');
require_once(ROOT . '/Services/CommentService.php');

class NewsController
{
    private static $instance = null;
    private $newsService;
    private $commentService;

	private function __construct()
	{
        $this->newsService = new NewsService();
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
     * Parses all the news and comments for display
	 * @return void
     */
    public function index()
    {
        $listAllNews = $this->listAllNews();
        $listAllComments = $this->commentService->listComments();
        foreach ($listAllNews as $news) {
            echo("############ NEWS " . $news->getTitle() . " ############\n");
            echo($news->getBody() . "\n");
            foreach ($listAllComments as $comment) {
            	if ($comment->getNewsId() == $news->getId()) {
            		echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
            	}
            }
        }
    }

    /**
     * get all news from news table
     * @return array
     */
	public function listAllNews()
	{
        return $this->newsService->listAllNews();
    }

	/**
	 * add a record in news table
	 * @param mixed $title
	 * @param mixed $body
	 * @return mixed
	*/
	public function addNews($title, $body)
	{
		return $this->newsService->addNews($title, $body);
	}

    /** 
	 * deletes a news, and also linked comments
	 * @param mixed $id
	 * @return string|void
	*/
	public function deleteNews($id)
	{
		return $this->newsService->deleteNews($id);
	}
}
?>
<?php


Interface CommentRepositoryInterface
{
    public function getAllComments();
    public function addCommentForNews($body, $newsId);
	public function deleteComment($id);
}
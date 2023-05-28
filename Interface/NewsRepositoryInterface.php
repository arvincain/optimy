<?php

interface NewsRepositoryInterface
{
    public function getAllNews();
    public function addNews($title, $body);
    public function deleteNews($id);
}
<?php

class Article extends Database
{
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC';
        return $this->createQuery($sql);
    }

    public function getArticle($articleld)
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article WHERE id = ?';
        return $this->createQuery($sql, [$articleld]);
    }
}
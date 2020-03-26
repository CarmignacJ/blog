<?php
//Pour toutes les classes dans DAO
namespace App\src\DAO;

class ArticleDAO extends Database
{
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC';
        return $this->createQuery($sql);
    }

    public function getArticle($articleid)
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article WHERE id = ?';
        return $this->createQuery($sql, [$articleid]);
    }
}
<?php
//Pour toutes les classes dans DAO
namespace App\src\DAO;

class CommentDAO extends Database
{
    public function getCommentsFromArticle($articleid)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        return $this->createQuery($sql, [$articleid]);
    }
}
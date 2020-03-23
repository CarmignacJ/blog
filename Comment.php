<?php

class Comment extends Database
{
    public function getCommentsFromArticle($articleld)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        return $this->createQuery($sql, [$articleld]);
    }
}
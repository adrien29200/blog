<?php

namespace Blog\src\DAO;

use Blog\config\Parameter;
use Blog\src\model\Comment;

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        $comment->setFlag($row['flag']);
        $comment->setArticle_id($row['article_id']);
        return $comment;
    }

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag, article_id FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function addComment(Parameter $post, $articleId)
    {
        $sql = 'INSERT INTO comment (pseudo, content, createdAt, flag, article_id) VALUES (?, ?, NOW(), ?, ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), 0, $articleId]);

        $sql = 'UPDATE article SET numberOfComments = numberOfComments + 1 WHERE id = ?';
        $this->createQuery($sql, [$articleId]);
    }

    public function flagComment($commentId)
    {
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }
    
    public function unflagComment($commentId)
    {
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }

    public function deleteComment($commentId, $articleId)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$commentId]);

        $sql = 'UPDATE article SET numberOfComments = numberOfComments - 1 WHERE id = ?';
        $this->createQuery($sql, [$articleId]);
    }

    public function getFlagComments()
    {
        $sql = 'SELECT id, pseudo, content, createdAt, article_id, flag FROM comment WHERE flag = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [1]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
}
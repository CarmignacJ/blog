<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home', [
           'articles' => $articles
        ]);
    }

    public function article($articleid)
    {
        $article = $this->articleDAO->getArticle($articleid);
        $comments = $this->commentDAO->getCommentsFromArticle($articleid);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function addComment(Parameter $post, $articleid)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if(!$errors) {
                $this->commentDAO->addComment($post, $articleid);
                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                header('Location: ../public/index.php');
            }
            $article = $this->articleDAO->getArticle($articleid);
            $comments = $this->commentDAO->getCommentsFromArticle($articleid);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    public function flagComment($commentid)
    {
        $this->commentDAO->flagComment($commentid);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php');
    }
}
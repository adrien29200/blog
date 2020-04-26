<?php

namespace Blog\src\controller;

use Blog\config\Parameter;

class BackController extends Controller
{
    // private function checkLoggedIn()
    // {
    //     if(!$this->session->get('pseudo')) {
    //         $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
    //         header('Location: ../public/index.php?route=login');
    //     } else {
    //         return true;
    //     }
    // }

    // private function checkAdmin()
    // {
    //     $this->checkLoggedIn();
    //     if(!($this->session->get('role') === 'admin')) {
    //         $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
    //         header('Location: ../public/index.php?route=profile');
    //     } else {
    //         return true;
    //     }
    // }

    public function administration()
    {
        $articles = $this->articleDAO->getArticles();
        $comments = $this->commentDAO->getFlagComments();
        return $this->view->render('administration', [
            'articles' => $articles,
            'comments' => $comments
        ]);   
    }

    public function addArticle(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if (!$errors) {
                $this->articleDAO->addArticle($post, $this->session->get('id'));
                $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
                header('Location: ../public/index.php?route=administration');
            }
            return $this->view->render('add_article', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_article');
    }

    public function editArticle(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if (!$errors) {
                $this->articleDAO->editArticle($post, $articleId, $this->session->get('id'));
                $this->session->set('edit_article', 'L\' article a bien été modifié');
                header('Location: ../public/index.php?route=administration');
            }
            return $this->view->render('edit_article', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        $post->set('id', $article->getId());
        $post->set('title', $article->getTitle());
        $post->set('content', $article->getContent());
        $post->set('author', $article->getAuthor());

        return $this->view->render('edit_article', [
            'post' => $post
        ]);
    }

    public function deleteArticle($articleId)
    {
        $this->articleDAO->deleteArticle($articleId);
        $this->session->set('delete_article', 'L\' article a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }

    public function unflagComment($commentId)
    {
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: ../public/index.php?route=administration');
    }

    public function deleteComment($commentId)
    {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }

    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        if($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        }
        header('Location: ../public/index.php');
    }

    // public function login(Parameter $post)
    // {
    //     if($post->get('submit')) {
    //         $result = $this->adminDAO->login($post);
    //         if($result && $result['isPasswordValid']) {
    //             $this->session->set('login', 'Content de vous revoir');
    //             $this->session->set('pseudo', $post->get('pseudo'));
    //             header('Location: ../public/index.php?route=administration');
    //         }
    //         else {
    //             $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
    //             return $this->view->render('login', [
    //                 'post'=> $post
    //             ]);
    //         }
    //     }
    //     return $this->view->render('login');
    // }

    // public function login(Parameter $post)
    // {
    //     if($post->get('submit')) {
    //         $result = $this->userDAO->login($post);
    //         if($result && $result['isPasswordValid']) {
    //             $this->session->set('login', 'Content de vous revoir');
    //             $this->session->set('id', $result['result']['id']);
    //             $this->session->set('role', $result['result']['name']);
    //             $this->session->set('pseudo', $post->get('pseudo'));
    //             header('Location: ../public/index.php');
    //         }
    //         else {
    //             $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
    //             return $this->view->render('login', [
    //                 'post'=> $post
    //             ]);
    //         }
    //     }
    //     return $this->view->render('login');
    // }

    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            if($post->get('pseudo') === 'jean' && $post->get('password') === 'jean1234') {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('pseudo', ucfirst($post->get('pseudo')));
                header('Location: ../public/index.php?route=administration');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}
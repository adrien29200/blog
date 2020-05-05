<?php

namespace Blog\config;
use Blog\src\controller\BackController;
use Blog\src\controller\ErrorController;
use Blog\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;
    // private $frontRoutes = [ "article" => "article($this->request->getGet()->get('articleId'))",
    //                     "addComment" => "addComment($this->request->getPost(), $this->request->getGet()->get('articleId'))",
    //                     "flagComment" => "flagComment($this->request->getGet()->get('commentId'))",
    //                     "home" => "home()" ];
    // private $backRoutes = [ "addArticle" => "addArticle($this->request->getPost())",
    //                     "editArticle" => "editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'))",
    //                     "deleteArticle" => "deleteArticle($this->request->getGet()->get('articleId'))",
    //                     "unflagComment" => "unflagComment($this->request->getGet()->get('commentId'))",
    //                     "deleteComment" => "deleteComment($this->request->getGet()->get('commentId'), $this->request->getGet()->get('articleId'))",
    //                     "login" => "login($this->request->getPost())",
    //                     "administration" => "administration()",
    //                     "articleAdmin" => "articleAdmin($this->request->getGet()->get('articleId'))" ];

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    // public function run()
    // {
    //     $route = $this->request->getGet()->get('route');
    //     try{
    //         if(key_exists($route, $this->frontRoutes)) {
    //             $path = $this->frontRoutes[$route];
    //             $this->frontController->$path;    
    //         } 
    //         elseif(key_exists($route, $this->backRoutes)) {
    //             $path = $this->backRoutes[$route];
    //             $this->backController->$path;
    //         }
    //         else {
    //             $this->errorController->errorNotFound();
    //         }
    //     }
    //     catch (Exception $e)
    //     {
    //         var_dump($e);
    //         $this->errorController->errorServer();
    //     }
    // }

    public function run()
    {
        $route = $this->request->getGet()->get('route');

        try{
            if(isset($route))
            {
                if($route === 'article'){
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'addArticle'){
                    $this->backController->addArticle($this->request->getPost());
                }
                elseif($route === 'editArticle'){
                    $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }
                elseif($route === 'deleteArticle'){
                    $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'addComment'){
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }
                elseif($route === 'flagComment'){
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'unflagComment'){
                    $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'), $this->request->getGet()->get('articleId'));
                }
                elseif($route === 'login'){
                    $this->backController->login($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->backController->logout();
                }
                elseif($route === 'administration'){
                    $this->backController->administration();
                }
                elseif($route === 'articleAdmin'){
                    $this->backController->articleAdmin($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'home'){
                    $this->frontController->home();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            var_dump($e);
            $this->errorController->errorServer();
        }
    }
}
<?php

namespace Blog\src\controller;

use Blog\config\Request;
use Blog\src\constraint\Validation;
use Blog\src\DAO\ArticleDAO;
use Blog\src\DAO\CommentDAO;
use Blog\src\DAO\AdminDAO;
use Blog\src\model\View;

abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected $adminDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->adminDAO = new AdminDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}
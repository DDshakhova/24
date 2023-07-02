<?php

namespace App\controllers;
use App\core\Controller;
use App\core\Model_Portfolio as Cakes;


class Home extends Controller 
{
    public function index()
{
    $this->view->render('home.phtml', 'template.phtml');
}

public function about()
{
    $this->view->render('about.phtml', 'template.phtml');
}

public function help()
{
    $this->view->render('help.phtml', 'template.phtml');
}

public function portfolio()
{
    $data = (new Cakes())->get_data();
    $this->view->render('portfolio.phtml', 'template.phtml', $data);
}
}

// видела как сделать контроллеры на каждую страницу, понравилась там фишка с префиксами в Route
// когда-нибудь попробую
// сейчас этот вариант полностью удовлетворяет потребности этого проекта
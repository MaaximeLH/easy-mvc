<?php

namespace App\Controllers;

use App\Entity\User;
use Core\Entity;
use Core\Request;
use \Core\View;

class Home extends \Core\Controller
{
    public function indexAction() {

        $params = Request::getAllParams();

        if(!empty($params['lang'])) {
            $this->setLanguage($params['lang']);
            $this->redirectTo(strtok($_SERVER['REQUEST_URI'], "?"));
        }

        View::render('Home/index', [
                'demoLang' => ($this->getLanguage() == "fr_FR") ? 'en_US' : 'fr_FR'
            ]
        );
    }
    
    public function exampleAction() {
    
        $em = Entity::getEntityManager();
        
        // Get repository for User::class
        $repository = $em->getRepository(User::class);
        
        // Test ORM here
        // ...
    }
}

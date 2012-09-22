<?php
// app/Controller/HomeController.php

class HomeController extends AppController {

    public $name = 'Home';	
    public function index() {
	//se asigna a authUser el usuario actual. Esto funciona para validar en la vista el acceso
	$this->set('authUser', $this->Auth->user());
    }
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }


    /**
     * index
     */
    public function index()
	{

	    $head = array(
            "scripts" => array(
                "login.js"
            )
        );

	    var_dump($_SESSION);
    }
}

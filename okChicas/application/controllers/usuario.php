<?php

session_start();

defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller
{
  public function __construct()
   {
  parent::__construct();
     # code...
/*   $metodo = $this->router->fetch_method();

      if (!isset($_SESSION['gale_user']) && $metodo != 'login') {
        # code...
        redirect('usuario/entrar');
      }*/
   }

/*  function index()
  {
    # code...
    $this->load->view('usuario/inicio');
  }
*/
  function entrar()
  {
    # code...
    $this->load->view('usuario/entrar');
  }

  function usuario()
  {
    # code...
    $this->load->view('usuario/usuario');
  }

  public function blog()
  {
     $this->load->view('usuario/blog');
  }

 function salir()
  {
    unset($_SESSION['gale_user']);
    unlink('usu.txt');
    redirect('usuario/entrar');
  }
}


 ?>

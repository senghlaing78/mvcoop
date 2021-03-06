<?php
class Page extends Controller
{
 private $db;
 public function __construct()
 {
  $this->userModel = $this->model('UserModel');
  $this->db = new Database;
 }

 public function index()
 {

  $data = [
   'title' => 'Home'
  ];
  $this->view('pages/login', $data);

 }

 public function register()
 {
  $this->view('pages/register');
 }
 
 public function dashboard()
 {
  $this->view('pages/dashboard');
 }

 public function create($id)
 {
  echo $id;
 }

 public function about()
 {
  $data = [
   'title' => 'About',
  ];

  $this->view('pages/about', $data);

 }
 
}

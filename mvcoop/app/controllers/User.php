<?php
class User extends Controller
{
 private $db;
 public function __construct()
 {
  $this->db        = new Database;
 }

 public function index()
 {
  $user = $this->db->readAll("types");
  $data = [
   'title' => 'Welcome',
   'user'  => $user,
  ];
  
  
  $this->view('income/index',  $data);

 }

 
 public function create()
 {
  echo "This is user create";
 }

}
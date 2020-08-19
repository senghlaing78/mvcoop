<?php
class Car extends Controller
{
 private $db;
 public function __construct()
 {
  $this->db        = new Database;
 }

 public function index()
 {
  $user = $this->db->readAll("incomes");
  $data = [
   'title' => 'Welcome',
   'user'  => $user,
  ];
  
  
  $this->view('income/index', $data);

 }

 
 public function show()
 {
  echo "This is show page";
 }

}
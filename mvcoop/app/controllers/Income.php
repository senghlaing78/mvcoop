<?php
class Income extends Controller
{
 private $db;
 public function __construct()
 {
  $this->db        = new Database;
 }

 public function index()
 {
  $income = $this->db->readAll("incomes");
  $data = [
   'title' => 'Income data',
   'incomes'  => $income,
  ];
  
  
  $this->view('income/index',  $data);

 }

 public function create()
 {
 	$category = $this->db->readAll("categories");
	  $data = [
	   
	   'categories'  => $category,

	  ];
 	$this->view('income/create',$data);
 }
 
public function store()
 {
  $users=$this->db->readAll("users");
  foreach ($users as $user)
  {
    $user_id=$user['id'];
  }
   if($_SERVER['REQUEST_METHOD']=="POST")
   {

    $category_id=$_POST['category_id'];  
    $amount=$_POST['amount'];

    $this->model('IncomeModel');

    $income=new IncomeModel();
    $income->setCategory($category_id);
    $income->setAmount($amount);
    $income->setDate(date('Y-m-d'));
    $income->setUser($user_id);

    $added=$this->db->create('incomes',$income->toArray());
    if($added)
    {
      setMessage('success','Successfully added');
    }


   }
   redirect('income');
 }

 public function edit($id)
 {
  $id=base64_decode($id);

  $income=$this->db->getById('incomes',$id);
  $categories=$this->db->readAll('categories');
  $data=[

      'income'=>$income,
      'categories'=>$categories,
  ];

  $this->view('income/edit',$data);
 }

 public function update()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
      {
        $id=$_POST['id'];
        $date=$_POST['date'];
        $user_id=$_POST['user_id'];
        $category_id=$_POST['category_id'];
        $amount=$_POST['amount'];

        $this->model('IncomeModel');

        $income=new IncomeModel;
        $income->setId($id);
        $income->setDate($date);
        $income->setUser($user_id);
        $income->setCategory($category_id);
        $income->setAmount($amount);

        $updated=$this->db->update('incomes',$income->getId(),$income->toArray());

        if($updated)
        {
          setMessage('success','Successfully Updated!');
        }
      }
      redirect('income');
  }

  public function destory($id)
  {
    $id=base64_decode($id);
    $income=$this->db->getById('incomes',$id);
    $this->model('IncomeModel');

    $income=new IncomeModel;
    $income->setId($id);

    $deleted=$this->db->delete('incomes',$id,$income->toArray());
    if($deleted)
    {
      setMessage('success','Successfully deleted!');
    }
    redirect('income');
  }

}
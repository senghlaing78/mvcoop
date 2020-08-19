<?php
class Expense extends Controller
{
 private $db;
 public function __construct()
 {
  $this->db        = new Database;
 }

 public function index()
 {
  $expense = $this->db->readAll("expenses");
  $data = [
   'title' => 'Expense data',
   'expenses'  => $expense,
  ];
  
  
  $this->view('expense/index',  $data);

 }
public function create()
{
	$category = $this->db->readAll("categories");
	  $data = [
	   
	   'categories'  => $category,

	  ];
	$this->view('expense/create',$data);
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
    $qty=$_POST['qty'];
    $amount=$_POST['amount'];

    $this->model('ExpenseModel');

    $expense=new ExpenseModel();
    $expense->setCategory($category_id);
    $expense->setQty($qty);
    $expense->setAmount($amount);
    $expense->setDate(date('Y-m-d'));
    $expense->setUser($user_id);

    $added=$this->db->create('expenses',$expense->toArray());
    if($added)
    {
      setMessage('success','Successfully added');
    }


   }
   redirect('expense');
 }

public function edit($id)
{
  $id=base64_decode($id);

  $category=$this->db->readAll('categories');
  $expense=$this->db->getById('expenses',$id);
  $data=[
            'expenses'=>$expense,
            'category'=>$category,
  ];
  $this->view('expense/edit',$data);
}
  public function update()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
      {
        $id=$_POST['id'];
        $date=$_POST['date'];
        $user_id=$_POST['user_id'];
        $category_id=$_POST['category_id'];
        $qty=$_POST['qty'];
        $amount=$_POST['amount'];

        $this->model('ExpenseModel');

        $expense=new ExpenseModel;
        $expense->setId($id);
        $expense->setDate($date);
        $expense->setUser($user_id);
        $expense->setCategory($category_id);
        $expense->setQty($qty);
        $expense->setAmount($amount);

        $updated=$this->db->update('expenses',$expense->getId(),$expense->toArray());

        if($updated)
        {
          setMessage('success','Successfully Updated!');
        }
      }
      redirect('expense');
  }

  public function destory($id)
  {
    $id=base64_decode($id);
    $expense=$this->db->getById('expenses',$id);
    $this->model('ExpenseModel');
    $expense=new ExpenseModel;
    $expense->setId($id);

    $deleted=$this->db->delete('expenses',$id,$expense->toArray());
    if($deleted)
    {
      setMessage('success','Successfully deleted!');
    }
    redirect('expense');
  }

}
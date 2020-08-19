<?php
class Category extends Controller
{
 private $db;
 public function __construct()
 {
    $this->db        = new Database;
 }

 public function index()
 {
  $category = $this->db->readAll("categories");
  $data = [
   'title' => 'Category data',
   'categories'  => $category,
  ];
  
  
  $this->view('category/index',  $data);

 }
public function create()
{
	$type =  $this->db->readAll("types");
	  $data = [
	   
	   'name'  => $type,

	  ];

	$this->view('category/create',$data);
}
 
 public function store()
 {
   if($_SERVER['REQUEST_METHOD']=="POST")
   {

    $name=$_POST['name'];
    $type_id=$_POST['type_id'];
    $description=$_POST['description'];

    $this->model('CategoryModel');

    $category=new CategoryModel();
    $category->setName($name);
    $category->setType($type_id);
    $category->setDescription($description);

    $added=$this->db->create('categories',$category->toArray());
    if($added)
    {
      setMessage('success','Successfully added');
    }
   }
   redirect('category');
 }
    public function edit($id)
    {
      $id=base64_decode($id);
      $type=$this->db->readAll('types');
      $category=$this->db->getById('categories',$id);
      $data=[
        'category'=>$category,
        'type'    =>$type,
        
      ];
      $this->view('category/edit',$data);
    }

    public function update()
    {
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
      $id=$_POST['id'];
      $name=$_POST['name'];
      $type_id=$_POST['type_id'];
      $description=$_POST['description'];

      $this->model('CategoryModel');
      $category=new CategoryModel;
      $category->setId($id);
      $category->setName($name);
      $category->setType($type_id);
      $category->setDescription($description);

      $updated= $this->db->update('categories',$category->getId(),$category->toArray());

      if($updated)
            {
             setMessage('success',"Successfully Updated !");
            }
    }
    redirect('category');
  }

  public function destory($id)
  {
    $id=base64_decode($id);
    $category=$this->db->getById('categories',$id);

    $this->model('CategoryModel');
    $category=new CategoryModel;
    $category->setId($id);

    $deleted=$this->db->delete('categories',$id);

    if($deleted)
    {
      setMessage('success','Successfully Delete');
    }
    redirect('category');
  }

}
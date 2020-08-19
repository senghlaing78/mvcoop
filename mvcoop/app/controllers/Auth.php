<?php

class Auth extends Controller{

    private $db;
    private $auth;
    function __construct()
    {
        $this->model('UserModel');
        $this->db =new Database;
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $password=base64_encode($password);
            $profile_image='default_image.jpg';
            $token= bin2hex(random_bytes(50));

            $isUserExit=$this->db->columnFilter('users','email',$email);

            if($isUserExit)
            {
                setMessage('error','This email already exit!');
                redirect('page/login');
            }else
            {
                $user=new UserModel();
                $user->setName($name);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setToken($token);
                $user->setProfileImage($profile_image);
                $user->setIsActive(0);
                $user->setIsLogin(0);
                $user->setIsConfirmed(0);
                $user->setDate(date('Y-m-d'));

                $userCreated=$this->db->create('users',$user->toArray());

                if($userCreated)
                {
                    setMessage('success','Successfully registered');
                    redirect('page/login');
                }else
                {

                }
            }

        }
    }

    public function login()
    {
        $email=$_POST['email'];
        $password=base64_encode($_POST['password']);

        echo $email;
        echo $password;
        $success=$this->db->loginCheck($email,$password);

        if($success)
        {
            setMessage('id',base64_encode($success['id']));
            
            $this->db->setLogin($success['id']);
            redirect('page/dashboard');
            
        }else{
            setMessage('error','Authentication Fail. Please try again !');
            redirect('');
        }
    }

     public function logout()
        {   
            session_start();
            $this->db->unsetLogin(base64_decode($_SESSION['id']));
            
            redirect('');
        }

}

?>
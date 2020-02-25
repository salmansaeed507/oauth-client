<?php

class Auth
{
    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->library('session');
        $this->ci->load->helper('url');
    }
    
    public function require_login()
    {
        if (!$this->logged_in()) {
            redirect('login');
        }
    }

    public function logged_in()
    {
        if ($this->ci->session->has_userdata('logged_in') && $this->ci->session->userdata('logged_in')==1) {
            return true;
        }
        return false;
    }

    public function do_login($username,$password)
    {
        $user = $this->ci->db->query("SELECT * FROM users WHERE username='$username' AND password='".md5($password)."' ")->row();
        var_dump($user);
        if ($user) {
            $this->ci->session->set_userdata('logged_in',1);
            $this->ci->session->set_userdata('user',$user);
            redirect('main');
        } else {
            $this->ci->session->set_flashdata('error', 'Invalid username/password');
            redirect('login');
        }
    }

    public function error()
    {
        return $this->ci->session->flashdata('error');
    }
}

function Auth()
{
    return new Auth;
}
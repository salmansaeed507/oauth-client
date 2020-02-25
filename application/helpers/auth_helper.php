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
        if ($this->ci->session->has_userdata('logged_in') && $this->ci->session->get_userdata('logged_in')==1) {
            return true;
        }
        return false;
    }

    public function do_login($username,$password)
    {
        if ($this->logged_in()) {
            redirect('/');
        }
        redirect('/');
    }
}

function Auth()
{
    return new Auth;
}
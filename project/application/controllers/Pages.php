<?php
class Pages extends CI_Controller{
    public function view($page = 'overview')
    {
        if (! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            //NOT FOUND
            show_404();
        }
        $data['title'] = ucfirst($page);
        
        $this->load->helper('url');
        $this->load->view('templates/header',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer',$data);
    }
    public function index()
    {
        if (! file_exists(APPPATH.'/views/pages/overview.php'))
        {
            //NOT FOUND
            show_404();
        }
        $data['title'] = ucfirst('overview');
        
        $this->load->helper('url');
        $this->load->view('templates/header',$data);
        $this->load->view('pages/overview.php',$data);
        $this->load->view('templates/footer',$data);
    }
}
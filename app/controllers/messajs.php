<?php
class MessajsController extends StudipController
{
    public function before_filter(&$action, &$args)
    {
        parent::before_filter($action, $args);

        if (!Request::isXhr()) {
            $this->set_layout($GLOBALS['template_factory']->open('layouts/base'));
        }
    }
    
    public function index_action()
    {
    }
    
    public function spawn_action()
    {
        $type = Request::option('type');
        $text = Request::get('text');
        $details = Request::int('details') ? array('foo', 'bar') : array();
        
        $message = call_user_func_array('MessageBox::' . $type, array($text, $details));
        PageLayout::postMessage($message);

        $this->redirect('messajs/index');
    }
    
    public function after_filter($action, $args)
    {
        $response = $this->get_response();
        if (Request::isXhr() && !isset($response->headers['Location'])) {
            $response->add_header('X-STUDIP-Messages', json_encode(PageLayout::getMessages()));
        }
        
        parent::after_filter($action, $args);
    }
}
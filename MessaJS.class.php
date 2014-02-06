<?php
class MessaJS extends StudIPPlugin implements SystemPlugin
{
    public function __construct()
    {
        parent::__construct();

        PageLayout::addScript($this->getPluginURL() . '/vendor/noty/js/noty/jquery.noty.js');
        PageLayout::addScript($this->getPluginURL() . '/assets/noty-studip-layout.js');
        PageLayout::addScript($this->getPluginURL() . '/assets/noty-studip-theme.js');
        PageLayout::addScript($this->getPluginURL() . '/assets/messa.js');
        $this->addStylesheet('assets/messa.less');
        
        $navigation = new Navigation('MessaJS');
        $navigation->setURL(PluginEngine::getLink($this, array(), 'show'));
        $navigation->setImage(Assets::image_path('blank.gif'));
        Navigation::addItem('/messajs', $navigation);
    }
    
    public function show_action()
    {
        $factory  = new Flexi_TemplateFactory($this->getPluginPath().'/templates');
        $template = $factory->open('show');
        if (!Request::isXhr()) {
            $template->set_layout($GLOBALS['template_factory']->open('layouts/base'));
        }
        $template->link = PluginEngine::getLink($this, array(), 'spawn');
        echo $template->render();
    }
    
    public function spawn_action()
    {
        $type = Request::option('type');
        $text = Request::get('text');
        $details = Request::int('details') ? array('foo', 'bar') : array();
        
        $message = call_user_func_array('MessageBox::' . $type, array($text, $details));
        PageLayout::postMessage($message);
        
        header('Location: ' . PluginEngine::getLink($this, array(), 'show'));
    }
}


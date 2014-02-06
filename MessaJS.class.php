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
        PageLayout::postMessage(MessageBox::success('Success!'));
        PageLayout::postMessage(MessageBox::info('Info!'));
        PageLayout::postMessage(MessageBox::error('Error!'));
        PageLayout::postMessage(MessageBox::exception('Exception!'));
        
        $factory  = new Flexi_TemplateFactory($this->getPluginPath().'/templates');
        $template = $factory->open('show');
        $template->set_layout($GLOBALS['template_factory']->open('layouts/base'));
        echo $template->render();
    }
}


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
        $navigation->setURL(PluginEngine::getLink($this, array(), 'messajs/index'));
        $navigation->setImage(Assets::image_path('blank.gif'));
        Navigation::addItem('/messajs', $navigation);
    }
    
    public function perform($unconsumed_path)
    {
        require_once 'vendor/trails/trails.php';
        require_once 'app/controllers/studip_controller.php';
        
        $dispatcher = new Trails_Dispatcher(
            $this->getPluginPath() . DIRECTORY_SEPARATOR . 'app',
            rtrim(PluginEngine::getLink($this, array(), '/', true), '/'),
            'messajs'
        );
        $dispatcher->plugin = $this;
        $dispatcher->dispatch($unconsumed_path);
    }
}


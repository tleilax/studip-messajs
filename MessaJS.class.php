<?php
class MessaJS extends StudIPPlugin implements SystemPlugin
{
    public function __construct()
    {
        parent::__construct();

        PageLayout::addScript($this->getPluginURL() . '/vendor/noty/js/noty/jquery.noty.js');
        PageLayout::addScript($this->getPluginURL() . '/noty-studip-layout.js');
        PageLayout::addScript($this->getPluginURL() . '/noty-studip-theme.js');
        PageLayout::addScript($this->getPluginURL() . '/messa.js');
        $this->addStylesheet('messa.less');
    }
}


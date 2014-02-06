<?php
class MessaJS extends StudIPPlugin implements SystemPlugin
{
    public function __construct()
    {
        parent::__construct();

        PageLayout::addScript($this->getPluginURL() . '/vendor/noty/js/noty/packaged/jquery.noty.packaged.js');
        PageLayout::addScript($this->getPluginURL() . '/messa.js');
    }
}


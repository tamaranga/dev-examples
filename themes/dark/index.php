<?php

class Theme_Dark extends Theme
{
    public function init()
    {
        $this->setParentTheme('platform');

        parent::init();

        $this->setSettings([
            'theme_title'   => 'Dark',
            'theme_version' => '1.0.0',
            'extension_id'  => 't01c896ce2aadb65d195d0ae15d2cc89904e73d6',
        ]);

        $this->configSettings();
    }

    protected function start()
    {
        $this->css('/css/dark.css', ['rtl' => true]);
    }
}

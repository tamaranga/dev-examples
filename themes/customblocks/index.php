<?php

class Theme_CustomBlocks extends Theme
{
    public function init()
    {
        $this->setParentTheme('platform');

        parent::init();

        $this->configSettings();

        $this->setSettings([
            'theme_title'   => 'Custom Blocks',
            'theme_version' => '1.0.0',
            'extension_id'  => 't01c896ce2aadb65d195d0ae15d2cc89904e73d7',
        ]);
    }

    protected function start()
    {
        $this->css('/css/customblocks.css');
        $this->css('/css/benefits.css');
        $this->css('/css/categories.css');
        $this->css('/css/ads-page.css');

        $this->routeAdd('example-ads-page', [
            'pattern'  => '/examples/ads/',
            'callback' => \themes\customblocks\views\AdsPage::class,
        ]);

        $this->routeAdd('example-auto-page', [
            'pattern'  => '/examples/auto/',
            'callback' => \themes\customblocks\views\AutoExamplesPage::class,
        ]);

        $this->menu('footer')
            ->add('auto.examples', $this->lang('Auto Examples'))
            ->after('services')->after('business')->after('blog')
            ->route('example-auto-page');
    }
}

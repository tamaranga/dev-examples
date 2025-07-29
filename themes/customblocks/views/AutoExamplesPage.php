<?php

namespace themes\customblocks\views;

use bff\view\Page;

/**
 * @property \Theme_CustomBlocks $extension
 * @copyright Tamaranga
 */
class AutoExamplesPage extends Page
{
    public function init()
    {
        parent::init();

        $this->extension = $this->app->theme();

        $this->setTemplate('tpl/auto.examples.page', $this->extension);
        $this->setKey('auto.examples.page');
        $this->setTitle($this->extension->langAdmin('Auto Examples'));
        $this->withSeoSettings('auto_examples', 'site')->breadcrumb()->titleH1()->seotext();
        $this->titleh1 = $this->extension->langAdmin('Auto Examples');
        $this->useBreadcrumbs();
    }

    public function data()
    {
        $data = parent::data();

        $this->breadcrumbs->add($this->titleh1);

        return $data;
    }

    public function blocks()
    {
        $this->addBlock('benefits1Block', Benefits1Block::class);
        $this->addBlock('benefits2Block', Benefits2Block::class);
        $this->addBlock('autoCategoriesBlock', AutoCategoriesBlock::class);
    }

    public function seo()
    {
        $this->seoApply();
    }
}
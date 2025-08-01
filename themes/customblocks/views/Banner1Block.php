<?php

namespace themes\customblocks\views;

use bff\view\Block;
use Url;
use Site;

/**
 * @property \Theme_CustomBlocks $extension
 * @copyright Tamaranga
 */
class Banner1Block extends Block
{
    /** @var bool Is banner enabled */
    public $banner_enabled = true;

    /** @var string Banner text */
    public $banner_text = '';

    /** @var string Banner background color */
    public $banner_background = '#6366f1';

    /** @var string Banner text color */
    public $banner_text_color = '#ffffff';

    /** @var bool Is button enabled */
    public $button_enabled = true;

    /** @var string Button text */
    public $button_text = '';

    /** @var string Button URL */
    public $button_url = '';

    /** @var string Button background color */
    public $button_background = '#f97316';

    /** @var string Button text color */
    public $button_text_color = '#ffffff';

    public function init()
    {
        parent::init();

        $this->setTemplate('tpl/banner1', $this->extension);
        $this->setKey('banner2');
        $this->setTitle($this->extension->langAdmin('Banner 1'));
    }

    public function data()
    {
        $data = parent::data();

        // Process macros for button URL
        if (!empty($this->button_url)) {
            $macros = $this->macros();
            $data['button_url'] = strtr($this->button_url, $macros);
        }

        return $data;
    }

    public function settingsForm($form)
    {
        // Main banner settings
        $form
            ->checkbox('banner_enabled', $this->extension->langAdmin('Enabled'), true)
            ->boundaryInit(['title' => $this->extension->langAdmin('Banner Settings')])
            ->text('banner_text', $this->extension->langAdmin('Banner Text'), [
                'en' => 'Exclusive offers are waiting for you!',
                'ru' => 'Эксклюзивные предложения ждут вас!'
            ])
            ->boundaryIn('banner_enabled')
            ->visibleIf('banner_enabled', true)
            ->color('banner_background', $this->extension->langAdmin('Background Color'), '#6366f1')
            ->boundaryIn('banner_enabled')
            ->visibleIf('banner_enabled', true)
            ->color('banner_text_color', $this->extension->langAdmin('Text Color'), '#ffffff')
            ->boundaryIn('banner_enabled')
            ->visibleIf('banner_enabled', true);

        // Button settings
        $form
            ->checkbox('button_enabled', $this->extension->langAdmin('Enabled'), true)
            ->boundaryInit(['title' => $this->extension->langAdmin('Button Settings')])
            ->boundaryIn('banner_enabled')
            ->visibleIf('banner_enabled', true)
            ->text('button_text', $this->extension->langAdmin('Button Text'), [
                'en' => 'Learn More',
                'ru' => 'Узнать больше'
            ])
            ->boundaryIn('button_enabled')
            ->visibleIf('button_enabled', true)
            ->text('button_url', $this->extension->langAdmin('Button URL'), [
                'en' => '/',
                'ru' => '/'
            ], true)
            ->titleMacros($this->macros())
            ->onValue(function ($value) {
                if (!is_array($value)) {
                    $original = $value;
                    $value = [];
                    foreach ($this->locale->getLanguages() as $l) {
                        $value[$l] = $original;
                    }
                }
                if (empty(join('', $value))) {
                    foreach ($this->locale->getLanguages() as $l) {
                        $value[$l] = '#';
                    }
                }
                return $value;
            })
            ->boundaryIn('button_enabled')
            ->visibleIf('button_enabled', true)
            ->color('button_background', $this->extension->langAdmin('Button Background'), '#f97316')
            ->boundaryIn('button_enabled')
            ->visibleIf('button_enabled', true)
            ->color('button_text_color', $this->extension->langAdmin('Button Text Color'), '#ffffff')
            ->boundaryIn('button_enabled')
            ->visibleIf('button_enabled', true);
    }

    /**
     * Macros for link substitution
     */
    public function macros()
    {
        return [
            Site::MENU_MACROS_SITEURL => Url::to('/', ['lang' => false]),
            Url::HOST_PLACEHOLDER => SITEHOST,
        ];
    }
}
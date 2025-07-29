<?php

namespace themes\customblocks\views;

use bff\view\Block;

/**
 * @property \Theme_CustomBlocks $extension
 * @copyright Tamaranga
 */
class Benefits1Block extends Block
{
    /** @var string Block title */
    public $title = '';

    /** @var string Title icon */
    public $title_icon = '';

    /** @var string Block background color */
    public $icons_color = '#f15833';

    /** @var array List of benefits */
    public $benefits = [];

    public function data()
    {
        $data = parent::data();

        // Check if there is content to display
        $hasContent = false;

        // Check title
        if (!empty($this->title)) {
            $hasContent = true;
        }

        // Check benefits
        $validBenefits = 0;
        foreach ($this->benefits as $benefit) {
            if (!empty($benefit['title']) || !empty($benefit['description'])) {
                $validBenefits++;
            }
        }

        if ($validBenefits > 0) {
            $hasContent = true;
        }

        // If no content, don't show block
        if (!$hasContent) {
            return false;
        }

        return $data;
    }

    public function settingsForm($form)
    {
        // Main block title
        $form->text('title', $this->extension->langAdmin('Block Title'), [
            'en' => 'Why you should search with us',
            'ru' => 'Почему стоит искать автомобиль именно у нас'
        ])->images('title_icon', $this->extension->langAdmin('Title Icon'), 1)->preload($this->extension->path('/static/img/like-icon.svg'));
        $form->color('icons_color', $this->extension->langAdmin('Icons Color'), '#FFA500');

        // Benefits group
        $form->group('benefits', $this->extension->langAdmin('Add Benefit'), $this->extension->langAdmin('Benefits List'), ['plus' => ['type' => 'href', 'position' => 'after']])

            // Benefit icon
            ->images('icon', $this->extension->langAdmin('Benefit Icon'), 1)

            // Benefit title
            ->text('title', $this->extension->langAdmin('Benefit Title'))->placeholder($this->extension->langAdmin('Enter benefit title'))

            // Benefit description
            ->wysiwyg('description', $this->extension->langAdmin('Benefit Description'))->placeholder($this->extension->langAdmin('Enter benefit description'))

            // Preset benefits
            ->preload([
                'icon' => $this->extension->path('/static/img/benefits/car.svg'),
                'title' => [
                    'en' => 'Unique automobiles',
                    'ru' => 'Уникальные автомобили',
                ],
                'description' => [
                    'en' => 'On other boards, ad placement is paid, so dealers post only a small number of cars there, and a significant part of the profitable offers remains in the shadows.',
                    'ru' => 'На других досках размещение объявлений платное, поэтому дилеры выкладывают туда лишь небольшое количество автомобилей, а значительная часть выгодных предложений остается в тени.',
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/benefits/shield.svg'),
                'title' => [
                    'en' => 'Secure car purchase',
                    'ru' => 'Безопасная покупка авто',
                ],
                'description' => [
                    'en' => 'Unlike private car dealers, dealerships worry about their reputation, so before buying they carefully check the technical condition and legal purity of the car.',
                    'ru' => 'В отличие от частников автодилеры беспокоятся за свою репутацию, поэтому перед выкупом они тщательно проверяют техническое состояние и юридическую чистоту автомобиля.',
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/benefits/star.svg'),
                'title' => [
                    'en' => 'Quality guarantee',
                    'ru' => 'Гарантия качества',
                ],
                'description' => [
                    'en' => 'If after purchase you find problems with the car, you can demand from the dealer to reduce the purchase price, eliminate defects for free or even replace the car with an equivalent one.',
                    'ru' => 'Если после покупки вы обнаружите у автомобиля проблемы, то сможете потребовать от дилера уменьшить покупную цену, бесплатно устранить недостатки или даже заменить автомобиль на аналогичный.',
                ]
            ])
            ->endGroup();
    }

    public function init()
    {
        parent::init();

        $this->setTemplate('tpl/benefits1.block', $this->extension);
        $this->setKey('benefits.block.1');
        $this->setTitle($this->extension->langAdmin('Benefits 1 Block'));
    }
}
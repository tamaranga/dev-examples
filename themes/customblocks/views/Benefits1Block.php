<?php

namespace themes\customblocks\views;

use bff\view\Block;

/**
 * @property \Theme_CustomBlocks $extension
 * @copyright Tamaranga
 */
class Benefits1Block extends Block
{
    /** @var string Заголовок блока */
    public $title = '';

    /** @var string Иконка заголовка */
    public $title_icon = '';

    /** @var string Цвет фона блока */
    public $icons_color = '#f15833';

    /** @var array Список преимуществ */
    public $benefits = [];

    public function data()
    {
        $data = parent::data();

        // Проверяем есть ли контент для отображения
        $hasContent = false;

        // Проверяем заголовок
        if (!empty($this->title)) {
            $hasContent = true;
        }

        // Проверяем преимущества
        $validBenefits = 0;
        foreach ($this->benefits as $benefit) {
            if (!empty($benefit['title']) || !empty($benefit['description'])) {
                $validBenefits++;
            }
        }

        if ($validBenefits > 0) {
            $hasContent = true;
        }

        // Если нет контента, не показываем блок
        if (!$hasContent) {
            return false;
        }

        return $data;
    }

    public function settingsForm($form)
    {
        // Основной заголовок блока
        $form->text('title', $this->extension->langAdmin('Block Title'), [
            'en' => 'Why you should search with us',
            'ru' => 'Почему стоит искать автомобиль именно у нас'
        ])->images('title_icon', $this->extension->langAdmin('Title Icon'), 1)->preload($this->extension->path('/static/img/like-icon.svg'));
        $form->color('icons_color', $this->extension->langAdmin('Icons Color'), '#FFA500');

        // Группа преимуществ
        $form->group('benefits', $this->extension->langAdmin('Add Benefit'), $this->extension->langAdmin('Benefits List'), ['plus' => ['type' => 'href', 'position' => 'after']])

            // Иконка преимущества
            ->images('icon', $this->extension->langAdmin('Benefit Icon'), 1)

            // Заголовок преимущества
            ->text('title', $this->extension->langAdmin('Benefit Title'))->placeholder($this->extension->langAdmin('Enter benefit title'))

            // Описание преимущества
            ->wysiwyg('description', $this->extension->langAdmin('Benefit Description'))->placeholder($this->extension->langAdmin('Enter benefit description'))

            // Предустановленные преимущества
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
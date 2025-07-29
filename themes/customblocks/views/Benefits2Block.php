<?php

namespace themes\customblocks\views;

use bff\view\Block;

/**
 * @property \Theme_CustomBlocks $extension
 * @copyright Tamaranga
 */
class Benefits2Block extends Block
{
    /** @var string Изображение левого блока */
    public $main_image = '';

    /** @var string Описание под изображением */
    public $description = '';

    /** @var string Цвет фона блока */
    public $background_color = '#FFA500';

    /** @var array Список преимуществ */
    public $benefits = [];

    public function data()
    {
        $data = parent::data();

        // Проверяем есть ли контент для отображения
        $hasContent = false;

        // Проверяем изображение или описание
        if (!empty($this->main_image) || !empty($this->description)) {
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
        // Настройки левого блока
        $form->wysiwyg('description', $this->extension->langAdmin('Description'), [
            'en' => '<strong>Special machinery</strong> — <br> search for sellers of special equipment, trucks and spare parts',
            'ru' => '<strong>Special machinery</strong> — <br> поиск продавцов спецтехники, грузовиков и запчастей'
        ])->placeholder($this->extension->langAdmin('Enter description text'));

        $form->images('main_image', $this->extension->langAdmin('Main Image'), 1)->preload($this->extension->path('/static/img/ekskavator.png'));

        $form->color('background_color', $this->extension->langAdmin('Background Color'), '#FFA500');

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
                'icon' => $this->extension->path('/static/img/benefits/star.svg'),
                'title' => [
                    'en' => 'We guarantee the equipment',
                    'ru' => 'Даем гарантию на технику',
                ],
                'description' => [
                    'en' => 'If after purchase you find problems with the car, you can demand from the dealer to reduce the purchase price, eliminate defects for free or even replace the car with an equivalent one.',
                    'ru' => 'Если после покупки вы обнаружите у автомобиля проблемы, то сможете потребовать от дилера уменьшить покупную цену, бесплатно устранить недостатки или даже заменить автомобиль на аналогичный.',
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/benefits/shield.svg'),
                'title' => [
                    'en' => 'Secure purchase',
                    'ru' => 'Безопасная покупка',
                ],
                'description' => [
                    'en' => 'Unlike private car dealers, dealerships worry about their reputation, so before buying they carefully check the technical condition and legal purity of the car.',
                    'ru' => 'В отличие от частников автодилеры беспокоятся за свою репутацию, поэтому перед выкупом они тщательно проверяют техническое состояние и юридическую чистоту автомобиля.',
                ]
            ])
            ->endGroup();
    }

    public function init()
    {
        parent::init();

        $this->setTemplate('tpl/benefits2.block', $this->extension);
        $this->setKey('benefits.block.2');
        $this->setTitle($this->extension->langAdmin('Benefits 2 Block'));
    }
}
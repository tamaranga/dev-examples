<?php

namespace themes\customblocks\views;

use bff\view\Block;

/**
 * @property \Theme_CustomBlocks $extension
 * @copyright Tamaranga
 */
class AutoCategoriesBlock extends Block
{
    /** @var bool Включен ли блок */
    public $block_enabled = true;

    /** @var string URL основного изображения */
    public $main_image = '';

    /** @var array Список секций категорий */
    public $sections = [];

    public function init()
    {
        parent::init();

        $this->setTemplate('tpl/auto.categories.block', $this->extension);
        $this->setKey('auto.categories.block.1');
        $this->setTitle($this->extension->langAdmin('Auto Categories'));
    }

    public function data()
    {
        $data = parent::data();

        // Проверяем есть ли контент для отображения
        $hasContent = false;

        // Проверяем основное изображение
        if (!empty($this->main_image)) {
            $hasContent = true;
        }

        // Проверяем секции категорий
        $validSections = 0;
        foreach ($this->sections as $section) {
            if (!empty($section['title'])) {
                $validSections++;
            }
        }

        if ($validSections > 0) {
            $hasContent = true;
        }

        // Если нет контента или блок отключен, не показываем
        if (!$this->block_enabled || !$hasContent) {
            return false;
        }

        return $data;
    }

    public function settingsForm($form)
    {
        // Основные настройки блока
        $form
            ->checkbox('block_enabled', _t('@', 'Enabled'), true)
            ->boundaryInit(['title' => _t('@site', 'Categories with Img Block')]);

        // Основное изображение
        $form
            ->images('main_image', _t('@site', 'Main Image'), 1)
            ->preload($this->extension->path('/static/img/mini-orange.png'))
            ->boundaryIn('block_enabled')
            ->visibleIf('block_enabled', true);

        // Секции категорий
        $form
            ->group(
                'sections',
                _t('@', 'Add Category'),
                _t('@site', 'Categories'),
                ['plus' => ['type' => 'href', 'position' => 'after']]
            )
            ->boundaryIn('block_enabled')
            ->visibleIf('block_enabled', true)

            // Иконка категории
            ->images('icon', _t('@site', 'Category Icon'), 1)
            // Название категории
            ->text('title', _t('@', 'Category Title'))
            ->placeholder(_t('@site', 'Enter category name'))

            // Ссылка категории
            ->text('link', _t('@site', 'Category Link'))
            ->placeholder(_t('@site', 'Enter category URL'))

            // Предустановленные категории
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/car.svg'),
                'title' => [
                    'en' => 'Cars',
                    'ru' => 'Автомобили',
                ],
                'link' => [
                    'en' => '/categories/cars',
                    'ru' => '/categories/cars'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/boat.svg'),
                'title' => [
                    'en' => 'Water Transport',
                    'ru' => 'Водный транспорт',
                ],
                'link' => [
                    'en' => '/categories/water-transport',
                    'ru' => '/categories/water-transport'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/motorcycle.svg'),
                'title' => [
                    'en' => 'Motorcycles',
                    'ru' => 'Мотоциклы',
                ],
                'link' => [
                    'en' => '/categories/motorcycles',
                    'ru' => '/categories/motorcycles'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/truck.svg'),
                'title' => [
                    'en' => 'Trucks',
                    'ru' => 'Грузовики',
                ],
                'link' => [
                    'en' => '/categories/trucks',
                    'ru' => '/categories/trucks'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/spare-parts.svg'),
                'title' => [
                    'en' => 'Spare Parts',
                    'ru' => 'Запчасти',
                ],
                'link' => [
                    'en' => '/categories/parts',
                    'ru' => '/categories/parts'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/excavator.svg'),
                'title' => [
                    'en' => 'Special Equipment',
                    'ru' => 'Спецтехника',
                ],
                'link' => [
                    'en' => '/categories/special-equipment',
                    'ru' => '/categories/special-equipment'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/accessories.svg'),
                'title' => [
                    'en' => 'Accessories',
                    'ru' => 'Аксессуары',
                ],
                'link' => [
                    'en' => '/categories/accessories',
                    'ru' => '/categories/accessories'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/tuning.svg'),
                'title' => [
                    'en' => 'Tuning',
                    'ru' => 'Тюнинг',
                ],
                'link' => [
                    'en' => '/categories/tuning',
                    'ru' => '/categories/tuning'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/autochemistry.svg'),
                'title' => [
                    'en' => 'Auto Cosmetics',
                    'ru' => 'Автокосметика',
                ],
                'link' => [
                    'en' => '/categories/autochemistry',
                    'ru' => '/categories/autochemistry'
                ]
            ])
            ->preload([
                'icon' => $this->extension->path('/static/img/categories/car-seats.svg'),
                'title' => [
                    'en' => 'Car Seats',
                    'ru' => 'Автокресла',
                ],
                'link' => [
                    'en' => '/categories/car-seats',
                    'ru' => '/categories/car-seats'
                ]
            ])
            ->endGroup();
    }
}

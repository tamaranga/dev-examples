<?php

namespace themes\customblocks\views;

use bff\view\Block;
use Url;
use Site;

/**
 * @property \Theme_CustomBlocks $extension
 * @copyright Tamaranga
 */
class CategoriesBlock extends Block
{
    /** @var string Общий логотип блока */
    public $block_logo = '';

    /** @var bool Включен левый блок категорий */
    public $left_enabled = true;
    /** @var string Заголовок левого блока */
    public $left_title = '';
    /** @var array Ссылки левого блока */
    public $left_links = [];

    /** @var bool Включен правый блок категорий */
    public $right_enabled = true;
    /** @var string Заголовок правого блока */
    public $right_title = '';
    /** @var array Ссылки правого блока */
    public $right_links = [];

    /** @var bool Включен нижний блок */
    public $bottom_enabled = true;
    /** @var string Заголовок нижнего блока */
    public $bottom_title = '';
    /** @var array Ссылки нижнего блока */
    public $bottom_links = [];

    public function init()
    {
        parent::init();
        $this->setTemplate('tpl/categories.block', $this->extension);
        $this->setKey('categories.block.25');
        $this->setTitle($this->extension->langAdmin('Custom Categories Block'));
    }

    public function data()
    {
        $data = parent::data();

        // Обработка макросов для всех ссылок
        $macros = $this->macros();

        if ($this->left_enabled && !empty($this->left_links)) {
            foreach ($this->left_links as &$link) {
                $link['link'] = strtr($link['link'], $macros);
            }
            unset($link);
        }

        if ($this->right_enabled && !empty($this->right_links)) {
            foreach ($this->right_links as &$link) {
                $link['link'] = strtr($link['link'], $macros);
            }
            unset($link);
        }

        if ($this->bottom_enabled && !empty($this->bottom_links)) {
            foreach ($this->bottom_links as &$link) {
                $link['link'] = strtr($link['link'], $macros);
            }
            unset($link);
        }

        return $data;
    }

    public function settingsForm($form)
    {
        // Общие настройки блока
        $form->images('block_logo', $this->extension->langAdmin('Block Logo'), 1)->boundaryInit(['title' => $this->extension->langAdmin('General Settings')]);

        // Левый блок категорий
        $form->checkbox('left_enabled', $this->extension->langAdmin('Enabled'), true)->boundaryInit(['title' => $this->extension->langAdmin('Left Category Block')]);

        $form->text('left_title', $this->extension->langAdmin('Title'), [
            'en' => 'Electronics',
            'ru' => 'Электроника'
        ])->boundaryIn('left_enabled')->visibleIf('left_enabled', true);

        $form->group('left_links', '', $this->extension->langAdmin('Links'))
            ->text('title', $this->extension->langAdmin('Title'))
            ->text('link', $this->extension->langAdmin('Link'))
            ->titleMacros($this->macros())

            // Предустановленные ссылки для левого блока
            ->preload([
                'title' => [
                    'en' => 'Smartphones',
                    'ru' => 'Смартфоны'
                ],
                'link' => [
                    'en' => '/categories/smartphones',
                    'ru' => '/categories/smartphones'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Laptops',
                    'ru' => 'Ноутбуки'
                ],
                'link' => [
                    'en' => '/categories/laptops',
                    'ru' => '/categories/laptops'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Tablets',
                    'ru' => 'Планшеты'
                ],
                'link' => [
                    'en' => '/categories/tablets',
                    'ru' => '/categories/tablets'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Headphones',
                    'ru' => 'Наушники'
                ],
                'link' => [
                    'en' => '/categories/headphones',
                    'ru' => '/categories/headphones'
                ]
            ])
            ->endGroup()
            ->boundaryIn('left_enabled')
            ->visibleIf('left_enabled', true);

        // Правый блок категорий
        $form->checkbox('right_enabled', $this->extension->langAdmin('Enabled'), true)->boundaryInit(['title' => $this->extension->langAdmin('Right Category Block')]);

        $form->text('right_title', $this->extension->langAdmin('Title'), [
            'en' => 'Household',
            'ru' => 'Домашняя техника'
        ])->boundaryIn('right_enabled')->visibleIf('right_enabled', true);

        $form->group('right_links', '', $this->extension->langAdmin('Links'))
            ->text('title', $this->extension->langAdmin('Title'))
            ->text('link', $this->extension->langAdmin('Link'))
            ->titleMacros($this->macros())

            // Предустановленные ссылки для правого блока
            ->preload([
                'title' => [
                    'en' => 'Refrigerators',
                    'ru' => 'Холодильники'
                ],
                'link' => [
                    'en' => '/categories/refrigerators',
                    'ru' => '/categories/refrigerators'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Washing Machines',
                    'ru' => 'Стиральные машины'
                ],
                'link' => [
                    'en' => '/categories/washing-machines',
                    'ru' => '/categories/washing-machines'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Vacuum Cleaners',
                    'ru' => 'Пылесосы'
                ],
                'link' => [
                    'en' => '/categories/vacuum-cleaners',
                    'ru' => '/categories/vacuum-cleaners'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Microwaves',
                    'ru' => 'Микроволновки'
                ],
                'link' => [
                    'en' => '/categories/microwaves',
                    'ru' => '/categories/microwaves'
                ]
            ])
            ->endGroup()
            ->boundaryIn('right_enabled')
            ->visibleIf('right_enabled', true);

        // Нижний блок
        $form->checkbox('bottom_enabled', $this->extension->langAdmin('Enabled'), true)->boundaryInit(['title' => $this->extension->langAdmin('Bottom Suggestions Block')]);

        $form->text('bottom_title', $this->extension->langAdmin('Title'), [
            'en' => 'You might be looking for:',
            'ru' => 'Возможно, вы ищете:'
        ])->boundaryIn('bottom_enabled')->visibleIf('bottom_enabled', true);

        $form->group('bottom_links', '', $this->extension->langAdmin('Links'))
            ->text('title', $this->extension->langAdmin('Title'))
            ->text('link', $this->extension->langAdmin('Link'))
            ->titleMacros($this->macros())

            // Предустановленные ссылки для нижнего блока
            ->preload([
                'title' => [
                    'en' => 'Cycling',
                    'ru' => 'Велосипеды'
                ],
                'link' => [
                    'en' => '/categories/cycling',
                    'ru' => '/categories/cycling'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Athletics and Fitness',
                    'ru' => 'Спорт и фитнес'
                ],
                'link' => [
                    'en' => '/categories/athletics-fitness',
                    'ru' => '/categories/athletics-fitness'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Fashion',
                    'ru' => 'Мода'
                ],
                'link' => [
                    'en' => '/categories/fashion',
                    'ru' => '/categories/fashion'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Books',
                    'ru' => 'Книги'
                ],
                'link' => [
                    'en' => '/categories/books',
                    'ru' => '/categories/books'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Gaming',
                    'ru' => 'Игры'
                ],
                'link' => [
                    'en' => '/categories/gaming',
                    'ru' => '/categories/gaming'
                ]
            ])
            ->preload([
                'title' => [
                    'en' => 'Music Instruments',
                    'ru' => 'Музыкальные инструменты'
                ],
                'link' => [
                    'en' => '/categories/music-instruments',
                    'ru' => '/categories/music-instruments'
                ]
            ])
            ->endGroup()
            ->boundaryIn('bottom_enabled')
            ->visibleIf('bottom_enabled', true);
    }

    /**
     * Макросы для подстановки в ссылки
     */
    public function macros()
    {
        return [
            Site::MENU_MACROS_SITEURL => Url::to('/', ['lang' => false]),
            Url::HOST_PLACEHOLDER => SITEHOST,
        ];
    }
}

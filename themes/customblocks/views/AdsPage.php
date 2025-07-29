<?php

namespace themes\customblocks\views;

use bff\view\Page;
use Url;
use Site;

/**
 * @property \Theme_CustomBlocks $extension
 * @copyright Tamaranga
 */
class AdsPage extends Page
{
    /** @var string Horizontal banner */
    public $horizontal_banner = '';

    /** @var string URL for horizontal banner */
    public $horizontal_banner_url = '';

    /** @var string Vertical banner */
    public $vertical_banner = '';

    /** @var string URL for vertical banner */
    public $vertical_banner_url = '';

    /** @var string Article content */
    public $article_content = '';

    public function init()
    {
        parent::init();

        $this->extension = $this->app->theme();

        $this->setTemplate('tpl/ads.page', $this->extension);
        $this->setKey('ads.page');
        $this->setTitle($this->extension->langAdmin('Ads'));
        $this->withSeoSettings('ads', 'site')->breadcrumb()->titleH1()->seotext();
        $this->titleh1 = $this->extension->langAdmin('Ads');
        $this->useBreadcrumbs();
    }

    public function data()
    {
        $data = parent::data();

        $this->breadcrumbs->add($this->titleh1);

        // Process macros for banner URLs
        $macros = $this->macros();

        if (!empty($this->horizontal_banner_url)) {
            $data['horizontal_banner_url'] = strtr($this->horizontal_banner_url, $macros);
        }

        if (!empty($this->vertical_banner_url)) {
            $data['vertical_banner_url'] = strtr($this->vertical_banner_url, $macros);
        }

        return $data;
    }

    public function blocks()
    {
        $this->addBlock('banner1', Banner1Block::class);
        $this->addBlock('categoriesBlock', CategoriesBlock::class);
    }

    public function seo()
    {
        $this->seoApply();
    }

    public function settingsForm($form)
    {
        // Horizontal banner settings
        $form
            ->images('horizontal_banner', $this->extension->langAdmin('Horizontal Banner'), 1)
            ->preload($this->extension->path('/static/img/banners/list-en.svg'))
            ->boundaryInit(['title' => $this->extension->langAdmin('Horizontal Banner Settings')])
            ->text('horizontal_banner_url', $this->extension->langAdmin('Horizontal Banner URL'), [
                'en' => '/',
                'ru' => '/'
            ], true)
            ->titleMacros($this->macros())
            ->placeholder($this->extension->langAdmin('Enter banner URL'));

        // Vertical banner settings
        $form
            ->images('vertical_banner', $this->extension->langAdmin('Vertical Banner'), 1)
            ->preload($this->extension->path('/static/img/banners/aside-en.svg'))
            ->boundaryInit(['title' => $this->extension->langAdmin('Vertical Banner Settings')])
            ->text('vertical_banner_url', $this->extension->langAdmin('Vertical Banner URL'), [
                'en' => '/',
                'ru' => '/'
            ], true)
            ->titleMacros($this->macros())
            ->placeholder($this->extension->langAdmin('Enter banner URL'));

        // Article content settings
        $form
            ->wysiwyg('article_content', $this->extension->langAdmin('Article Content'), [
                'en' => '<strong>Advertise Smarter with Marketplace Platform – Reach Your Ideal Audience Today!</strong>

<p>Marketplace Platform isn\'t just a marketplace — it\'s a powerful advertising space designed to help your brand grow. Whether you\'re launching a product, promoting a service, or increasing your brand visibility, our platform gives you the tools to connect directly with your target audience.</p>

<p>We offer flexible and effective advertising options: upload eye-catching banners, showcase rich media, or insert your custom HTML code to create a fully interactive ad experience. Your promotions will be displayed in high-visibility areas across the site, ensuring maximum engagement and reach.</p>

<p>Our intuitive dashboard lets you manage your ads effortlessly — set duration, update creatives, track views and clicks in real time, and optimize performance on the go. No tech skills? No problem. Our team is ready to assist with setup and recommendations.</p>

<p>Marketplace Platform supports various ad formats, including top-page banners, sidebar images, in-listing ads, and pop-up placements. Whether you\'re running a short-term campaign or establishing long-term brand presence, you\'ll find the right fit here.</p>

<p>Want full creative freedom? Add your custom HTML code to design responsive, animated, or embedded-content ads. From promotional sliders to newsletter sign-up forms — your imagination is the only limit.</p>

<p>Thousands of daily visitors are just one click away from discovering your business. Take advantage of our high-traffic environment and start generating results from day one.</p>

<p>Join hundreds of advertisers who\'ve boosted their visibility and sales with Marketplace Platform. Easy setup. Real impact. Maximum exposure.</p>

<p>Get started today — your audience is already here, waiting to see what you have to offer.</p>',

                'ru' => '<strong>Рекламируйте умнее с платформой Marketplace – достигните своей идеальной аудитории уже сегодня!</strong>

<p>Платформа Marketplace – это не просто торговая площадка, а мощное рекламное пространство, созданное для роста вашего бренда. Запускаете ли вы продукт, продвигаете услугу или повышаете узнаваемость бренда – наша платформа предоставляет инструменты для прямого контакта с целевой аудиторией.</p>

<p>Мы предлагаем гибкие и эффективные рекламные возможности: загружайте привлекательные баннеры, демонстрируйте богатый медиа-контент или вставляйте собственный HTML-код для создания полностью интерактивной рекламы. Ваши промо-материалы будут отображаться в зонах высокой видимости по всему сайту, обеспечивая максимальное вовлечение и охват.</p>

<p>Наша интуитивная панель управления позволяет легко управлять рекламой — устанавливать продолжительность, обновлять креативы, отслеживать просмотры и клики в реальном времени, а также оптимизировать эффективность на ходу. Нет технических навыков? Не проблема. Наша команда готова помочь с настройкой и рекомендациями.</p>

<p>Платформа Marketplace поддерживает различные форматы рекламы, включая баннеры в верхней части страницы, изображения в боковой панели, рекламу внутри объявлений и всплывающие размещения. Проводите ли вы краткосрочную кампанию или устанавливаете долгосрочное присутствие бренда – здесь вы найдете подходящий вариант.</p>

<p>Хотите полную творческую свободу? Добавьте собственный HTML-код для создания адаптивной, анимированной рекламы или контента с встроенными элементами. От промо-слайдеров до форм подписки на рассылку – ваше воображение – единственное ограничение.</p>

<p>Тысячи ежедневных посетителей находятся всего в одном клике от знакомства с вашим бизнесом. Воспользуйтесь нашей высокотрафиковой средой и начните получать результаты с первого дня.</p>

<p>Присоединяйтесь к сотням рекламодателей, которые повысили свою видимость и продажи с платформой Marketplace. Простая настройка. Реальное воздействие. Максимальное воздействие.</p>

<p>Начните сегодня — ваша аудитория уже здесь и ждет, чтобы увидеть, что вы можете предложить.</p>'
            ])
            ->placeholder($this->extension->langAdmin('Enter article content'))
            ->boundaryInit(['title' => $this->extension->langAdmin('Article Content Settings')]);
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

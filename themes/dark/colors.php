<?php

/**
 * Colors settings
 * @var $this Theme
 * @var $init bool
 *
 * Colors:
 * @var $main string
 * @var $secondary string
 * @var $filter_active string
 * @var $icons string
 * @var $add_button string
 * @var $action_buttons string
 * @var $text string
 * @var $links string
 * @var $body_bg string
 * @var $item_bg string
 * @var $content_bg string
 * @var $settings_bg string
 */

if ($init) {
    /**
     * For dark theme redefine default colors settings by inverting the text and background.
     */
    return $this->colorsSettings([
        'main' => [
            'title' => $this->langAdmin('Main Color'),
            'default' => '#3CA6DF',
        ],
        'secondary' => [
            'title' => $this->langAdmin('Secondary Color'),
            'default' => '#FF9D00',
        ],
        'filter_active' => [
            'title' => $this->langAdmin('Active filter color'),
            'default' => '#3CA6DF',
        ],
        'icons' => [
            'title' => $this->langAdmin('Icons Color (SVG)'),
            'default' => '#3CA6DF',
            'toggle' => true,
        ],
        'add_button' => [
            'title' => $this->langAdmin('Color of the "Add listing" button'),
            'default' => '#FF9D00',
        ],
        'action_buttons' => [
            'title' => $this->langAdmin('Color of action "Buttons"'),
            'default' => '#74b31b',
        ],
        'text' => [
            'title' => $this->langAdmin('Text Color'),
            'default' => '#FFFFFF',
        ],
        'links' => [
            'title' => $this->langAdmin('Links Color'),
            'default' => '#FFFFFF',
        ],
        'body_bg' => [
            'title' => $this->langAdmin('Body Background Color'),
            'default' => '#333333',
            'fordev' => true,
        ],
        'item_bg' => [
            'title' => $this->langAdmin('Items Background Color'),
            'default' => '#525252',
            'fordev' => true,
        ],
        'content_bg' => [
            'title' => $this->langAdmin('Content Background Color'),
            'default' => '#333333',
            'fordev' => true,
        ],
        'settings_bg' => [
            'title' => $this->langAdmin('Settings Background Color'),
            'default' => '#333333',
            'fordev' => true,
        ],
    ]);
}

$isWhite = function ($color) {
    return in_array(mb_strtolower($color), ['white', '#fff', '#ffffff', ''], true);
};

if ($isWhite($body_bg)) {
    $this->view->getLayout()->addBodyClass('no-body-bg-color');
}
if ($isWhite($settings_bg)) {
    $this->view->getLayout()->addBodyClass('no-settings-bg-color');
}

?>
<style>
    :root {
        --text-color: <?= $text ?> !important;
        --links-color: <?= HTML::colorHexToRgb($links) ?> !important;
        --primary-base-color: <?= $main ?> !important;
        --primary-base-color-rgba: <?= HTML::colorHexToRgb($main) ?>;
        --secondary-base-color: <?= $secondary ?> !important;
        --secondary-base-color-rgba: <?= HTML::colorHexToRgb($secondary) ?> !important;
        --filter-active-color: <?= HTML::colorHexToRgb($filter_active) ?> !important;
        --add-button-color: <?= $add_button ?> !important;
        --action-buttons-color: <?= HTML::colorHexToRgb($action_buttons) ?> !important;
        --body-bg-color: <?= $body_bg ?>;
        --item-bg-color: <?= $item_bg ?>;
        --content-bg-color: <?= $content_bg ?>;
        --settings-bg-color: <?= $settings_bg ?>;
    }
</style>

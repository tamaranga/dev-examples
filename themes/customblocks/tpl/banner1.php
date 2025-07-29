<?php
/**
 * Custom Banner 1
 * @see \themes\customblocks\views\Banner1Block
 * @var $banner_enabled bool Включен ли баннер
 * @var $banner_text string Текст баннера
 * @var $banner_background string Цвет фона баннера
 * @var $banner_text_color string Цвет текста баннера
 * @var $button_enabled bool Включена ли кнопка
 * @var $button_text string Текст кнопки
 * @var $button_url string URL кнопки
 * @var $button_background string Цвет фона кнопки
 * @var $button_text_color string Цвет текста кнопки
 */
?>
<?php if ($banner_enabled) { ?>
  <div class="cb-banner" style="background-color: <?= $banner_background ?>; color: <?= $banner_text_color ?>;">
    <div class="container cb-banner-content">
      <?php if (!empty($banner_text)) { ?>
        <div class="cb-banner-title">
          <?= $banner_text ?>
        </div>
      <?php } ?>
      
      <?php if ($button_enabled && !empty($button_text)) { ?>
          <a href="<?= $button_url ?: '#' ?>"
            class="cb-banner-button"
            style="background-color: <?= $button_background ?>; color: <?= $button_text_color ?>;">
            <?= $button_text ?>
          </a>
      <?php } ?>
    </div>
  </div>
<?php } ?>
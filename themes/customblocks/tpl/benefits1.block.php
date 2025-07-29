<?php
/**
 * Benefits 1 Block Template
 * @see \themes\customblocks\views\Benefits1Block
 * @var $title string Заголовок блока
 * @var $title_icon string URL иконки заголовка
 * @var $icons_color string URL иконки заголовка
 * @var $benefits array Список преимуществ [['icon' => 'URL', 'title' => 'Название', 'description' => 'Описание'], ...]
 */
?>
<?php if (!empty($icons_color)) { ?>
  <style>
    .cb-benefits-1-item .cb-benefits-item-icon path,
    .cb-benefits-1-icon path {
      fill: <?= htmlspecialchars($icons_color) ?> !important;
    }
  </style>
<?php } ?>
<?php if (!empty($title) || !empty($benefits)) { ?>
  <div class="cb-benefits-1-box">
    <div class="container">
      <?php if (!empty($title)) { ?>
        <div class="in-box-head c-shadow-overflow">
          <div class="in-box-title c-title">
            <?php if (!empty($title_icon)) { ?>
              <?= HTML::inlineSvg($title_icon, ['cb-benefits-1-icon', 'ico']) ?>
            <?php } ?>
            <span><?= htmlspecialchars($title) ?></span>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($benefits)) { ?>
        <div class="cb-benefits-1-items">
          <?php foreach ($benefits as $benefit) { ?>
            <?php if (!empty($benefit['title']) || !empty($benefit['description'])) { ?>
            <div class="cb-benefits-1-item c-grey-bg">
              <?php if (!empty($benefit['icon'])) { ?>
                <?= HTML::inlineSvg($benefit['icon'], ['cb-benefits-item-icon', 'ico']) ?>
              <?php } ?>
        
              <?php if (!empty($benefit['title'])) { ?>
                <div class="c-title h3"><?= htmlspecialchars($benefit['title']) ?></div>
              <?php } ?>
        
              <?php if (!empty($benefit['description'])) { ?>
                <div class="cb-benefits-1-item-desc fs-16">
                  <?= $benefit['description'] ?>
                </div>
              <?php } ?>
            </div>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
<?php } ?>
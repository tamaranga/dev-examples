<?php
/**
 * Benefits 2 Block Template
 * @see \themes\customblocks\views\Benefits2Block
 * @var $main_image string URL основного изображения
 * @var $description string Описание под изображением
 * @var $background_color string Цвет фона блока
 * @var $benefits array Список преимуществ [['icon' => 'URL', 'title' => 'Название', 'description' => 'Описание'], ...]
 */
?>
<?php if (!empty($background_color)) { ?>
  <style>
    .cb-benefits-2-item .cb-benefits-item-icon path {
      fill: <?= htmlspecialchars($background_color) ?> !important;
    }
  </style>
<?php } ?>
<?php if (!empty($main_image) || !empty($description) || !empty($benefits)) { ?>
  <div class="cb-benefits-2-box" <?php if (!empty($background_color)) { ?>style="background-color: <?= htmlspecialchars($background_color) ?>;"<?php } ?>>
    <div class="container">
      <div class="cb-benefits-in">
        <?php if (!empty($main_image) || !empty($description)) { ?>
          <div class="cb-benefits-2-left">
            <?php if (!empty($description)) { ?>
              <div class="cb-benefits-2-desc h1 ">
                <?= $description ?>
              </div>
            <?php } ?>
            <?php if (!empty($main_image)) { ?>
              <?= HTML::inlineSvg($main_image, ['cb-benefits-2-image', 'ico']) ?>
            <?php } ?>
          </div>
        <?php } ?>
  
        <?php if (!empty($benefits)) { ?>
          <div class="cb-benefits-2-right">
            <?php foreach ($benefits as $benefit) { ?>
              <?php if (!empty($benefit['title']) || !empty($benefit['description'])) { ?>
              <div class="cb-benefits-2-item">
                <?php if (!empty($benefit['title'])) { ?>
                  <div class="c-title">
                    <?php if (!empty($benefit['icon'])) { ?>
                      <?= HTML::inlineSvg($benefit['icon'], ['cb-benefits-item-icon', 'ico']) ?>
                    <?php } ?>
                    <span><?= htmlspecialchars($benefit['title']) ?></span>
                  </div>
                <?php } ?>
          
                <?php if (!empty($benefit['description'])) { ?>
                  <div class="fs-16">
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
  </div>
<?php } ?>
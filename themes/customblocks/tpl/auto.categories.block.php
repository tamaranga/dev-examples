<?php
/**
 * Categories with Image Block
 * @see \themes\customblocks\views\AutoCategoriesBlock
 * @var $block_enabled bool Whether the block is enabled
 * @var $main_image string Main image URL
 * @var $sections array List of sections [['title' => 'Title', 'link' => 'URL', 'icon' => 'Icon URL'], ...]
 */
?>
<?php if ($block_enabled && (!empty($main_image) || !empty($sections))) { ?>
  <div class="cb-categories-with-img-box">
    <div class="container">
      <div class="cb-categories-img">
        <?php if (!empty($main_image)) { ?>
          <div class="cb-categories-img-l">
            <img src="<?= $main_image ?>"
              alt="Category Image"
              class="cb-category-image">
          </div>
        <?php } ?>
        
        <?php if (!empty($sections)) { ?>
          <div class="cb-categories-img-r">
            <div class="cb-category-list">
              <?php foreach ($sections as $section) { ?>
                <?php if (!empty($section['title'])) { ?>
                  <a href="<?= $section['link'] ?: '#' ?>" class="cb-category-item">
                    <?php if (!empty($section['icon'])) { ?>
                      <?= HTML::inlineSvg($section['icon'], ['cb-category-icon', 'ico']) ?>
                    <?php } ?>
                    <span><?= $section['title'] ?></span>
                  </a>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php } ?>
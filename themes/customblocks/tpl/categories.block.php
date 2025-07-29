<?php
/**
 * Custom Categories Block
 * @see \themes\customblocks\views\CategoriesBlock
 * @var $block_logo string General block logo URL (SVG/PNG)
 * @var $left_enabled bool Whether left categories block is enabled
 * @var $left_title string Left block title
 * @var $left_links array Array of left block links [['title' => 'Title', 'link' => 'URL'], ...]
 * @var $right_enabled bool Whether right categories block is enabled
 * @var $right_title string Right block title
 * @var $right_links array Array of right block links [['title' => 'Title', 'link' => 'URL'], ...]
 * @var $bottom_enabled bool Whether bottom suggestions block is enabled
 * @var $bottom_title string Bottom block title
 * @var $bottom_links array Array of bottom block links [['title' => 'Title', 'link' => 'URL'], ...]
 */
?>
<div class="cb-box">
  <div class="cb-container-bg">
    <?php if ($block_logo) { ?>
      <?= HTML::inlineSvg($block_logo, ['cb-main-logo']) ?>
    <?php } ?>
  </div>
  <div class="container cb-container">
    <div class="cb-property-block">
      <div class="cb-main-options">
        <?php if ($left_enabled && !empty($left_links)) { ?>
          <div class="cb-option-card">
            <h2 class="cb-option-title"><?= $left_title ?></h2>
            <div class="cb-option-tags">
              <?php foreach ($left_links as $index => $link) { ?>
                <a href="<?= $link['link'] ?>" class="cb-tag"><?= $link['title'] ?></a>
                <?php if ($index < count($left_links) - 1) { ?><span class="c-dot"></span><?php } ?>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
        
        <?php if ($right_enabled && !empty($right_links)) { ?>
          <div class="cb-option-card">
            <h2 class="cb-option-title"><?= $right_title ?></h2>
            <div class="cb-option-tags">
              <?php foreach ($right_links as $index => $link) { ?>
                <a href="<?= $link['link'] ?>" class="cb-tag"><?= $link['title'] ?></a>
                <?php if ($index < count($right_links) - 1) { ?><span class="c-dot"></span><?php } ?>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
      
      <?php if ($bottom_enabled && !empty($bottom_links)) { ?>
        <div class="cb-additional-options">
          <div class="cb-additional-title"><?= $bottom_title ?></div>
          <div class="cb-categories-grid">
            <?php foreach ($bottom_links as $index => $link) { ?>
              <a href="<?= $link['link'] ?>" class="cb-category-link"><?= $link['title'] ?></a>
              <?php if ($index < count($bottom_links) - 1) { ?><span class="c-dot"></span><?php } ?>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php
/**
 * Ads Page
 * @see \themes\customblocks\views\AdsPage
 * @var $breadcrumbs bff\view\Breadcrumbs
 * @var $banner1 \themes\customblocks\views\Banner1Block
 * @var $horizontal_banner \themes\customblocks\views\AdsPage.php
 * @var $horizontal_banner_url \themes\customblocks\views\AdsPage.php
 * @var $vertical_banner \themes\customblocks\views\AdsPage.php
 * @var $vertical_banner_url \themes\customblocks\views\AdsPage.php
 * @var $article_content \themes\customblocks\views\AdsPage.php
 * @var $categoriesBlock \themes\customblocks\views\CategoriesBlock
 * @var $titleh1 string
 * @var $seotext string
 */
?>
<?= $breadcrumbs ?>
<div class="l-page-head">
    <div class="container">
        <h1 class="l-page-title c-title"><?= $titleh1 ?></h1>
    </div>
</div>
<div class="container">
    <?php if (!empty($horizontal_banner)) { ?>
      <div class="l-banner l-banner-h mt-0">
        <div class="l-banner-content">
          <a class="l-banner-link" href="<?= $horizontal_banner_url ?>">
            <img src="<?= $horizontal_banner; ?>" alt="">
          </a>
        </div>
      </div>
    <?php } ?>
  <div class="l-columns-box l-columns-box-w-aside">
    <div class="l-columns-box-l">
      <article class="c-article fs-16">
        <?= $article_content; ?>
      </article>
    </div>
  <?php if (!empty($vertical_banner)) { ?>
    <div class="l-aside">
      <div class="l-banner l-banner-v align-items-md-end m-0">
        <a class="l-banner-link" href="<?= $vertical_banner_url ?>">
          <img src="<?= $vertical_banner;?>" alt="">
        </a>
      </div>
    </div>
  <?php } ?>
  </div>
</div>
<?= $categoriesBlock; ?>
<?= $banner1 ?>
<?php /* Seotext */
if (!empty($seotext)) { ?>
    <?= $seotext ?>
<?php } ?>
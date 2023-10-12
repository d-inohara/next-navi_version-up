<?php get_header(); ?>
<?php $uri = esc_url(get_template_directory_uri()); ?>
<?php
$post_terms = get_the_terms( $post->id, 'information_tag');
$terms_name = $post_terms[0]->name;
$terms_slug = $post_terms[0]->slug; ?>
  
<section class="bg_gray">
  <div class="bg_blue">
    <div class="contents_title">
      <div class="wrap">
        <div class="contents_title_inner title_child">
          <h1 class="min">最新のお知らせ</h1>
          <span>Information</span> </div>
      </div>
      <figure class="contents_title_image"><img src="<?= $uri ?>/assets/img/contents/news_main.png" alt=""></figure>
    </div>
  </div>
  <ul class="breadcrumb flex" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a itemprop="item" href="<?= esc_url(home_url()); ?>"> <span itemprop="name">ネクストナビ</span> </a>
      <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a itemprop="item" href="<?= esc_url(home_url('information')); ?>"> <span itemprop="name">最新のお知らせ</span> </a>
      <meta itemprop="position" content="2" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <?php echo '<a itemprop="item" href="' . esc_url(home_url()) .'/information' .'/'. $terms_slug.'">'?><span itemprop="name"><?php echo $terms_name; ?></span> </a>
      <meta itemprop="position" content="3" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <span itemprop="name"><?php the_title(); ?></span>
      <meta itemprop="position" content="4" />
    </li>
  </ul>
  <div class="bg_w">
    <div class="wrap wrap_m contents_wrap">
    <div class="information_single_wrap">    
            
    <time class="information_single_time" datetime="<?php the_time('Y.m.d'); ?>"><?php the_time('Y.m.d'); ?></time>
    <h1 class="information_single_title"><?php the_title(); ?></h1>
    
    <div class="information_single_content_wrap">
    <?php echo the_content(); ?>
    </div>
    
    <div class="information_single_btn"><a href="<?= esc_url(home_url('information'));?>">一覧に戻る</a></div>


          </div>
        </div>
      </section>




<?php get_footer(); ?>
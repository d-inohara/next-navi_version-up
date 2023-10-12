<?php get_header(); ?>
<?php $uri = esc_url(get_template_directory_uri()); ?>
<?php
$post_terms = get_the_terms( $post->id, 'case_tag');
$terms_name = $post_terms[0]->name;
$terms_slug = $post_terms[0]->slug; 
$post_id = get_the_ID();
$post_id = get_the_ID();
$image = SCF::get('case_headimage');
$case_industry = SCF::get('case_industry');
$case_person = SCF::get('case_person');
?>
  
<section class="bg_gray">
  <div class="bg_blue">
    <div class="contents_title">
      <div class="wrap">
        <div class="contents_title_inner title_child">
          <h1 class="min">事例紹介</h1>
          <span>Case Study</span> </div>
      </div>
      <figure class="contents_title_image"><img src="<?= $uri ?>/assets/img/contents/case_main.png" alt=""></figure>
    </div>
  </div>
  <ul class="breadcrumb flex" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a itemprop="item" href="<?= esc_url(home_url()); ?>"> <span itemprop="name">ネクストナビ</span> </a>
      <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <a itemprop="item" href="<?= esc_url(home_url('case')); ?>"> <span itemprop="name">事例紹介</span> </a>
      <meta itemprop="position" content="2" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <?php echo '<a itemprop="item" href="' . esc_url(home_url()) .'/case' .'/'. $terms_slug.'">'?><span itemprop="name"><?php echo $terms_name; ?></span> </a>

     

      <meta itemprop="position" content="3" />
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <span itemprop="name"><?php the_title(); ?></span>
      <meta itemprop="position" content="4" />
    </li>
  </ul>
  <div class="bg_w">
    <div class="wrap wrap_m contents_wrap">
    <div class="case_single_wrap">    
         
    <div class="case_title_wrap">
      <div class="case_title_text">
        <time class="case_single_time" datetime="<?php the_time('Y.m.d'); ?>"><?php the_time('Y.m.d'); ?></time>
        <h1><?php the_title(); ?></h1>
        <?php if(!empty($case_industry) || !empty($case_person)) : ?>
        <p class="case_profile">
            <?php if(!empty($case_industry) && !empty($case_person)) : ?>
                <?php echo SCF::get('case_industry');?><?php echo ' / '. SCF::get('case_person');?>
            <?php elseif(!empty($case_industry)): ?>
                <?php echo SCF::get('case_industry');?>
            <?php else: ?>
                <?php echo SCF::get('case_person');?>
            <?php endif; ?>
        </p>
        <?php endif; ?>
        <ul class="case_category">
          <?php
          $post_terms = get_the_terms( $post_id, 'case_tag' );
          if ( is_array( $post_terms ) ) {
            foreach ( $post_terms as $tag ) {
              $tag_link = get_term_link( $tag );
              echo "<li class='". $tag->slug ."'>" . $tag->name . "</li>";
              ?>
          <?php }} ?>
        </ul>
      </div>
      <figure>
        <?php if(!empty($image)): ?>
            <img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
        <?php else : ?>
            <img src="<?= $uri ?>/assets/img/common/sample.jpg" alt="">
        <?php endif; ?>
      </figure>
    </div>
    
    <div class="case_single_content_wrap">

        <?php
        $case_textarea = SCF::get('case_textarea');
        foreach ($case_textarea as $items ) {
        ?>
        <?php if(!empty($items['case_headline'])) : ?>
        <h2 class="case_headline"><?php echo $items['case_headline']; ?></h2>
        <?php endif; ?>
        <?php if(!empty($items['case_text'])) : ?>
        <p class="case_text"><?php echo nl2br($items['case_text']); ?></p>
        <?php endif; ?>
        <?php } ?>

    </div>
    
    <div class="case_single_btn"><a href="<?= esc_url(home_url('case'));?>">一覧に戻る</a></div>


          </div>
        </div>
      </section>




<?php get_footer(); ?>
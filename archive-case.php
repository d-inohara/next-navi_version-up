<?php get_header(); ?>
<?php $uri = esc_url(get_template_directory_uri()); ?>
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
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"> <span itemprop="name">事例紹介</span>
      <meta itemprop="position" content="2" />
    </li>
  </ul>


<div class="bg_w">
  <div class="case_wrap archive_case_wrap wrap">

<?php if (have_posts()): ?>

    <ul class="case_list_wrap">
    <?php while (have_posts()) : the_post(); ?>
      <?php 
	  $post_id = get_the_ID();
	  $image = SCF::get('case_headimage');
      $case_industry = SCF::get('case_industry');
      $case_person = SCF::get('case_person');
	  ?>
      <li class="case_list"> <a class="case_list_link" href="<?php the_permalink(); ?>">
        <figure>
        <?php if(!empty($image)): ?>
            <img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
        <?php else : ?>
            <img src="<?= $uri ?>/assets/img/common/sample.jpg" alt="">
        <?php endif; ?>
        </figure>
        <div class="case_text_wrap">
        <ul class="case_category">
          <?php
          $post_terms = get_the_terms( $post_id, 'case_tag' );
          if ( is_array( $post_terms ) ) {
            foreach ( $post_terms as $tag ) {
              $tag_link = get_term_link( $tag );
              echo "<li class='". $tag->slug ."'>"."<object><a href='" . esc_url( home_url() ) . "/case" . "/" . $tag->slug . "'>" . $tag->name . "</a></object></li>";
              ?>
          <?php }} ?>
        </ul>
        <h3 class="case_title">
          <?php the_title(); ?>
        </h3>
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
        </div>
        </a> 
    </li>
      <?php endwhile; ?>
      <?php else: ?>
      <?php
      endif;
     wp_reset_postdata(); 
      ?>
    </ul>
    <?php the_posts_pagination(
      array(
        'mid_size' => '1',
        'prev_text' => '',
        'next_text' => '',
        'screen_reader_text' => ' ',
      )
    ); ?>
  </div>
</div>
        <?php get_footer(); ?>
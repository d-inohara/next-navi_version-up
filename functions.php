<?php

add_theme_support('post-thumbnails');

//ブロックエディタ管理画面用のcss適用
function add_block_editor_styles() {
    wp_enqueue_style( 'block-style', get_stylesheet_directory_uri() . '/assets/block_style/block_style.css' );
}
add_action( 'enqueue_block_editor_assets', 'add_block_editor_styles' );

//Advanced custom fieldオプションページ追加
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


// カスタム投稿タイプの追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'case', // 投稿タイプ名の定義
        array(
            'labels' => array(
            'name' => __( '事例紹介' ), // 表示する投稿タイプ名
            'singular_name' => __( '事例紹介' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title'),
            'show_in_rest' => true,
        )
    );
    register_post_type( 'information', // 投稿タイプ名の定義
    array(
        'labels' => array(
        'name' => __( 'お知らせ' ), // 表示する投稿タイプ名
        'singular_name' => __( 'お知らせ' )
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title','editor'),
        'show_in_rest' => true,
        )
    );
    register_post_type( 'members',
    array(
        'labels' => array(
          'name' => __( '会員向けお知らせ'),
          'singular_name' => __( '会員向けお知らせ')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title','editor'),
        'show_in_rest' => true,
    )
    );
    register_post_type( 'review',
        array(
            'labels' => array(
                'name' => __( '朝食'),
                'singular_name' => __( '朝食')
            ),
            'public' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug'=>'nextclubonline/review'),
            'template'     => [
                [ 'core/gallery',[
                    'linkTo' => 'none',
                    'className' => 'review_gallery',
                    [ 'core/image'],[ 'core/image'],[ 'core/image']
                ]],
                [ 'core/paragraph',[ 'placeholder' => '説明文１' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '見出し（朝食）' ]],
                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し（お部屋）' ]],
                [ 'core/media-text', [
                     'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し（宿泊プラン）' ]],
                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
            ],
        )
    );
    register_post_type( 'interview',
        array(
            'labels' => array(
                'name' => __( 'インタビュー'),
                'singular_name' => __( 'インタビュー')
            ),
            'public' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug'=>'nextclubonline/interview'),
            'template' => [
                [ 'core/image',[ 'align' => 'center' ]],

                [ 'core/paragraph',[ 'placeholder' => '紹介①説明文' ]],
                [ 'core/paragraph',[ 'placeholder' => 'お話をお聞きした人説明文' ]],

                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し' ]],
                [ 'core/media-text',[
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q1テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A1テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q2テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A2テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q3テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A3テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q4テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A4テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q5テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A5テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q6テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A6テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q7テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A7テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q8テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A8テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q9テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A9テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q10テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A10テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q11テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A11テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q12テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A12テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q13テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A13テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q14テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text' ]],
                [ 'core/paragraph',[ 'placeholder' => 'A14テキスト' ]],

                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    'className' => 'interview_text',
                    [ 'core/paragraph',[ 'placeholder' => 'Q15テキスト' ]],
                ]],
                [ 'core/paragraph',[ 'placeholder' => '画像ない場合のQuestion入力欄', 'className' => 'no_image_text'
                ]],
                [ 'core/paragraph',[ 'placeholder' => 'A15テキスト' ]],
            ],
        )
    );
    register_post_type( 'gift',
        array(
            'labels' => array(
                'name' => __( 'ふるさと納税'),
                'singular_name' => __( 'ふるさと納税')
            ),
            'public' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug'=>'nextclubonline/gift'),
            'template' => [
                [ 'core/paragraph',[ 'placeholder' => '説明文①' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品①タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品①説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品②タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品②説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品③タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品③説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品④タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品④説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品⑤タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品⑤説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品⑥タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品⑥説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品⑦タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品⑦説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品⑧タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品⑧説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品⑨タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品⑨説明文' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '紹介品⑩タイトル' ]],
                [ 'core/image',[ 'align' => 'center' ] ],
                [ 'core/paragraph',[ 'placeholder' => '紹介品⑩説明文' ]],

            ],
        )
    );
    register_post_type( 'trip',
        array(
            'labels' => array(
                'name' => __( '上質な旅'),
                'singular_name' => __( '上質な旅')
            ),
            'public' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug'=>'nextclubonline/trip'),
            'template'     => [
                [ 'core/gallery',[
                    'linkTo' => 'none',
                    'className' => 'review_gallery',
                    [ 'core/image'],[ 'core/image'],[ 'core/image']
                ]],
                [ 'core/paragraph',[ 'placeholder' => '説明文１' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
            ],
        )
    );
    register_post_type( 'seminar_report',
        array(
            'labels' => array(
                'name' => __( 'セミナーレポート'),
                'singular_name' => __( 'セミナーレポート')
            ),
            'public' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug'=>'nextclubonline/seminar_report'),
            'template'     => [
                [ 'core/gallery',[
                    'linkTo' => 'none',
                    'className' => 'review_gallery',
                    [ 'core/image'],[ 'core/image'],[ 'core/image']
                ]],
                [ 'core/paragraph',[ 'placeholder' => '説明文１' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
            ],
        )
    );
    register_post_type( 'other',
        array(
            'labels' => array(
                'name' => __( 'その他'),
                'singular_name' => __( 'その他')
            ),
            'public' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug'=>'nextclubonline/other'),
            'template'     => [
                [ 'core/gallery',[
                    'linkTo' => 'none',
                    'className' => 'review_gallery',
                    [ 'core/image'],[ 'core/image'],[ 'core/image']
                ]],
                [ 'core/paragraph',[ 'placeholder' => '説明文１' ]],
                [ 'core/heading', [ 'level' => 3,'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
                [ 'core/heading', [ 'level' => 3, 'placeholder' => '見出し' ]],
                [ 'core/media-text', [
                    'mediaPosition' => 'right', 'mediaType' => 'image',
                    [ 'core/paragraph',[ 'placeholder' => 'テキスト' ]],
                ]],
            ],
        )
    );
    register_post_type( 'youtube',
        array(
            'labels' => array(
                'name' => __( 'youtube動画'),
                'singular_name' => __( 'youtube動画')
            ),
            'public' => true,
            'menu_icon' => 'dashicons-video-alt3',
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
            'has_archive' => true,
            'rewrite' => array('slug'=>'nextclubonline/youtube'),
        )
    );
    register_post_type( 'newsletter',
        array(
            'labels' => array(
                'name' => __( '会報誌'),
                'singular_name' => __( '会報誌')
            ),
            'public' => true,
            'menu_icon' => 'dashicons-book',
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
            'has_archive' => true,
            'rewrite' => array('slug'=>'nextclubonline/newsletter'),
        )
    );
    register_post_type( 'nextclubonline',
        array(
            'labels' => array(
                'name' => __( 'ネクストクラブ投稿'),
                'singular_name' => __( 'ネクストクラブ投稿')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_rest' => true,
        )
    );
    register_post_type( 'banner',
        array(
            'labels' => array(
                'name' => __( 'バナー'),
                'singular_name' => __( 'バナー')
            ),
            'public' => true,
            'menu_icon' => 'dashicons-media-document',
            'supports' => array( 'title'),
            'show_in_rest' => true,
        )
    );





    register_taxonomy(
        'case_tag', /* タクソノミーの名前 */
        'case',
        array(
            // 'hierarchical' => false, //タグタイプの指定（階層をもたない）
            'hierarchical' => true, //タグタイプの指定（階層をもたない）
            'update_count_callback' => '_update_post_term_count',
            //ダッシュボードに表示させる名前
            'label' => '実績カテゴリー',
            'public' => true,
            'has_archive' => true, /* アーカイブページを持つ */
            'show_ui' => true,
            'show_in_rest' => true,
        )
    );
    register_taxonomy(
        'information_tag', /* タクソノミーの名前 */
        array( 'information','members' ),
        array(
            // 'hierarchical' => false, //タグタイプの指定（階層をもたない）
            'hierarchical' => true, //タグタイプの指定（階層をもたない）
            'update_count_callback' => '_update_post_term_count',
            //ダッシュボードに表示させる名前
            'label' => 'お知らせカテゴリー',
            'public' => true,
            'has_archive' => true, /* アーカイブページを持つ */
            'show_ui' => true,
            'show_in_rest' => true,
        )
    );


//ネクストクラブオンライン投稿のカテゴリー　＊投稿タイプが増えても共通化可能
    register_taxonomy(
        'next_club_category',
        array( 'nextclubonline','review','interview','gift','trip' ,'seminar_report','other' ), //ここにカスタム投稿名を追記していく
        array(
            'label' => 'NCOカテゴリー',
            'hierarchical' => true,
            'public' => true,
            'query_var' => true,
            'has_archive' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'rewrite'      => array(
                'slug'         => 'category',
                'with_front'   => false,
                'hierarchical' => true,
            ),
        ),
    );

//ネクストクラブオンライン投稿のタグ
    register_taxonomy(
        'next_club_tag',
        array( 'nextclubonline','review','interview','gift','trip' ,'seminar_report','other' ), //ここにカスタム投稿名を追記していく
        array(
            'label' => 'NCOタグ',
            'hierarchical' => false,
            'public' => true,
            'query_var' => true,
            'has_archive' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'rewrite'      => array(
                'slug'         => 'tag',
                'with_front'   => false,
                'hierarchical' => true,
            ),
        ),
    );


}


function customize_menus(){
    global $menu;
    $menu[19] = $menu[10];  //メディアの移動
    unset($menu[10]);
}
add_action( 'admin_menu', 'customize_menus' );

function custom_menu_order($menu_ord) {
    if(!$menu_ord) return true;

    return array(
        'index.php', //ダッシュボード
        'edit.php?post_type=case',
        'edit.php?post_type=information',
        'edit.php?post_type=members',
        'edit.php?post_type=nextclubonline',
        'edit.php?post_type=review',
        'edit.php?post_type=interview',
        'edit.php?post_type=gift',
        'edit.php?post_type=trip',
        'edit.php?post_type=seminar_report',
        'edit.php?post_type=other',
        'edit.php?post_type=youtube',
        'edit.php?post_type=newsletter',
        'edit.php?post_type=banner',
        'edit.php?post_type=page', //固定ページ
        'upload.php', //メディア
        'admin.php?page=mlf-folders8',
        'edit-comments.php',
        'themes.php',//外観
        'plugins.php',//プラグイン
        'users.php',//ユーザー
        'tools.php',//ツール
        'options-general.php',//設定
        'admin.php?page=publishpress-future',
        'admin.php?page=ai1wm_export',
        'edit.php?post_type=mw-wp-form', //mw-wp-form
        'admin.php?page=aioseo&notifications=true',
        'edit.php?post_type=smart-custom-fields',
        'edit.php?post_type=acf-field-group',//カスタムフィールド
    );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');


function add_defaultcategory_automatically($post_ID) {
    global $wpdb;
 
    $curTerm = wp_get_object_terms($post_ID, 'information_tag');
    if (0 == count($curTerm)) {
      $defaultTerm = 'other';
      wp_set_object_terms($post_ID, $defaultTerm, 'information_tag');
    }
  }

  add_action('publish_information', 'add_defaultcategory_automatically');

  function add_defaultcategory_automatically2($post_ID) {
    global $wpdb;
 
    $curTerm = wp_get_object_terms($post_ID, 'case_tag');
    if (0 == count($curTerm)) {
      $defaultTerm = 'other';
      wp_set_object_terms($post_ID, $defaultTerm, 'case_tag');
    }
  }

  add_action('publish_case', 'add_defaultcategory_automatically2');

function add_defaultcategory_automatically3($post_ID) {
    global $wpdb;

    $curTerm = wp_get_object_terms($post_ID, 'information_tag');
    if (0 == count($curTerm)) {
        $defaultTerm = 'other';
        wp_set_object_terms($post_ID, $defaultTerm, 'information_tag');
    }
}

add_action('publish_members', 'add_defaultcategory_automatically3');

function add_defaultcategory_automatically4($post_ID) {
    global $wpdb;

    $curTerm = wp_get_object_terms($post_ID, 'next_club_category');
    if (0 == count($curTerm)) {
        $defaultTerm = 'other';
        wp_set_object_terms($post_ID, $defaultTerm, 'next_club_category');
    }
}

add_action('publish_nextclubonline', 'add_defaultcategory_automatically4');

function add_defaultcategory_automatically5($post_ID) {
    global $wpdb;

    $curTerm = wp_get_object_terms($post_ID, 'next_club_category');
    if (0 == count($curTerm)) {
        $defaultTerm = 'other';
        wp_set_object_terms($post_ID, $defaultTerm, 'next_club_category');
    }
}

add_action('publish_review', 'add_defaultcategory_automatically5');

function add_defaultcategory_automatically6($post_ID) {
    global $wpdb;

    $curTerm = wp_get_object_terms($post_ID, 'next_club_category');
    if (0 == count($curTerm)) {
        $defaultTerm = 'other';
        wp_set_object_terms($post_ID, $defaultTerm, 'next_club_category');
    }
}

add_action('publish_interview', 'add_defaultcategory_automatically6');

function add_defaultcategory_automatically7($post_ID) {
    global $wpdb;

    $curTerm = wp_get_object_terms($post_ID, 'next_club_category');
    if (0 == count($curTerm)) {
        $defaultTerm = 'other';
        wp_set_object_terms($post_ID, $defaultTerm, 'next_club_category');
    }
}

add_action('publish_gift', 'add_defaultcategory_automatically7');

function add_defaultcategory_automatically8($post_ID) {
    global $wpdb;

    $curTerm = wp_get_object_terms($post_ID, 'next_club_category');
    if (0 == count($curTerm)) {
        $defaultTerm = 'other';
        wp_set_object_terms($post_ID, $defaultTerm, 'next_club_category');
    }
}

add_action('publish_trip', 'add_defaultcategory_automatically8');

function add_defaultcategory_automatically9($post_ID) {
    global $wpdb;

    $curTerm = wp_get_object_terms($post_ID, 'next_club_category');
    if (0 == count($curTerm)) {
        $defaultTerm = 'other';
        wp_set_object_terms($post_ID, $defaultTerm, 'next_club_category');
    }
}

add_action('publish_seminar_report', 'add_defaultcategory_automatically9');

function add_defaultcategory_automatically10($post_ID) {
    global $wpdb;

    $curTerm = wp_get_object_terms($post_ID, 'next_club_category');
    if (0 == count($curTerm)) {
        $defaultTerm = 'other';
        wp_set_object_terms($post_ID, $defaultTerm, 'next_club_category');
    }
}

add_action('publish_other', 'add_defaultcategory_automatically10');


//カスタム投稿パーマリンク「/taxonomy/」削除
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy){
    return str_replace('/'.$taxonomy.'/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);


add_rewrite_rule( 'case/([^/]+)/?$', 'index.php?case_tag=$matches[1]', 'top' );
add_rewrite_rule( 'case/([^/]+)/page/([0-9]+)/?$', 'index.php?case_tag=$matches[1]&paged=$matches[2]', 'top' );

add_rewrite_rule( 'information/([^/]+)/?$', 'index.php?information_tag=$matches[1]', 'top' );
add_rewrite_rule( 'information/([^/]+)/page/([0-9]+)/?$', 'index.php?information_tag=$matches[1]&paged=$matches[2]', 'top' );

// ビジュアルエディタの自動整形防止

function my_customize_mce_options( $init ) {

    global $allowedposttags;
  
    $init['valid_elements']          = '*[*]';
  
    $init['extended_valid_elements'] = '*[*]';
  
    $init['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
  
    $init['indent']                  = true;
  
    $init['wpautop']                 = false;
  
    $init['force_p_newlines'] = false;
  
    $init['force_br_newlines'] = true;
  
    $init['forced_root_block'] = '';
  
    return $init;
  
  }
  
  add_filter( 'tiny_mce_before_init', 'my_customize_mce_options' );


  //　spanタグ 削除防止

add_filter('tiny_mce_before_init', 'tinymce_init');

function tinymce_init( $init ) {

	$init['verify_html'] = false;

	return $init;

}




// 固定ページでビジュアルエディタを無効
function disable_visual_editor_in_page() {
	global $typenow;
	if ($typenow == 'page') add_filter('user_can_richedit', 'disable_visual_editor_filter');
}
function disable_visual_editor_filter() {return false;}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');


// head内不要ソース削除
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );



// wpautop無効化
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');



// 画像とリンクのパス（ショートコード）
function imgCode() {
    return esc_url(get_template_directory_uri());
  }
  add_shortcode('img', 'imgCode');

  function homeUrl() {
    return esc_url(home_url());
  }
  add_shortcode('home', 'homeUrl');


  

// PHPファイル呼び出し（ショートコード）
function php_Include($params = array()) {
    extract(shortcode_atts(array('file' => 'default'), $params));
    ob_start();
    include(STYLESHEETPATH . "/$file.php");
    return ob_get_clean();
    }
    add_shortcode('php', 'php_Include');



    /**
 * 404ページのタイトルを変更する
 * @param $title
 * @return mixed|string
 */
function change_title_name( $title ) {

    //条件分岐タグ等を使ってページにより $title を変更する処理
    if ( is_404() ) {
        $title = '404ページ | ' . get_bloginfo('name') ;
    }

    return $title;
}
add_filter( 'pre_get_document_title', 'change_title_name' );



// デフォルトの投稿をメニューから削除
function remove_menus() {

    remove_menu_page( 'edit.php' ); // 投稿.
}
add_action( 'admin_menu', 'remove_menus', 999 );




// カスタム投稿：表示順の設定
function sort_postdata( $query ) {
	if ( ! is_single() || is_admin() || ! $query->is_main_query() ) {
		return;
	}
	$query->set( 'order', 'ASC' );
	$query->set( 'orderby', 'modified' );
}


// カスタム投稿：ページ表示数の設定
  function change_posts_per_page1($query) 
{
	if ( !is_admin() && $query->is_main_query()) {
	    if ( is_post_type_archive('case') ) {
	        $query->set( 'posts_per_page', '9' );
	    }
	    else if ( is_tax('case_tag') ) {
	        $query->set( 'posts_per_page', '9' );
	    }
	}
    return $query;
}
 
add_action( 'pre_get_posts', 'change_posts_per_page1' );

function change_posts_per_page2($query) 
{
	if ( !is_admin() && $query->is_main_query()) {
	    if ( is_post_type_archive('information') ) {
	        $query->set( 'posts_per_page', '10' );
	    }
	    else if ( is_tax('information_tag') ) {
	        $query->set( 'posts_per_page', '10' );
	    }
	}
    return $query;
}
 
add_action( 'pre_get_posts', 'change_posts_per_page2' );


function change_posts_per_page3($query)
{
    if ( !is_admin() && $query->is_main_query()) {
        if ( is_post_type_archive('members') ) {
            $query->set( 'posts_per_page', '10' );
        }
        else if ( is_tax('members_tag') ) {
            $query->set( 'posts_per_page', '10' );
        }
    }
    return $query;
}

add_action( 'pre_get_posts', 'change_posts_per_page3' );

function change_posts_per_page4($query)
{
    if ( !is_admin() && $query->is_main_query()) {
        if ( is_post_type_archive('nextclubonline') ) {
            $query->set( 'posts_per_page', '12' );
        }
        else if ( is_tax('next_club_category') ) {
            $query->set( 'posts_per_page', '12' );
        }
        else if ( is_tax('next_club_tag') ) {
            $query->set( 'posts_per_page', '12' );
        }
    }
    return $query;
}

add_action( 'pre_get_posts', 'change_posts_per_page4' );

function change_posts_per_page5($query)
{
    if ( !is_admin() && $query->is_main_query()) {
        if ( is_post_type_archive('youtube') || is_post_type_archive('newsletter') ) {
            $query->set( 'posts_per_page', '12' );
        }
    }
    return $query;
}

add_action( 'pre_get_posts', 'change_posts_per_page5' );

function change_posts_per_page6($query)
{
    if ( !is_admin() && $query->is_main_query()) {
        if ( $query->is_search() ) {
            $query->set( 'posts_per_page', '12' );
        }
    }
    return $query;
}

add_action( 'pre_get_posts', 'change_posts_per_page6' );

//ツールバーの有無設定
function my_show_admin_bar( $content ) {

    if ( current_user_can( 'subscriber' ) ) {
        return false;

    } else {
        return $content;
    }
}
add_filter( 'show_admin_bar' , 'my_show_admin_bar' );


//購読者は管理画面に入れなくする処理
function subscriber_go_to_home( $user_id ) {
    if ( !user_can( $user_id, 'edit_posts' ) ) {
        wp_redirect( get_home_url() );
    }
}
add_action( 'auth_redirect', 'subscriber_go_to_home' );

//会員限定記事に非会員が入った時のエラー403処理
function code_403() {

    $flg_post = get_field('contents_for');


    if ( !empty($flg_post) && $flg_post === 'member' && !is_user_logged_in() && is_single()) {
        status_header(403);
    }
}

add_action('wp', 'code_403');

//ログイン失敗時リダイレクト先変更
function login_failed_redirect()
{
    wp_redirect( home_url('nextclubonline/login')."?error_message=true");
    exit;
}

add_filter( 'wpmem_login_failed', 'login_failed_redirect' );


//セッションを使用するための設定
function init_session_start(){
    session_start();
}
add_action('init', 'init_session_start');

//ログイン成功時に遷移元にリダイレクト
function after_login_redirect( $redirect_to, $user_id ) {
    $ref = $_SESSION['expage'];
    if ($ref) {
        return $ref."?login=success";
    } else {
        return home_url()."?login=success";
    }
}
add_filter( 'wpmem_login_redirect', 'after_login_redirect', 10, 2 );

//ログアウト後のリダイレクト設定
function logout_redirect(){
    wp_safe_redirect(home_url('nextclubonline'));
    exit();
}
add_action('wp_logout','logout_redirect');

//ログインページのラベル変更
function my_wpmem_default_text($text) {
    $text['login_username'] = 'ID';
    return $text;
}
add_filter('wpmem_default_text', 'my_wpmem_default_text');


//カスタム投稿用post_typeセット
function custom_search_template($template){
    if ( is_search() ){
        $post_types = get_query_var('post_type');
        foreach ( (array) $post_types as $post_type )
            $templates[] = "{$post_type}-search.php";
        $templates[] = 'search.php';
        $template = get_query_template('search',$templates);
    }
    return $template;
}
add_filter('template_include','custom_search_template');

// クラシックエディタ用投稿記事のスラッグの連番化
function mycus_serial_number_slug($slug) {
    global $post;
    // 固定ページは無視
    if (($slug) || ($post->post_type == 'page')) {
        return $slug;
    }
    global $wpdb;
    $slug = $wpdb->get_var("select count(cast(post_name as unsigned)) from {$wpdb->posts} where post_type in ( 'information', 'members','case','nextclubonline','interview','gift','review','trip','seminar_report' ,'other','youtube','newsletter') and post_status not in ('object', 'attachment', 'inherit') and post_name regexp '^[0-9]+$'");
    $slug++;
    return sprintf('%05d',$slug);
}

add_filter('editable_slug', 'mycus_serial_number_slug');

//ブロックエディタ用スラッグの連番化(日本語で入力された時のみ）
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    global $wpdb;
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = $wpdb->get_var("select count(cast(post_name as unsigned)) from {$wpdb->posts} where post_type in ( 'information', 'members','case','nextclubonline','interview','gift','review','trip','seminar_report' ,'other','youtube','newsletter') and post_status not in ('object', 'attachment', 'inherit') and post_name regexp '^[0-9]+$'");
        $slug++;
        $slug = sprintf('%05d',$slug);
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );


//ブロックエディター削除
function hide_block_editor( $use_block_editor, $post_type ) {
    if ( $post_type === 'page'  ) return false;
    if ( $post_type === 'case'  ) return false;
    if ( $post_type === 'banner' ) return false;
    return $use_block_editor;
}

add_filter( 'use_block_editor_for_post_type', 'hide_block_editor', 10, 10 );


function add_mimes($mimes)
{
    $mimes['epub'] = 'application/epub+zip';
    return $mimes;
}

add_filter('upload_mimes', 'add_mimes');


function my_disable_redirect_canonical( $redirect_url ) {

    if ( is_page() ){
        $subject = $redirect_url;
        $pattern = '//news|series//';
        preg_match($pattern, $subject, $matches);

        if ($matches){
            $redirect_url = false;
            return $redirect_url;
        }
    }

}

add_filter('redirect_canonical','my_disable_redirect_canonical');



function my_custom_redirect() {
    if ( is_tax( 'next_club_category', 'theway' ) ) {
        wp_safe_redirect( home_url('nextclubonline'));
        exit;
    }
}
add_action( 'template_redirect', 'my_custom_redirect' );




// エラーメッセージの変更
function validation_rule($validation, $data, $Data) {
	$validation->set_rule('age', 'noempty', array('message' => '未選択です。'));
    $validation->set_rule('address1', 'noempty', array('message' => '未入力です。'));
    $validation->set_rule('address2', 'noempty', array('message' => '未入力です。'));
    $validation->set_rule('seminar', 'noempty', array('message' => '未選択です。'));
    $validation->set_rule('people', 'noempty', array('message' => '未選択です。'));
    return $validation;
}
add_filter('mwform_validation_mw-wp-form-2022', 'validation_rule', 10, 3);

function add_mwform_validation_rule( $Validation, $data ) {
    if ( empty( $data['zip1'] )) {
        $Validation->set_rule( 'zip1', 'noempty', array( 'message' => '未入力です。') );
    } elseif ( empty( $data['zip2'] )) {
        $Validation->set_rule( 'zip2', 'noempty', array( 'message' => '未入力です。' ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-2022', 'add_mwform_validation_rule', 10, 2 );
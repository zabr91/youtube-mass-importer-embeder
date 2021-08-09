<?php
add_action( 'init', 'register_product_youtube_video_post_type' );

function register_product_youtube_video_post_type()
{
	register_post_type( 'youtube_video', [
		'label'  => null,
		'labels' => [
			'name'               => 'Видео', // основное название для типа записи
			'singular_name'      => 'Видео', // название для одной записи этого типа
			'add_new'            => 'Добавить видео', // для добавления новой записи
			'add_new_item'       => 'Добавление видео', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование видео',// для редактирования типа записи
			'new_item'           => 'Новый видео', // текст новой записи
			'view_item'          => 'Смотреть видео', // для просмотра записи этого типа.
			'search_items'       => 'Искать видео', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Видео', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-video-alt3',
		'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		//'supports'            => [ 'title', 'editor',  ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'supports'            => [ 'title', 'editor', 'thumbnail','custom-fields',  ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,//false
		'rewrite'             => true,
		'query_var'           => true,
	] );
}
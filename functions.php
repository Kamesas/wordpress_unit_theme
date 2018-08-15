<?php

	add_action( 'init', 'register_post_types_movie' );

	function register_post_types_movie(){
		register_post_type('movie', array(
			'label'  => null,
			'labels' => array(
				'name'               => 'Фильмы', // основное название для типа записи
				'singular_name'      => 'Фильм', // название для одной записи этого типа
				'add_new'            => 'Добавить фильм', // для добавления новой записи
				'add_new_item'       => 'Добавление фильма', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование фильма', // для редактирования типа записи
				'new_item'           => 'Новой фильм', // текст новой записи
				'view_item'          => 'Смотреть фильм', // для просмотра записи этого типа.
				'search_items'       => 'Искать фильм', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Фильмы', // название меню
			),
			'description'         => '',
			'public'              => true,
			'publicly_queryable'  => true, // зависит от public
			'exclude_from_search' => true, // зависит от public
			'show_ui'             => true, // зависит от public
			'show_in_menu'        => true, // показывать ли в меню адмнки
			'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
			'show_in_nav_menus'   => true, // зависит от public
			'show_in_rest'        => true, // добавить в REST API. C WP 4.7
			'rest_base'           => null, // $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-format-video', 
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => array('title','editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => array(),
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		) );
	}



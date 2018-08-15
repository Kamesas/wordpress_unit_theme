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
			'exclude_from_search' => false, // зависит от public
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
			'taxonomies'          => array('Genres', 'yers', 'Сountry', 'actor'),
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		) );
	}


// хук для регистрации
add_action('init', 'create_taxonomy_genres');
function create_taxonomy_genres(){
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy('Genres', array('movie'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Жанры',
			'singular_name'     => 'Жанр',
			'search_items'      => 'Найти жанр',
			'all_items'         => 'Все жанры',
			'view_item '        => 'Смотреть жанр',
			'parent_item'       => 'Родительский жанр',
			'parent_item_colon' => 'Родительский жанр:',
			'edit_item'         => 'Редактировать жанр',
			'update_item'       => 'Обновить жанр',
			'add_new_item'      => 'Добавить новый жанр',
			'new_item_name'     => 'Новое имя жанра',
			'menu_name'         => 'Жанры',
		),
		'description'           => 'Жанры фильмов', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}

add_action('init', 'create_taxonomy_сountry');
function create_taxonomy_сountry(){	
	register_taxonomy('Сountry', array('movie'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Страны',
			'singular_name'     => 'Страна',
			'search_items'      => 'Найти страну',
			'all_items'         => 'Все страны',
			'view_item '        => 'Смотреть страну',
			'parent_item'       => 'Родительская страна',
			'parent_item_colon' => 'Родительская страна:',
			'edit_item'         => 'Редактировать страну',
			'update_item'       => 'Обновить страну',
			'add_new_item'      => 'Добавить новую страну',
			'new_item_name'     => 'Новое имя страны',
			'menu_name'         => 'Страны',
		),
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
	) );
}

add_action('init', 'create_taxonomy_yers');
function create_taxonomy_yers(){	
	register_taxonomy('yers', array('movie'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Год',
			'singular_name'     => 'Год',
			'search_items'      => 'Найти год',
			'all_items'         => 'Все года',
			'view_item '        => 'Смотреть год',
			'parent_item'       => '',
			'parent_item_colon' => '',
			'edit_item'         => 'Редактировать год',
			'update_item'       => 'Обновить год',
			'add_new_item'      => 'Добавить новый год',
			'new_item_name'     => 'Новоый год',
			'menu_name'         => 'Года',
		),
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
	) );
}

add_action('init', 'create_taxonomy_actor');
function create_taxonomy_actor(){	
	register_taxonomy('actor', array('movie'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Актеры',
			'singular_name'     => 'Актер',
			'search_items'      => 'Найти актера',
			'all_items'         => 'Все актеры',
			'view_item '        => 'Смотреть актера',
			'parent_item'       => 'Родиетльский... ',
			'parent_item_colon' => 'Родительский...',
			'edit_item'         => 'Редактировать актера',
			'update_item'       => 'Обновить актера',
			'add_new_item'      => 'Добавить нового актера',
			'new_item_name'     => 'Новый актер',
			'menu_name'         => 'Актеры',
		),
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
	) );
}

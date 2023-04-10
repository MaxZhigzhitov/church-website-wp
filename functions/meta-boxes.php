<?php
/**
 * Initialize the custom Meta Boxes.
 *
 * @package OptionTree
 */

add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @since 2.0
 */
function custom_meta_boxes() {



	$home_page_meta = array(
		'id'       => 'home_meta_box',
		'title'    => 'Настройки главной страницы',
		'desc'     => '',
		'pages'    => array( 'page' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'label' => 'Лента ссылок на главной',
				'id'    => 'intro_links',
				'type'  => 'tab',
			),
			array(
				'label' => 'Показывать ленту ссылок',
				'id'    => 'intro_show',
				'type'  => 'on-off',
				'desc'  => '',
				'std'   => 'on',
			),
			array(
				'id'           => 'intro_list_item',
				'label'        => 'Элемент интро-меню',
				'type'         => 'list-item',
				'condition'    => 'intro_show:is(on)',
				'settings'     => array(
					array(
						'id'           => 'intro_item_title',
						'label'        => 'Заголовок ссылки',
						'desc'         => '',
						'std'          => '',
						'type'         => 'text',
					),
					array(
						'id'           => 'intro_item_link',
						'label'        => 'Ссылка на статью',
						'desc'         => '',
						'std'          => '',
						'type'         => 'text',
					),
					array(
						'id'           => 'intro_item_thumbnail',
						'label'        => 'Миниатюра статьи',
						'desc'         => 'Загрузите изображение для миниатюры статьи на главной странице',
						'std'          => '',
						'type'         => 'upload',
					),
					
				),
			),
			
			array(
				'label' => 'Раздел Жизнь прихода',
				'id'    => 'parish_meta',
				'type'  => 'tab',
			),
			array(
				'id'           => 'parish_section_title',
				'label'        => 'Заголовок раздела',
				'desc'         => '',
				'std'          => '',
				'type'         => 'text',
			),
			array(
				'id'           => 'parish_description',
				'label'        => 'Описание раздела',
				'desc'         => '',
				'std'          => '',
				'type'         => 'textarea',
				'rows'         => '15',
			),
			array(
				'id'           => 'parish_banner_upload',
				'label'        => 'Баннер заголовка раздела',
				'desc'         => 'Загрузите изображение для баннера заголовка на главной странице',
				'std'          => '',
				'type'         => 'upload',
			),
			array(
				'id'           => 'parish_slider',
				'label'        => 'Слайдер раздела',
				'type'         => 'list-item',
				'condition'    => '',
				'settings'     => array(
					array(
						'id'           => 'parish_slider_image',
						'label'        => 'Слайд',
						'desc'         => 'Загрузите изображение для слайда',
						'std'          => '',
						'type'         => 'upload',
					),
					
				),
			),
			array(
				'id'           => 'parish_schedule_image',
				'label'        => 'Иллюстрация ссылки на расписание служб',
				'type'         => 'upload',
				'condition'    => '',
			),
			array(
				'id'           => 'parish_schedule_link',
				'label'        => 'Ссылка на расписание служб',
				'type'         => 'text',
				'condition'    => '',
			),
			array(
				'id'           => 'parish_school_image',
				'label'        => 'Иллюстрация ссылки на страницу воскресной школы',
				'type'         => 'upload',
				'condition'    => '',
			),
			array(
				'id'           => 'parish_school_link',
				'label'        => 'Ссылка на страницу школы',
				'type'         => 'text',
				'condition'    => '',
			),

			array(
				'label' => 'Вопросы и ответы',
				'id'    => 'faq_meta',
				'type'  => 'tab',
			),
			array(
				'id'           => 'faq_item',
				'label'        => 'Вопросы и ответы',
				'type'         => 'list-item',
				'condition'    => '',
				'settings'     => array(
					array(
						'id'           => 'faq_q',
						'label'        => 'Вопрос',
						'desc'         => '',
						'std'          => '',
						'type'         => 'text',
					),
					array(
						'id'           => 'faq_a',
						'label'        => 'Ответ',
						'desc'         => '',
						'std'          => '',
						'type'         => 'text',
					),
					
				),
			),
		),
	);
	
	
	
	/**
	 * Create a custom meta boxes array that we pass to
	 * the OptionTree Meta Box API Class.
	 */
	$my_meta_box = array(
		'id'       => 'demo_meta_box',
		'title'    => __( 'Demo Meta Box', 'theme-text-domain' ),
		'desc'     => '',
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'label' => __( 'Conditions', 'theme-text-domain' ),
				'id'    => 'demo_conditions',
				'type'  => 'tab',
			),
			array(
				'label' => __( 'Show Gallery', 'theme-text-domain' ),
				'id'    => 'demo_show_gallery',
				'type'  => 'on-off',
				'desc'  => sprintf( __( 'Shows the Gallery when set to %s.', 'theme-text-domain' ), '<code>on</code>' ),
				'std'   => 'off',
			),
			array(
				'label'     => '',
				'id'        => 'demo_textblock',
				'type'      => 'textblock',
				'desc'      => __( 'Congratulations, you created a gallery!', 'theme-text-domain' ),
				'operator'  => 'and',
				'condition' => 'demo_show_gallery:is(on),demo_gallery:not()',
			),
			array(
				'label'     => __( 'Gallery', 'theme-text-domain' ),
				'id'        => 'demo_gallery',
				'type'      => 'gallery',
				'desc'      => sprintf( __( 'This is a Gallery option type. It displays when %s.', 'theme-text-domain' ), '<code>demo_show_gallery:is(on)</code>' ),
				'condition' => 'demo_show_gallery:is(on)',
			),
			array(
				'label' => __( 'More Options', 'theme-text-domain' ),
				'id'    => 'demo_more_options',
				'type'  => 'tab',
			),
			array(
				'label' => __( 'Text', 'theme-text-domain' ),
				'id'    => 'demo_text',
				'type'  => 'text',
				'desc'  => __( 'This is a demo Text field.', 'theme-text-domain' ),
			),
			array(
				'label' => __( 'Textarea', 'theme-text-domain' ),
				'id'    => 'demo_textarea',
				'type'  => 'textarea',
				'desc'  => __( 'This is a demo Textarea field.', 'theme-text-domain' ),
			),
		),
	);

	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	if ( function_exists( 'ot_register_meta_box' ) ) {
		ot_register_meta_box( $my_meta_box );

		$post_id = isset($_GET['post']) ? $_GET['post'] : ( isset($_POST['post_ID']) ? $_POST['post_ID'] : 0);
		$template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
		if($template_file == 'home.php'){
			ot_register_meta_box( $home_page_meta );
		}
	}
}

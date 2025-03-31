<?php
add_action('init', function () {
    register_post_type(
        'products',
        array(
            'labels' => array(
                'name' => '1Продукты',
                'singular_name' => '2Продукт',
                'add_new' => '3Добавить продукт',
                'add_new_item' => '4Добавить новый продукт',
                'edit_item' => '5Изменить продукт',
                'new_item' => '6Новый продукт',
                'view_item' => '7Просмотр продукта',
                'search_items' => '8Найти продукт',
                'not_found' => '9Продуктов не найдено',
                'not_found_in_trash' => '10В корзине нет продуктов',
                'parent_item_colon' => '11Родительский продукт',
                'all_items' => '12Все продукты',
                'archives' => '13Архивы продуктов',
                'menu_name' => '14Продукты',
                'name_admin_bar' => '15Продукт',
                'view_items' => '16Просмотр продуктов',
                'attributes' => '17Свойства продукта',

                'insert_into_item' => '18Вставить в продукт',
                'uploaded_to_this_item' => '19Загружено для этого продукта',
                'featured_image' => '20Изображение продукта',
                'set_featured_image' => '21Установить изображение продукта',
                'remove_featured_image' => '22Удалить изображение продукта',
                'use_featured_image' => '23Использовать как изображение продукта',

                'item_updated' => '24Продукт обновлён.',
                'item_published' => '25Продукт добавлен.',
                'item_published_privately' => '26Продукт добавлен приватно.',
                'item_reverted_to_draft' => '27Продукт сохранён как черновик.',
                'item_scheduled' => '28Публикация продуктф запланирована.',
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-products',
            'show_in_rest' => true,
        )
    );

    register_taxonomy('category', 'products', array(
        'label' => __('Категории'),
        'rewrite' => array('slug' => 'category'),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rest_base' => 'category',
    ));

    register_post_type(
        'advantages',
        array(
            'labels' => array(
                'name' => '1Преимущества',
                'singular_name' => '2Преимущество',
                'add_new' => '3Добавить преимущество',
                'add_new_item' => '4Добавить новое преимущество',
                'edit_item' => '5Изменить преимущество',
                'new_item' => '6Новое преимущество',
                'view_item' => '7Просмотр преимущества',
                'search_items' => '8Найти преимущество',
                'not_found' => '9Преимуществ не найдено',
                'not_found_in_trash' => '10В корзине нет преимуществ',
                'parent_item_colon' => '11Родительское преимущество',
                'all_items' => '12Все преимущества',
                'archives' => '13Архивы преимуществ',
                'menu_name' => '14Преимущества',
                'name_admin_bar' => '15Преимущество',
                'view_items' => '16Просмотр преимуществ',
                'attributes' => '17Свойства преимущества',

                'insert_into_item' => '18Вставить в преимущество',
                'uploaded_to_this_item' => '19Загружено для этого преимущества',
                'featured_image' => '20Изображение преимущества',
                'set_featured_image' => '21Установить изображение преимущества',
                'remove_featured_image' => '22Удалить изображение преимущества',
                'use_featured_image' => '23Использовать как изображение преимущества',

                'item_updated' => '24Преимущество обновлёно.',
                'item_published' => '25Преимущество добавлено.',
                'item_published_privately' => '26Преимущество добавлено приватно.',
                'item_reverted_to_draft' => '27Преимущество сохранёно как черновик.',
                'item_scheduled' => '28Публикация преимущества запланирована.',
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-star-filled',
            'show_in_rest' => true,
        )
    );

    register_post_type(
        'reviews',
        array(
            'labels' => array(
                'name' => '1Отзывы',
                'singular_name' => '2Отзыв',
                'add_new' => '3Добавить отзыв',
                'add_new_item' => '4Добавить новый отзыв',
                'edit_item' => '5Изменить отзыв',
                'new_item' => '6Новый отзыв',
                'view_item' => '7Просмотр отзыва',
                'search_items' => '8Найти отзыв',
                'not_found' => '9Отзывов не найдено',
                'not_found_in_trash' => '10В корзине нет отзывов',
                'parent_item_colon' => '11Родительский отзыв',
                'all_items' => '12Все отзывы',
                'archives' => '13Архивы отзывов',
                'menu_name' => '14Отзывы',
                'name_admin_bar' => '15Отзыв',
                'view_items' => '16Просмотр отзыва',
                'attributes' => '17Свойства отзыва',

                'insert_into_item' => '18Вставить в отзыв',
                'uploaded_to_this_item' => '19Загружено для этого отзыва',
                'featured_image' => '20Изображение отзыва',
                'set_featured_image' => '21Установить изображение отзыва',
                'remove_featured_image' => '22Удалить изображение отзыва',
                'use_featured_image' => '23Использовать как изображение отзыва',

                'item_updated' => '24Отзыв обновлён.',
                'item_published' => '25Отзыв добавлен.',
                'item_published_privately' => '26Отзыв добавлено приватно.',
                'item_reverted_to_draft' => '27Отзыв сохранёно как черновик.',
                'item_scheduled' => '28Публикация отзыва запланирована.',
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-archive',
            'show_in_rest' => true,
        )
    );
});
<?php 
// Добавляем метабокс для галереи
function add_product_gallery_metabox() {
    add_meta_box(
        'product_gallery_metabox', // ID метабокса
        'Product Gallery',         // Название метабокса
        'render_product_gallery_metabox', // Функция для вывода содержимого
        'products',                // Тип записи (посты типа 'products')
        'normal',                  // Расположение
        'high'                     // Приоритет
    );
}
add_action('add_meta_boxes', 'add_product_gallery_metabox');

// Функция для вывода поля галереи
function render_product_gallery_metabox($post) {
    // Получаем уже сохраненные ID изображений
    $gallery_ids = get_post_meta($post->ID, '_product_gallery', true);
    if (!is_array($gallery_ids)) {
        $gallery_ids = [];
    }

    // Выводим поле для выбора изображений
    ?>
    <div class="product-gallery">
        <ul id="product-gallery-images">
            <?php foreach ($gallery_ids as $image_id): ?>
                <li class="gallery-item">
                    <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                    <input type="hidden" name="_product_gallery[]" value="<?php echo esc_attr($image_id); ?>" />
                    <a href="#" class="remove-image">Удалить</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="#" class="add-image button">Добавить изображения</a>
    </div>
    <script type="text/javascript">
        jQuery(function($){
            var mediaFrame;
            
            // Кнопка для добавления изображений
            $('.add-image').click(function(e) {
                e.preventDefault();
                if (mediaFrame) {
                    mediaFrame.open();
                    return;
                }

                mediaFrame = wp.media.frames.mediaFrame = wp.media({
                    title: 'Выберите изображения',
                    button: {
                        text: 'Добавить изображения'
                    },
                    multiple: true
                });

                mediaFrame.on('select', function() {
                    var selection = mediaFrame.state().get('selection');
                    selection.each(function(attachment) {
                        var image_id = attachment.id;
                        var image_url = attachment.url;
                        var image_thumb = attachment.attributes.url;
                        var new_item = '<li class="gallery-item"><img src="'+image_thumb+'" /><input type="hidden" name="_product_gallery[]" value="'+image_id+'" /><a href="#" class="remove-image">Удалить</a></li>';
                        $('#product-gallery-images').append(new_item);
                    });
                });

                mediaFrame.open();
            });

            // Удаление изображений из галереи
            $(document).on('click', '.remove-image', function(e) {
                e.preventDefault();
                $(this).closest('li').remove();
            });
        });
    </script>
    <?php
}


// Обработчик для сохранения данных в метабоксе
function save_product_gallery($post_id) {
    // Проверка на автосохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // Проверка прав доступа
    if (!current_user_can('edit_post', $post_id)) return $post_id;

    // Проверка, существует ли наше поле
    if (isset($_POST['_product_gallery'])) {
        // Сохраняем данные поля
        $gallery_data = array_map('intval', $_POST['_product_gallery']); // Преобразуем в массив целых чисел
        update_post_meta($post_id, '_product_gallery', $gallery_data);
    } else {
        // Если галерея пуста, удаляем мета-данные
        delete_post_meta($post_id, '_product_gallery');
    }
    return $post_id;
}
add_action('save_post', 'save_product_gallery');

?>
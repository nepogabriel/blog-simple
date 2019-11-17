<?php

//Chamar a tag title e adicionar os formatos de posts
function blogsimple_theme_support() {
	
	//Chamar a tag title
	add_theme_support('title-tag');

	//Adicionar os formatos de posts
	add_theme_support('post-formats', array('aside', 'image'));

	//Adicionar logo no tema
	add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'blogsimple_theme_support');

//Prevenir erro na tag title em versões antigas
if(!function_exists('_wp_render_title_tag')) {
	function blogsimple_render_title() {
		?>
		<title><?php wp_title('|', true, 'right'); ?></title>
		<?php
	}
	add_action('wp_head', 'blogsimple_render_title');
}

//Registra o Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

//Registrar os menus
register_nav_menus( array(
	'principal' => __('Menu principal', 'blogsimple')
));

//Definir as imagens destacadas dos posts
add_theme_support('post-thumbnails');
// (Ñ ESTÁ FUNCIONANDO, APRENDER! era pra deixar as imagens padrão)
set_post_thumbnail_size( 1280, 720, true );

// Definir o tamanho do resumo
add_filter( 'excerpt_length', function($length) {
	return 55;
} );

//Definir estilo da paginação
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts-link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	return 'class="btn btn-outline-success"';
}

// Criando sidebar
register_sidebar(
	array(
		'name' => 'Barra lateral',
		'id' => 'sidebar',
		'before_widget' => '<div class="card mb-3">',
		'after_widget' => '</div></div>',
		'before_title' => '<h5 class="card-header text-success bg-dark text-center">',
		'after_title' => '</h5><div class="card-body">'
	)
);

// Criando o campo de busca
register_sidebar(
	array(
		'name' => 'Busca',
		'id' => 'busca',
		'before_widget' => '<div class="blog-search">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	)
);

//Ativar JS para ñ recarregar a pág. p/ responder comentários
function theme_queue_js() {
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) wp_enqueue_script('comment-reply');
}
add_action('wp_print_scripts', 'theme_queue_js');

//Personalizar os comentários
function format_comment($comment, $args, $depth) {

	$GOLBALS['comment'] = $comment; ?>

	<div <?php comment_class('ml-3') ?> id="comment-<?php comment_ID(); ?>">
		<div class="card border-success mb-3">
			<div class="card-body">

				<div class="comment-intro">
					<h5 class="card-title"><?php printf(__('%s'), get_comment_author_link()) ?></h5>
					<h6 class="card-subtitle mb-3 text-muted">Comentou em <?php printf(__('%1$s'), get_comment_date('d/m/y'), get_comment_time()) ?></h6>
				</div>

				<?php comment_text(); ?>

				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</div>
	

<?php
}

//Incluir as funções de personalização (header e footer)
require get_template_directory(). '/inc/function-header.php';

?>
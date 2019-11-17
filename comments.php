<!-- Confere se é post ou página -->
<?php if ( is_single() || is_page() ) : ?>

<!-- Os comentários estão dentro dessa div -->
<div class="blog-comentarios">

    <!-- Confere se tem comentários -->
    <?php if ( have_comments() && comments_open() ) : ?>

        <!-- Diz quantos comentários tem -->
        <h5 id="comentarios" class="mb-3">
            <?php comments_number(__('comentários'), __('1 comentário'), '%' . __(' comentários')); ?>
        </h5>

        <!-- Organiza os comentários -->
        <div class="list-unlysted">
            <?php wp_list_comments( array(
                'style' => 'div',
                'type' => 'comment',
                //chamando personalização dos comentários feita no functions.php
                'callback' => 'format_comment'
            )); ?>
        </div>

        <?php $comments_arg = array(
            'title_reply' => 'Escreva seu comentário',
            //título
            'title_reply_before' => '<h6 id="reply-title" class="comment-reply-title mt-4">',
            'title_reply_after' => '</h6>',
            //estilo botão
            'class_submit' => 'btn btn-success',
            //aviso de que o e-mail não será publicado
            'comment_notes_before' => '<p>Seu e-mail não será publicado.</p>',
            //algumas info e estilização com html e bs4
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' => '<div class="row"><div class="col-md-6 col-sm-12"><div class="form-group">' .
                            '<label class="control-label" for="author">' . __('Seu nome') . '</label>' .
                            ( $req ? '<span>*</span>' : '' ) .
                            '<input id="author" class="form-control" name="author" type="text" value="' .
                            esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . '/></div></div>',
                'email' =>  '<div class="col-md-6 col-sm-12"> <div class="form-group">' .
                            '<label class="control-label" for="email">' . __('Seu e-mail') . '</label>' . 
                            ( $req ? '<span>*</span>' : '' ) . 
                            '<input id="email" class="form-control" name="email" type="text" value="' .
                            esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . '/></div></div></div>',
            ) ),
                'comment_field' => '<p>' .
                                    '<textarea id="comment" class="form-control" placeholder="Escreva seu comentário..." name="comment" rows="3"
                                    aria-required="true"></textarea>' . '</p>',
                                    'comment_notes_after' => '',

                
            );

            comment_form($comments_arg);

        ?>

        <!-- Se ñ tiver comentarios irá aparecer somente o formulario -->
        <?php else : if ( comments_open() ) ?>

            <?php $comments_arg = array(
                'title_reply' => 'Escreva seu comentário',
                //título
                'title_reply_before' => '<h6 id="reply-title" class="comment-reply-title mt-4">',
                'title_reply_after' => '</h6>',
                //estilo botão
                'class_submit' => 'btn btn-success',
                //aviso de que o e-mail não será publicado
                'comment_notes_before' => '<p>Seu e-mail não será publicado.</p>',
                //algumas info e estilização com html e bs4
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' => '<div class="row"><div class="col-md-6 col-sm-12"><div class="form-group">' .
                                '<label class="control-label" for="author">' . __('Seu nome') . '</label>' .
                                ( $req ? '<span>*</span>' : '' ) .
                                '<input id="author" class="form-control" name="author" type="text" value="' .
                                esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . '/></div></div>',
                    'email' =>  '<div class="col-md-6 col-sm-12"> <div class="form-group">' .
                                '<label class="control-label" for="email">' . __('Seu e-mail') . '</label>' . 
                                ( $req ? '<span>*</span>' : '' ) . 
                                '<input id="email" class="form-control" name="email" type="text" value="' .
                                esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . '/></div></div></div>',
                ) ),
                    'comment_field' => '<p>' .
                                        '<textarea id="comment" class="form-control" placeholder="Escreva seu comentário..." name="comment" rows="3"
                                        aria-required="true"></textarea>' . '</p>',
                                        'comment_notes_after' => '',

                    
                );

                comment_form($comments_arg);

            ?>

    <?php endif; ?>

</div>

<?php endif; ?>
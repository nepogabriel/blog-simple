    <!-- FOOTER -->
    <div class="w-100 bg-dark text-light mt-5 border-top border-success">
      <div class="container">
        <div class="row">
          <div class="col py-5" align="center">
            <h5 class="text-success"><?php echo get_theme_mod('footer_title', 'Blog Simple - Version Beta 0.1'); ?></h5>
            <p class="border-top border-secondary text-secondary mb-0"><?php echo get_theme_mod('footer_text', '© Todos os direitos reservados.'); ?></p>
          </div>
        </div>
      </div>
    </div>

    <?php wp_footer(); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php bloginfo('template_url') ?>/js/jquery.js"></script>
    <script src="<?php bloginfo('template_url') ?>/js/popper.js"></script>
    <script src="<?php bloginfo('template_url') ?>/js/bootstrap.js"></script>
  </body>
</html>
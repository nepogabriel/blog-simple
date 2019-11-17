<form role="search" method="get" action="<?php echo home_url('/'); ?>">

    <div class="input-group input-group-append">

        <input type="search" class="form-control" placeholder="o que procura?" value="<?php echo get_search_query(); ?>" name="s"/>

        <div class="input-group-append">
            <button class="btn btn-success" type="submit">Buscar</button>
        </div>

    </div>

</form>
<form class="d-flex" action="<?php echo base_url(); ?>index.php/anuncio/busquedageneral" method="POST">
        <input name="textoBusqueda" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" value="<?php if (isset($textoBusqueda)) {
          echo $textoBusqueda;
        } ?>">
        <button class="btn btn-outline-primary btn-lg" type="submit">Buscar</button>
</form>
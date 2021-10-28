$(document).ready(function() { 
    $('#btnFiltroCategoria').on('click', function(e){
        //alert('click en boton buscar')
        const idCategoriaActual=$(this).data('idcategoria');
        e.preventDefault();
        //console.log($('#formCamposCategoria').serializeArray());
        const parametros=$('#formCamposCategoria').serializeArray();
        const data = {
            idCategoria: idCategoriaActual,
            campos: parametros
        }
        $.ajax({
          type: "POST",
          url: "resultadoAnuncio",
          data: data,
          cache: false,
          success: function(data){
             $("#resultadoFiltroCategoria").html(data);
          }
        });
    })
});



  
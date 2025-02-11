$(buscar_datos());



function buscar_datos(consulta)
{

    $.ajax({
         url:'buscartabla.php',
         type:'POST',
         datatype:'html',
         data:{consulta:consulta},


    })

.done(function(respuesta)
{

$("#datos").html(respuesta);

})

.fail(function(){

    console.log("Error");


})



}

$(document).on('keyup','#busqueda-modificar', function(){

var valor=$(this).val();

if(valor!=""){

 buscar_datos(valor);

}

else{

    buscar_datos();

}

});



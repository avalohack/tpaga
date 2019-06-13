$(document).ready( function(){ //_inicio_1
  //hacemos focus al campo de búsqueda
  $("#Producto").last().focus(); 
      //comprobamos si se pulsa una tecla
      $("#Producto").last().keyup(function(e){ //_inicio_2
          if( this.value.length < 4 ) return;
            var consulta;
            consulta = $("#Producto").last().val();
            $.ajax({ //_inicio_3
              type: typo_peticion,
              url: url_peticion+consulta,
              dataType: "html",
                  beforeSend: function(){//_fin_4 //imagen de carga                      
                          $("#load").html("<img src='"+load+"'/>");
                      },//_fin_4
                  error: function(){//_fin_5                      
                          $('#valores_busqueda').append('<p>Peticion no permitida</p>');
                      },//_fin_5
                  success: function(data)
                      {//_fin_6 
                        if ($('#valores_busqueda').length ==0) {//if
                              $('#resultado_busqueda').append('<div class="row">'+                                                                 
                                                                  '<div id="valores_busqueda" class="col-sm-12">'+
                                                                     /////////////////////////// contenido central inicia //////////////////////
                                                                     /////////////////////////// contenido central inicia //////////////////////
                                                                  '</div>'+                                                                
                                                              '</div>'); //añadimos un elemento para resultados
                            }//if
                        else{//elese
                              $('#valores_busqueda').empty()
                            }//else
                        var vector = JSON.parse(data); //proseamos la data para recorrerla
                        //alert(vector);
                        if (vector == "error"){//if
                                $('#valores_busqueda').append('<p class="text-center m-auto">No hay resultados para mostrar</p>');
                            }//if
                        else{//else
                             //tabla detalles busqueda 
                              $('#valores_busqueda').append(
                                '<table class="table table-striped  text-secondary">'+
                                  '<thead>'+
                                    '<tr>'+
                                      '<th></th>'+
                                      '<th>No. Factura</th>'+
                                      '<th>Facturado A</th>'+
                                      '<th>Cufe</th>'+
                                      '<th>Fecha de Factura</th>'+
                                      '<th>Valor total</th>'+
                                      //'<th>acuse</th>'+
                                      '<th></th>'+
                                    '</tr>'+
                                  '</thead>'+
                                  '<tbody id="td_body">'); 
                              $.each(vector, function (index, value){//8 
   
                             var acuse =value['acuse'];                    
                             //console.log(value['acuse']);
                                $('#td_body').append('----<tr>'+
                                  '<td class="'+value['response']+'"></td>'+
                                  '<td>'+value['Enca_Prefijo']+value['Enca_Numero']+'</td>'+
                                  '<td>'+value['Enca_Terc_Nombre']+'<br>'+value['Enca_Terc_Codigo']+'</td>'+

                                  '<td>'+value['cufe']+'</td>'+

                                  '<td>'+value['Enca_Fecha']+'</td>'+
                                  '<td>'+value['Totales_Valor_Total']+'</td>'+

                                 // '<td  class="'+value['response']+'"> <textarea> '+value['comments']+'</textarea> </td>'+
                                  '<td>'+
                                  '<a href="'+value['download']+'" title="Descargar XML Firmado" class="text-secondary">'+
                                    '<span class="fa fa-download">&nbsp;&nbsp;</span>'+
                                  '</a>'+
                                  '<a href="#" title="Renviar  Correo" class="text-secondary">'+
                                     '<span class="fa fa-envelope">&nbsp;&nbsp;</span>'+
                                  '</a>'+
                                  '<a href="'+value['pdf']+'" title="Generar PDF de Documento" class="text-secondary" target="_blank">'+
                                      '<span class="fa fa-file-pdf">&nbsp;&nbsp;</span>'+
                                  '</a>'+


                                  '<a href="'+value['acuse']+'"  title="Acuse entregado por la DIAN" class="text-secondary" target="_blank">'+
                                      '<span class="fa fa-scroll">&nbsp;&nbsp;</span>'+
                                  '</a>'+



                                // '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">'+
                                //   'Open modal'+
                                // '</button>'+

                               /// '<code><pre>'+acuse+'</pre></code>'+

                                // '<a href="#myModal" data-toggle="modal" onclick="myFunction('+'\''+acuse+'\''+')" >Display code</a>'+



                                '</td>'+
                              '</tr>');
                              });//8
      $('#valores_busqueda').append('</tbody>'+
                                '</table>');                           
                            }//else                        
                      },//_fin_6
                  complete: function(){//_fin_7
                      $('#load').remove();
                  },//_fin_7
                });//_fin_3
      });//_fin_2
//boton de limpiar busqueda
$("#limpiar_busqueda").click(function(){
  $("#valores_busqueda").empty();
  $('#Producto').val('');
  $("#Producto").last().focus(); 
});


});//_fin_1


function myFunction(acuse) {

  console.log(acuse);

  $('#acuse').append('<div>'+acuse+'</div>'); 
  //document.getElementById("demo").innerHTML = "Hello World";
}
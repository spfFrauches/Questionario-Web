/* CONTEUDO FOCADO NO DRAG AND DROP JQUERY */
/* Por Saulo Frauches */
/* Utilizando o Jquery com a biblioteca Drag and Drop */

var idPerguntaQuestionario   = 0 ;
var numPerguntasQuestionario = 0 ;
var perguntasRetiradas       = 0 ;

$( function() {
    
    /* Tornando as div com ID arrastaveis */
       
    $( "#item-cx-1" ).draggable({ 
        revert: true
    });
    
    $( "#item-cx-2" ).draggable({ 
        revert: true
    });

    /* Tornando as div com ID dos formularios arrastados arrastaveis */
    
    $( "#item-cx-form-1" ).draggable({ 
        revert: true
    });
    
    $( "#item-cx-form-2" ).draggable({ 
        revert: true
    });
           
    /* Escondendo os os inputs do formulário */
    
    $( "#item-cx-form-1" ).hide();  
    
    /* Tornando os itens dentro da caixa de criação do formulario moveis, podendo trocar de lugares */ 
    
    $( "#formulario-body" ).sortable({
        change: function( event, ui ) {    
           var x = $("#formulario-body").sortable("instance");
           /* console.log(x); */
        }       
    });

    /* Tornando a caixa de formulario (onde esta montando o formulario) dropavel, soltavel */
    /* Ou seja o que é arrastado pode ser soltado aqu dentro  */
              
    $( "#caixa-formulario" ).droppable({
                              
        accept: "#item-cx-1, #item-cx-form-1, #item-cx-2, #item-cx-form-2" , 
                     
        over: function(event, ui) {
            /* mudando de cor */
            $("#formulario-body").css("background-color", "#e9ecef");
        },
        
        /* Quando é soltado aqui dentro (o que foi arrastado) */
        
        drop: function( event, ui ) {
            
            numPerguntasQuestionario = numPerguntasQuestionario +1;
            console.log("Qtd Perguntas no drop.: "+ numPerguntasQuestionario);
            
            idPerguntaQuestionario =  idPerguntaQuestionario + 1;
            
            $("#formulario-body").css("background-color", "#fff");                          
                                                    
            if ( ui.draggable.attr('id') == "item-cx-1") {
                textoSimples( ui.draggable, idPerguntaQuestionario ) ;              
            }
                        
            if ( ui.draggable.attr('id') == "item-cx-2") {                                                   
                selectHTML ( ui.draggable, idPerguntaQuestionario);
                $( "#item-cx-2-form" ).show(); 
            }
            
            /*
            var numAdd = 1;
            var vendoIDs = ui.draggable.attr('id') + numAdd;
            alert('Adicionando - Item ID.:' + vendoIDs  + ' dentro de:  ' + event.target.id + 'ID: ');
            */           
        },
        
    });
    
   
    function textoSimples ($item, idPergunta) {
        
        $item.fadeOut(function() {  
            
            $item.fadeIn(function() {  
                
                $( "#item-cx-form-1" ).clone().appendTo( "#formulario-body" ); 
                $( "#formulario-body > #item-cx-form-1" ).last().prepend("<input type='hidden' name='idPergunta[]' value= '"+idPerguntaQuestionario+"'>");
                $( "#formulario-body > #item-cx-form-1 > .form-group" ).last().prepend("<input type='text' name='descricaoPergunta-id-"+idPerguntaQuestionario+"[]' class='form-control'>");                
                $( "#formulario-body > #item-cx-form-1 > .form-group" ).last().prepend("<input type='hidden' name='campoHTML-id-"+idPerguntaQuestionario+"[]' value='inputHTML' >");                
                $( "#formulario-body > #item-cx-form-1" ).show();                 
                console.log("id.pergunta = " +idPerguntaQuestionario);   
                
            }); 
            
        });  
        
    }

    function selectHTML( $item, idPergunta ) {
        
        $item.fadeOut(function() {
            
            $item.fadeIn(function() {
                
                $( "#item-cx-2-form" ).clone().appendTo( "#formulario-body" );
                $( "#formulario-body > #item-cx-2-form" ).last().prepend("<input type='hidden' name='idPergunta[]' value= '"+idPerguntaQuestionario+"'>");                               
                $( "#formulario-body > #item-cx-2-form > .form-group > .row > .camposelect" ).last().prepend("<input type='text' class='tituloPergunta' id='tituloPerguntaSelectHTML' name='descricaoPergunta-id-"+idPerguntaQuestionario+"[]'>");               
                $( "#formulario-body > #item-cx-2-form > .form-group > .row > .camposelect" ).last().prepend("<input type='hidden' name='campoHTML-id-"+idPerguntaQuestionario+"[]' value='selectHTML'>");
                
                $( "#itens > #item-cx-2-form" ).hide(); 
                
                console.log("id.pergunta = " +idPerguntaQuestionario);
                
            }); 
            
        });
        
    }
    
    function toggleHTML( $item ) {
        $item.fadeOut(function() {
            $item.fadeIn(function() {
                $( "#item-lx-3-form" ).clone().appendTo( "#formulario-body" );
                $( "#itens > #item-lx-3-form" ).hide();        
            });            
        });
    }
    
    function fotoHTML( $item ) {
        $item.fadeOut(function() {
            $item.fadeIn(function() {
                $( "#item-lx-4-form" ).clone().appendTo( "#formulario-body" );
                $( "#itens > #item-lx-4-form" ).hide();        
            });            
        });
    }
 
});

var contarSelectHTML = 0;

async function addOptionSelectHTML(x) {
        
    const { value: opcoes } = await Swal.fire({
        title: 'Inserir opções na lista',
        input: 'text',
        inputPlaceholder: 'insira a opção',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        }
    });

    if (opcoes) {
        
        var selectHTMLForm = $(x).parents("#item-cx-2-form");
        selectHTMLForm.append("<input type='hidden' name='opcaoSelect-id-pergunta-"+idPerguntaQuestionario+"[]' value='"+opcoes+"'>");
        selectHTMLForm.find("#opcoes1").append('<option>'+opcoes+'</option>');
        
        /* Swal.fire(`Inserido: ${opcoes}`); */
        
        Swal.fire({
            
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }, 
            title: `Inserido: ${opcoes}`,
            
        });

    }

}



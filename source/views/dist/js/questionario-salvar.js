/* CONTEUDO FOCADO AO SALVAR O QUESTIONÁRIO  */

$( "#load" ).hide();
  
$( "#qst_form" ).submit(function( event ) {
           
    var nomequestionario = $("#nome_questionario").val();

    if ( nomequestionario == '') {
            
        let timerInterval
        
        $( "#nome_questionario" ).css( "border", "3px solid red " );
        $("#nome_questionario").css("background-color","#fdbfbf");
        Swal.fire({
            title: 'Ops, verifique...',
            html: '<b>Nome (Titulo) </b> do questionário não informado.',
            timer: 3000,
            timerProgressBar: true,
            icon: 'error',
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
        /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
              console.log('I was closed by the timer')
            }
        })
         
        return false;   

    } else {
        
        $("#nome_questionario").css( "border", "1px solid black" );
        $("#nome_questionario").css("background-color","#fff");
                
        alert( "Salvando o formulário..." );      
        /* firula para a imagem do load... */
        $( "#areaquestionario" ).hide();
        $( "#load" ).show(); 
        event.preventDefault();

        /* recebendo dados do formulario html */
        var post_url = $(this).attr("action"); 
        var request_method = $(this).attr("method"); 
        var form_data = $(this).serialize(); 
        
        $.ajax({     
            url : post_url,
            type: request_method,
            data : form_data
        }).done(function(response){   
            console.log(request_method);
            console.log(form_data);
            console.log(response);
            $("#msgSalvar").html(response);
        });

        setTimeout( function() {
            $( "#areaquestionario" ).show();
            $( "#load" ).hide();
        }, 1400); 

    }           
                                          
});
    



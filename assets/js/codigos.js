$(document).ready(function() {	

   var base_url = 'http://localhost/cdpv/';

   $(".telefone").mask("(99)9999-9999");
   $(".data_nascimento").mask("99/99/9999");


   $(".celular").click(function () 
   {
        var phone, element; element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if (phone.length > 10) {
            element.mask("(99)99999-999?9");
        }
        else {
            element.mask("(99)9999-9999?9");
        }
    });

  
    function buscar_cidades(estado, cidade_selecionada = null)
    { 
        $.ajax
        ({
            url: base_url + 'estados/pesquisar',
            type: 'GET', 
            data: {estado: estado},
            dataType: 'json',
            success: function(data) 
            {   
                var opcoes = '';

                $.each(data.cidade, function (i, item)
                {
                    if(item.id == cidade_selecionada)
                    {
                        opcoes += "<option value='" + item.id + "' selected>" + item.nome + "</option>";
                    }
                    else
                        opcoes += "<option value='" + item.id + "'>" + item.nome + "</option>";
                });

                $("select[name='cidade']").html(opcoes);

            }
        }); 
    }


    $(".selecionar_cidade").on('change', function()
    {
    	var estado =  $(this).val();
        var cidade = null;
        buscar_cidades(estado, cidade);
    }); 


    if($.isNumeric($('input:hidden[name=callback_cidade]').val()))
    {
        var estado = $("select[name='estado']").val();
        var cidade_selecionada = $('input:hidden[name=callback_cidade]').val();
        buscar_cidades(estado, cidade_selecionada);
    }


});
function SwalDelete(rotaUrl, fcod) {
    //console.log(rotaUrl);
    swal({
        title: 'Atenção!',
        text: "Tem certeza de que deseja excluir este registro? Esta ação é irreversível e você não poderá recuperar os registros excluídos.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Continuar',
        showLoaderOnConfirm: true,
        preConfirm: function () {
            return new Promise(function (resolve) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                        url: rotaUrl,
                        method:'DELETE',
                        data: {
                            _token: CSRF_TOKEN,
                            id: fcod,
                        },
                        dataType: 'json'
                    })
                    .done(function (resposta) {
                        if(resposta.situacao == 1){
                            swal(resposta.title, resposta.message, resposta.status);
                            window.location.reload();//uso temperorario
                        }else{
                            swal('Oops...', 'Não foi possivel deletar registro', 'error');    
                        }
                    })
                    .fail(function (resposta) {
                        swal('Oops...', 'Algo deu errado com ajax!', 'error');
                    });
            });
        },
        allowOutsideClick: false
    });
}
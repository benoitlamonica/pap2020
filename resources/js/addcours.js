require('./bootstrap');
//ADD
var button = $('.add-cours-btn');
var _token = $('meta[name="csrf-token"]').attr('content');
var route = button.attr('route');
var redirect = button.attr('addchap');
button.click(() => {
    var name = $('.add-cours-input').val();
    $.ajax({
        url: route,
        type: 'POST',
        dataType: 'JSON',
        data: {
            _token,
            name
        },
        success: function (data) {
            if (confirm(data.message + '\r\n Voulez vous ajouter un chapitre ?')) {
                window.location.href = redirect;
            }
            $('.add-cours-list').append('<div class="add-cours-list-cour"><span class="add-cours-nomcours">' + name + '</span><button idcours="' + data.lastId + '" class="delete-cours">X</button></div>');
            deleteButton = $('.delete-cours');
        }
    });
});

//DELETE
var deleteButton = $('.delete-cours');
var deleteRoute = deleteButton.attr('route');
deleteButton.click(function (e) {
    var targetElem = e.target;
    var id = $(targetElem).attr('idcours');
    console.log(targetElem.parentElement);
    if (confirm('Vous êtes sur le point de supprimer le cours, en êtes vous sûr ? Ceci va supprimer tout les chapitre correspondant à ce cours.')) {
        $.ajax({
            url: deleteRoute,
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token,
                id
            },
            success: function (deldata) {
                targetElem.parentElement.innerHTML = '<span style="color:red">Supprimé !</span>';
                alert(deldata);
            }
        });
    }
});

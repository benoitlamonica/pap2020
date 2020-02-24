require('./bootstrap');
//Prevent Link to open new tab
var allLink = document.querySelectorAll('a');
for(var i = 0; i < allLink.length; i++){
    allLink[i].addEventListener('click', function(e){
        e.preventDefault();
        var getHref = this.getAttribute('href');
        console.log(getHref);
        if(getHref != null){
            window.location.href = getHref;
        }
    });
}

//APP
$('.menu-list_of_cours').hover(function () {
    $('.menu-cours-li').css({
        backgroundColor: '#3490dc'
    });
    $('.menu-cours').css({
        color: 'white'
    });
}, function () {
    $('.menu-cours-li').css({
        backgroundColor: 'white'
    });
    $('.menu-cours').css({
        color: '#3490dc'
    });
});

$('.menu-cours').hover(() => {
    $('.menu-cours').css({
        color: 'white'
    });
}, () => {
    $('.menu-cours').css({
        color: '#3490dc'
    });
});

/// POP UP CONNEXION ///
var connexionPopup = $('.connexion-popup');
var connexionButton = $('.menu-connexion-button');
var connexionContent = $('.connexion-popup-content');
var registerContent = $('.register-popup-content');

var lienToRegister = $('.connexion-popup-content > p');
var lienToConnexion = $('.register-popup-content > p');

connexionButton.click(() => {
    connexionPopup.fadeToggle();
    connexionContent.fadeToggle();
    connexionPopup.css({
        display: 'flex',
    })
});

connexionPopup.click(() => {
    connexionPopup.fadeToggle();
    connexionContent.fadeOut();
    registerContent.fadeOut();
});

connexionContent.click((e) => {
    e.stopPropagation();
});
registerContent.click((e) => {
    e.stopPropagation();
});

lienToRegister.click(() => {
    connexionContent.hide();
    registerContent.show();
});
lienToConnexion.click(() => {
    registerContent.hide();
    connexionContent.show();
});

//AJAX
var routeRegister = $('.register-button').attr('route');
var routeLogin = $('.connexion-button').attr('route');
var _token = $('meta[name="csrf-token"]').attr('content');

$('.register-button').click(() => {
    var donneRegister = new FormData();
    donneRegister.append('_token', _token);
    donneRegister.append('mail', $('.register-mail').val());
    donneRegister.append('name', $('.register-name').val());
    donneRegister.append('mdp', $('.register-mdp').val());
    console.log(donneRegister);
    $.ajax({
        url: routeRegister,
        type: 'POST',
        dataType: 'JSON',
        data: donneRegister,
        contentType: false,
        processData: false,
        success: function (data) {
            $('.error').html(data);
        }
    });
});

$('.connexion-button').click(() => {
    var donneLogin = new FormData();
    donneLogin.append('_token', _token);
    donneLogin.append('mail', $('.connexion-mail').val());
    donneLogin.append('name', $('.connexion-name').val());
    donneLogin.append('mdp', $('.connexion-mdp').val());
    $.ajax({
        url: routeLogin,
        type: 'POST',
        dataType: 'JSON',
        data: donneLogin,
        contentType: false,
        processData: false,
        success: function (data) {
            if(data.valid){
                alert(data.message);
                window.location.href = $('meta[name="routeHome"]').attr('content');
            }else{
                $('.errorCon').html(data.message);
            }
        }
    });
});

//Nav mobile
var buttonToggle = $('.nav-mobile > img');
var ulMenu = $('.nav-ul-mobile');
var crossToggle = $('.nav-ul-mobile > img');
buttonToggle.click(()=>{
    ulMenu.toggleClass('move-left');
    ulMenu.css({
        display : 'flex',
    })
});
crossToggle.click(function(){
    ulMenu.toggleClass('move-left');
})
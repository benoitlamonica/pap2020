require('./bootstrap');
$('.add-chap-showoutput').click(() => {
    $('.add-chap-hidden').fadeToggle();
});
$('.output').click(function (e) {
    e.stopPropagation();
});
$('.add-chap-hidden').click(function (e) {
    $('.add-chap-hidden').fadeToggle();
});
HTMLTextAreaElement.prototype.setCaret = function (pos) {
    this.selectionStart -= pos;
    this.selectionEnd -= pos;
}

var token = $('meta[name="csrf-token"]').attr('content');
console.log(token);

function insertAtCursor(myField, myValue) {
    //IE support
    if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = myValue;
    }
    //MOZILLA and others
    else if (myField.selectionStart || myField.selectionStart == '0') {
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        myField.value = myField.value.substring(0, startPos) +
            myValue +
            myField.value.substring(endPos, myField.value.length);
        myField.selectionStart = startPos + myValue.length;
        myField.selectionEnd = startPos + myValue.length;
    } else {
        myField.value += myValue;
    }
}
var textContent = document.getElementById('content-chap');
var output = document.querySelector('.output');

$('.code-code').click(function () {
    // var contentChap = $(textContent).val();
    // $(textContent).val(contentChap + '[c][/c]');
    insertAtCursor(textContent, '[c][/c]');
    $(textContent).focus();
    textContent.setCaret(4);
});
$('.code-balise').click(function () {
    // var contentChap = $(textContent).val();
    // $(textContent).val(contentChap + '[b][/b]');
    insertAtCursor(textContent, '[b][/b]');
    $(textContent).focus();
    textContent.setCaret(4);
});
$('.code-titre').click(function () {
    // var contentChap = $(textContent).val();
    // $(textContent).val(contentChap + '[t][/t]');
    insertAtCursor(textContent, '[t][/t]');
    $(textContent).focus();
    textContent.setCaret(4);
});
$('.code-p').click(function () {
    // var contentChap = $(textContent).val();
    // $(textContent).val(contentChap + '[t][/t]');
    insertAtCursor(textContent, '[p][/p]');
    $(textContent).focus();
    textContent.setCaret(4);
});
$('.code-resume').click(function () {
    // var contentChap = $(textContent).val();
    // $(textContent).val(contentChap + '[t][/t]');
    insertAtCursor(textContent, '[r][/r]');
    $(textContent).focus();
    textContent.setCaret(4);
});
textContent.addEventListener('input', function (e) {
    var valTextContent = textContent.value;
    goodContent = valTextContent.replace(/</g, '&lt;');
    goodContent = goodContent.replace(/>/g, '&gt;');
    goodContent = goodContent.replace(/\[c\]/g, '<pre><code>');
    goodContent = goodContent.replace(/\[\/c\]/g, '</pre></code>');
    goodContent = goodContent.replace(/\[b\]/g, '<span class="code-ba">&lt;');
    goodContent = goodContent.replace(/\[\/b\]/g, '&gt;</span>');
    goodContent = goodContent.replace(/\[t\]/g, '<h2>');
    goodContent = goodContent.replace(/\[\/t\]/g, '</h2>');
    goodContent = goodContent.replace(/\[p\]/g, '<p>');
    goodContent = goodContent.replace(/\[\/p\]/g, '</p>');
    goodContent = goodContent.replace(/\[r\]/g, '<div class="resume-chap"><span class="title-resume-chap">En résumé :</span>');
    goodContent = goodContent.replace(/\[\/r\]/g, '</div>');
    output.innerHTML = goodContent;
});

//PARTIE AJAX
var buttonSend = $('.send-chap-data');
var route = $('.send-chap-data').attr('route');
var selectCours = $('.add-chap-select');

buttonSend.click(() => {
    if (typeof (goodContent) != 'undefined' && selectCours.val() != '') {
        $('.error').html('Chargement...');
        $.ajax({
            url: route,
            type: 'POST',
            data: {
                _token: token,
                newChapContent: goodContent,
                cours: selectCours.val()
            },
            dataType: 'JSON',
            success: function (data) {
                console.log(data);
                $('.error').html('Chapitre bien ajouté ! :)');
            }
        });
    } else {
        $('.error').html('Veuillez remplir les champs, merci.')
    }
});

$(function () {
    let $textContainer = $("<div/>");

    let translitParams = {
        caseType: 'lower',
        replaceSpaces: '-'
    };

    let $generateTranslit = $('#auto-generate-translit');
    let $src = $($generateTranslit.attr('data-translit-source'));
    let $dest = $($generateTranslit.attr('data-translit-dest'));

    $dest.liTranslit(translitParams);

    $src.on('input', function () {
        if ($(this).val().trim() !== '') {
            $generateTranslit.removeAttr('disabled');
        }
        else {
            $generateTranslit.attr('disabled', 'disabled');
        }
    }).liTranslit({...translitParams, elAlias: $textContainer});

    $generateTranslit.click(function () {
        $dest.val($textContainer.text());
    });
});

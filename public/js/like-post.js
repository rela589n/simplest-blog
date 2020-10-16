function handleLike(e, csrf, url, selector) {
    e.preventDefault();

    let xhr = $.post(
        url,
        {
            _token: csrf
        },
        function (data, textStatus) {

            if ('success' === textStatus) {
                $(selector).html(+$(selector).html() + +data['change']);
            }

        }
    );
}

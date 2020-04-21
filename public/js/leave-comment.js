$(function () {
    let $form = $('#add-comment-form');

    let fields = {
        content: $('#content'),
        author_name: $('#author_name')
    };

    let $unknownErrorsBlock = $form.children('.errors');

    let $commentsBox = $('#comment_section');
    let $commentsList = $commentsBox.find('.first_level.comments');

    $form.submit(function (e) {
        e.preventDefault();

        // clear displaying errors
        $unknownErrorsBlock.empty();
        for (let name in fields) {
            fields[name].siblings('.errors').empty();
        }

        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serializeArray(),
            dataType: 'json',
            statusCode: {
                422: function (jqXHR, textStatus, errorThrown) {
                    let errors = jqXHR.responseJSON.errors;

                    for (let name in errors) {
                        if (typeof fields[name] !== "undefined") {
                            fields[name].siblings('.errors').append(`<p>${errors[name]}</p>`);
                        } else {
                            $unknownErrorsBlock.append(`<p>${errors[name]}</p>`);
                        }
                    }
                },
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('An error occurred while adding comment.');
            },
            success: function (data, textStatus, jqXHR) {
                $commentsList.children('.no-comments').remove();

                let comment = new BlogComment(
                    data.author_image_url,
                    data.author_name,
                    data.date_readable,
                    data.content
                );

                let html = `<li>${comment.resultHTML}</li>`;
                $commentsList.append(html);

                $form[0].reset();
            }
        });
    });
});

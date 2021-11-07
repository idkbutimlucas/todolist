$(function () {
    $(".popin-toggle").on('click', function (e) {
        e.preventDefault();
        $('.layer').toggleClass('active');
        $('.popin').toggleClass('active');
    })

    $(".popin-comment-toggle, .drag-item").on('click', function (e) {
        e.preventDefault();
        $('.layer').toggleClass('active');
        $('.popin-comment').toggleClass('active');

        if ($('.popin-comment').hasClass('active')) {
            comments.init($(this));
        }
    })

    $(".layer").on('click', function () {
        $('.popin-comment').removeClass('active');
        $('.popin').removeClass('active');
        $('.layer').removeClass('active');
    })

    $('#comment-form').on('submit', function (e) {
        e.preventDefault();
        comments.send();
    })


    let comments = (function () {

        function getTodo(card) {
            let todoID = card.children('input[type="hidden"]').attr('name');
            $('#comment-content').attr('data-todo', todoID);
            return todoID;
        }

        function getComments(card) {
            let todoID = getTodo(card);
            $.ajax({
                type: "POST",
                data: {'todoID': todoID},
                url: '../treatment/retrieveComments.php',
                success: function (result) {
                    displayComments(JSON.parse(result))
                },
            })
        }

        function init(card) {
            let comments = getComments(card)
        }

        function send() {
            let todoID = $('#comment-content').attr('data-todo');
            let text = $('#comment-content').val();
            $('#comment-content').val('');
            $.ajax({
                type: "POST",
                data: {'todoID': todoID, 'text': text},
                url: '../treatment/addComment.php',
                success: function (result) {
                    if (result === '1') {
                        appendComment({'text': text});
                    }

                },
            })
        }

        function displayComments(comments) {
            let container = $('.comments-area');
            container.html('');
            if (comments) {
                comments.forEach(function (comment) {
                    appendComment(comment);
                })
            }
        }

        function appendComment(comment) {
            let container = $('.comments-area');
            container.append('<p>' + comment.text + '</p>')
        }

        return {
            init: init,
            send: send,
        }
    }());


    $('#dragContainer').on('submit', function (e) {
        e.preventDefault();

        let data = {};

        $('#dragContainer input[type="hidden"]').each(function () {
            let todoID = $(this).attr('name');
            data[todoID] = $(this).val();
        })

        $.ajax({
            type: "POST",
            data: data,
            url: '../treatment/updateTodo.php',
            success: function (result) {
            },
        })
    })
});
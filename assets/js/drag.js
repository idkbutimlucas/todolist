dragula([
    document.getElementById('1'),
    document.getElementById('2'),
    document.getElementById('3'),
])

    .on('drag', function(el) {
        el.classList.add('is-moving');
    })
    .on('dragend', function(el) {
        el.classList.remove('is-moving');
        el.firstChild.nextSibling.value = el.parentNode.dataset.status;
        window.setTimeout(function() {
            el.classList.add('is-moved');
            window.setTimeout(function() {
                el.classList.remove('is-moved');
            }, 600);
        }, 100);
        $('#dragContainer').submit();
    });
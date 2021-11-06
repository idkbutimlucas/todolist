<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\assets\css\trello.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/dragula.min.js"></script> <!-- darg & drop -->

    <title>MyTrello</title>
</head>

<body>
    <div class="drag-container">
        <ul class="drag-list">
            <li class="drag-column drag-column-on-hold">
                <span class="drag-column-header">
                    <h2>Todo</h2>
                    <svg class="drag-header-more" data-target="options1" fill="#FFFFFF" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                    </svg>
                </span>

                <div class="drag-options" id="options1"></div>

                <ul class="drag-inner-list" id="1">
                    <li class="drag-item"></li>
                    <li class="drag-item"></li>
                </ul>
                <button class="add-card-button">Add a card...</button>
            </li>
            <li class="drag-column drag-column-in-progress">
                <span class="drag-column-header">
                    <h2>Doing</h2>
                    <svg class="drag-header-more" data-target="options2" fill="#FFFFFF" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                    </svg>
                </span>
                <div class="drag-options" id="options2"></div>
                <ul class="drag-inner-list" id="2">
                    <li class="drag-item"></li>
                    <li class="drag-item"></li>
                    <li class="drag-item"></li>

                </ul>
            </li>
            <li class="drag-column drag-column-approved">
                <span class="drag-column-header">
                    <h2>Done</h2>
                    <svg data-target="options4" class="drag-header-more" fill="#FFFFFF" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                    </svg>
                </span>
                <div class="drag-options" id="options4"></div>
                <ul class="drag-inner-list" id="3">
                    <li class="drag-item"></li>
                    <li class="drag-item"></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-------------------------->
    <!-- Drag and drop script -->
    <!-------------------------->
    <script>
        dragula([
                document.getElementById('1'),
                document.getElementById('2'),
                document.getElementById('3'),
            ])

            .on('drag', function(el) {

                // add 'is-moving' class to element being dragged
                el.classList.add('is-moving');
            })
            .on('dragend', function(el) {

                // remove 'is-moving' class from element after dragging has stopped
                el.classList.remove('is-moving');

                // add the 'is-moved' class for 600ms then remove it
                window.setTimeout(function() {
                    el.classList.add('is-moved');
                    window.setTimeout(function() {
                        el.classList.remove('is-moved');
                    }, 600);
                }, 100);
            });


        var createOptions = (function() {
            var dragOptions = document.querySelectorAll('.drag-options');

            // these strings are used for the checkbox labels
            var options = ['My task', 'Choice 1', 'Choice 2', 'Choice 3'];

            // create the checkbox and labels here, just to keep the html clean. append the <label> to '.drag-options'
            function create() {
                for (var i = 0; i < dragOptions.length; i++) {

                    options.forEach(function(item) {
                        var checkbox = document.createElement('input');
                        var label = document.createElement('label');
                        var span = document.createElement('span');
                        checkbox.setAttribute('type', 'checkbox');
                        span.innerHTML = item;
                        label.appendChild(span);
                        label.insertBefore(checkbox, label.firstChild);
                        label.classList.add('drag-options-label');
                        dragOptions[i].appendChild(label);
                    });

                }
            }

            return {
                create: create
            }


        }());

        var showOptions = (function() {

            // the 3 dot icon
            var more = document.querySelectorAll('.drag-header-more');

            function show() {
                // show 'drag-options' div when the more icon is clicked
                var target = this.getAttribute('data-target');
                var options = document.getElementById(target);
                options.classList.toggle('active');
            }


            function init() {
                for (i = 0; i < more.length; i++) {
                    more[i].addEventListener('click', show, false);
                }
            }

            return {
                init: init
            }
        }());

        createOptions.create();
        showOptions.init();
    </script>
</body>

</html>
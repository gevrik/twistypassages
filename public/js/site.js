(function () {

    $(document).on('ready', function () {

        // site ready
        console.log('site ready');

        // init textareas with tinymce
        tinymce.init({ selector:'textarea' });

    });
}).call();

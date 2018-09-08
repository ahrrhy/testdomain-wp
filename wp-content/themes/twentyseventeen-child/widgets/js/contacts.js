(function ($) {
    $(document).ready(function () {
        var MOBILE_WINDOW = 768,
            container = $('.widget.contacts-widget'),
            contactButton = container.find('#contact-us-button'),
            modal = $('.contacts-widget-modal'),
            close = modal.find('.close');

        contactButton.on('click', function () {
            modal.css('display', 'block');
        });

        close.on('click', function () {
            modal.css('display', 'none');
        });

        window.onclick = function(event) {
            var target = $(event.target);
            if (target[0] === modal[0]) {
                modal.css('display', 'none');
            }
        };

            // disable links on big screens
        if ($(window).width() > MOBILE_WINDOW) {
            // get all widgets to array
            var contactWidgetsLinksList = container.find('a');
            $.each(contactWidgetsLinksList, function () {
                var $link = $(this);
                $link.attr('href', 'javascript:void(0);');
                //javascript:void(0);
                $link.on('click', function (e) {
                    e.preventDefault();
                });
            });
        }

    });
})(jQuery);
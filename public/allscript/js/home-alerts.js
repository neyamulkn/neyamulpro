(function($) {
    $('body').xmalert({ 
        x: 'right',
        y: 'bottom',
        xOffset: 30,
        yOffset: 30,
        alertSpacing: 40,
        fadeDelay: 0.3,
        autoClose: true,
        template: 'survey',
        title: 'Alerts & Notifications',
        paragraph: 'We added alerts & notifications to the template!.<br>Try our previewer and code generator and use them in your page!',
        timestamp: '',
        imgSrc: 'http://localhost:8000/allscript/images/dashboard/alert-logo.png',
        buttonSrc: [ 'alerts-notifications.html' ],
        buttonText: 'Check it <span class="primary">out!</span>',
    });
})(jQuery);
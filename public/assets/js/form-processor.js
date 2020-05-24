function processForm(element) {
    $.ajax({
        url: 'http://' + window.location.host + '/calculate',
        data: $(element).serialize(),
        processData: false,
        dataType: 'json',
        success: function (response) {
            $(element).find('.result-value').text(response);
        }
    });
}
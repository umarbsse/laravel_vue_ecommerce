$("#login_form").on("submit", function (e) {
    e.preventDefault();
    var url = $(this).prop('action');
    var method = $(this).prop('method').toUpperCase();;
    var formData = $(this).serialize();
    $.ajax({
        type: method,
        url: url,
        data: formData,
        success: function(response){
            if (response.status!=200) {
                alert(response.message);
            }else{
                window.location = response.url;
            }
        }
    });


});
$(document).ready( function () {
    console.log('hello');

    var base_path = $("#url").val();
    
    $('#save').on('click', function(e) {
        console.log("Event on click save:");
        e.preventDefault();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      
        $.ajax({
          url: `${base_path}/itemValidation`,
          type: "POST",
          data: $('form').serialize(),
          success: createResponse,
          error: errorReturned
        });
    });
    
    function createResponse(data) {
        console.log("successfull ajax request");
        console.log(data);
        console.log(data.studentData.id);

        let messagesDiv = $('.ajax-message-validations');
        messagesDiv.empty();
        messagesDiv.removeClass('alert-danger alert-success');

        $('#ID').val(data.studentData.id);
        
        if(data.message === '') {
            console.log('errors:');
            console.log(data.errors);
            messagesDiv.html('Невалидни данни! <br />');
            messagesDiv.addClass('alert alert-danger');
            let errorMessage = data.errors.join(', ');
            messagesDiv.append(errorMessage);
        } else {
            console.log('no errors');
            messagesDiv.addClass('alert alert-success');
            messagesDiv.append('<p>' + data.message + '</p>');
        }
    }

    function errorReturned(error) {
        console.log("error in ajax");
        console.log(error);
    }

    $('a, button').focus(function() {
        this.blur();
    });
});

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Twitch Chat Boostrap">
        <meta name="author" content="Antoine Dahan">

        <title>Twitch Chat Boostrap</title>
        <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link href="/includes/chat.css" rel="stylesheet">
        <script src="/node_modules/jquery/dist/jquery.js"></script>

    </head>

    <link href="sidebarchat.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
          <div class="chat_box">
            <div style="padding-top: 15px; "id="chat-area-header">
                <p>Maker Park Radio Chat</p>
            </div>
            <div class = "form-group">
              <input type = "text" class = "input_name form-control" placeholder = "Please Enter a Name!" />
            </div>
            <div class="form-control messages_display" id="chat-area-scrollable-middle" style="height: 400px; width: 100%;"></div>
            <div style="padding-top: 10px;">
                <textarea class=" input_message form-control" rows="2" placeholder="Send a message"></textarea>
                <div class="form-group input_send_holder">
                  <input id="send-button" type="submit" value="Send" class="btn btn-sm btn-success input_send">
                </div>
            </div>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

            <div class="container-fluid">

              <a href="#menu-toggle" class="float" id="menu-toggle">
                <i class="my-float">
                  <h2>Live Chat</h2>
                </i>
                  </a>
            </div>

            <style>
            .h2 {
padding-bottom: 10px;
}


body{
font-family:Arial;

font-size:18px;
background-color:#CCC;
}

.float{
z-index: 3;
position:fixed;
width:200px;
height:70px;
bottom:40px;
right:40px;
background-color:#0C9;
color:#FFF;
border-radius:50px;
text-align:center;
box-shadow: 2px 2px 3px #999;
}

.my-float{
margin-top:22px;
padding-bottom: 10px;
}
            </style>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>

      <script type="text/javascript">

    // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    // Add API Key & cluster here to make the connection
    var pusher = new Pusher('625925458b678e882996', {
        cluster: 'mt1',
        useTLS: true
    });
    // Enter a unique channel you wish your users to be subscribed in.
    var channel = pusher.subscribe('my-channel');
    // bind the server event to get the response data and append it to the message div
    channel.bind('my-event',
        function(data) {
            //console.log(data);
            $('.messages_display').append('<p class = "message_item">' + data + '</p>');
            $('.input_send_holder').html('<input id="send-button" type="submit" value="Send" class="btn btn-sm btn-success input_send" />');
            $(".messages_display").scrollTop($(".messages_display")[0].scrollHeight);
        });
    // check if the user is subscribed to the above channel
    channel.bind('pusher:subscription_succeeded', function(members) {
        console.log('successfully subscribed!');
    });
    // Send AJAX request to the PHP file on server
    function ajaxCall(ajax_url, ajax_data) {
        $.ajax({
            type: "POST",
            url: ajax_url,
            //dataType: "json",
            data: ajax_data,
            success: function(response) {
                console.log(response);
            },
            error: function(msg) {}
        });
    }
    // Trigger for the Enter key when clicked.
    $.fn.enterKey = function(fnc) {
        return this.each(function() {
            $(this).keypress(function(ev) {
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);
                if (keycode == '13') {
                    fnc.call(this, ev);
                }
            });
        });
    }
    // Send the Message enter by User
    $('body').on('click', '.chat_box .input_send', function(e) {
        e.preventDefault();
        var message = $('.chat_box .input_message').val();
        var name = $('.chat_box .input_name').val();
        // Validate Name field
        if (name === '') {
            bootbox.alert('<br /><p class = "bg-danger">Please enter a Name.</p>');
        }
      else if (message !== '') {
            // Define ajax data
            var chat_message = {
                name: $('.chat_box .input_name').val(),
                message: '<strong>' + $('.chat_box .input_name').val() + '</strong>: ' + message
            }
            //console.log(chat_message);
            // Send the message to the server passing File Url and chat person name & message
            ajaxCall('/messages.php', chat_message);
            // Clear the message input field
            $('.chat_box .input_message').val('');

        }
    });
    // Send the message when enter key is clicked
    $('.chat_box .input_message').enterKey(function(e) {
        e.preventDefault();
        $('.chat_box .input_send').click();
    });
    </script>


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>


<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Twitch Chat Boostrap">
        <meta name="author" content="Antoine Dahan">

        <title>Twitch Chat Boostrap</title>
        <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link href="includes/chat.css" rel="stylesheet">
        <script src="node_modules/jquery/dist/jquery.js"></script>

    </head>

    <body>
      <div class="chat_box">
        <div id="chat-area-header">
            <p>Maker Park Radio Chat</p>
            <div class = "form-group">
        			<input type = "text" class = "input_name form-control" placeholder = "Enter Name" />
        		</div>
        </div>
        <div class="form-control messages_display" id="chat-area-scrollable-middle" style="height: 100%; width: 100%;"></div>
        <div id="chat-area-footer">
            <textarea id="chat-textbox" class=" input_message form-control" rows="2" placeholder="Send a message"></textarea>
            <div style="margin-top: 10px;">
                <div style="position: fixed; left: 2%;">
                    <span id="settings-button" class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#settings-modal"></span>
                </div>
                <div class="form-group input_send_holder">
                  <input id="send-button" type="submit" value="Send" class="btn btn-sm btn-success input_send">
                </div>
            </div>
        </div>
      </div>
        <!-- user color select modal -->
        <div id="settings-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content" style="height: 220px; width: 220px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <span class="modal-title" style="color: #706a7c;">CHAT OPTIONS</span>
                </div>
                <div class="modal-body">
                    <div id="chat-color-options">
                        <div style="background-color:#FF0000;"></div>
                        <div style="background-color: #0000FF;"></div>
                        <div style="background-color: #008000;"></div>
                        <div style="background-color: #B22222;"></div>
                        <div style="background-color: #FF7F50;"></div>
                        <div style="background-color: #9ACD32;"></div>
                        <div style="background-color: #FF4500;"></div>
                        <div style="background-color: #2E8B57;"></div>
                        <div style="background-color: #DAA520;"></div>
                        <div style="background-color: #D2691E;"></div>
                        <div style="background-color: #5F9EA0;"></div>
                        <div style="background-color: #1E90FF;"></div>
                        <div style="background-color: #FF69B4;"></div>
                        <div style="background-color: #8A2BE2;"></div>
                        <div style="background-color: #00FF7F;"></div>
                    </div>
                    <div>
                        <div style="margin-top: 100px;">
                            <input id="show-timestamp-checkbox" type="checkbox" value="timestamps" checked>
                            <span>Timestamp</span>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </body>

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
            $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block input_send" />');
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
            ajaxCall('messages.php', chat_message);
            // Clear the message input field
            $('.chat_box .input_message').val('');
            // Show a loading image while sending
            $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block" disabled /> &nbsp;<img     src = "loading.gif" />');
        }
    });
    // Send the message when enter key is clicked
    $('.chat_box .input_message').enterKey(function(e) {
        e.preventDefault();
        $('.chat_box .input_send').click();
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

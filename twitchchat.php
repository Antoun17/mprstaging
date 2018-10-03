
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>

<h2>Popup Chat Window</h2>
<p>Click on the button at the bottom of this page to open the chat form.</p>
<p>Note that the button and the form is fixed - they will always be positioned to the bottom of the browser window.</p>

<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <div class="chat_box">
    <div class = "form-group">
      <input type = "text" class = "input_name form-control" placeholder = "Please Enter a Name!" />
    </div>
    <div id="chat-area-header">
        <h2>Maker Park Radio Chat</h2>
    </div>
    <div class="form-control messages_display" id="chat-area-scrollable-middle" style="height:75%; width: 100%;"></div>
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
</div>

<script>
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>







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
            ajaxCall('messages.php', chat_message);
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

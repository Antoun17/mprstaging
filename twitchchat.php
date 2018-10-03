
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Twitch Chat Boostrap">
        <meta name="author" content="Antoine Dahan">

        <title>Twitch Chat Boostrap</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
    </head>

    <body>
        <div id="chat-area-header">
            <p>Twitch Chat Boostrap</p>
            <hr>
        </div>
        <div id="chat-area-scrollable-middle"></div>
        <div id="chat-area-footer">
            <textarea id="chat-textbox" rows="2" placeholder="Send a message"></textarea>
            <div style="margin-top: 10px;">
                <div style="position: fixed; left: 2%;">
                    <span id="settings-button" class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#settings-modal"></span>
                </div>
                <button id="send-button" class="btn btn-sm btn-success">Send</button>
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

    <script src="js/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script src="js/twitch-chat.js"></script>
</html>

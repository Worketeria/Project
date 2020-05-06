<!DOCTYPE html>

<?php
include("functions/functions.php");
include("includes/database.php");
session_start();

?>
<html lang="en">

<head>
    <title>Worker Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <link rel='stylesheet' href='css/style.min.css' />

    <link rel="stylesheet" href="css/css/style.css">
    <script>
    $(document).ready(function() {

        fetch_user();

        setInterval(function() {
           
            fetch_user();
            update_chat_history_data();
          
        }, 5000);

        function fetch_user() {
            $.ajax({
                url: "fetch_user.php",
                method: "POST",
                success: function(data) {
                    $('#user_details').html(data);
                }
            })
        }

        function make_chat_dialog_box(to_user_id, to_user_name) {
            var modal_content = '<div id="user_dialog_' + to_user_id +
                '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
            modal_content +=
                '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' +
                to_user_id + '" id="chat_history_' + to_user_id + '">';
            modal_content += fetch_user_chat_history(to_user_id);
            modal_content += '</div>';
            modal_content += '<div class="form-group">';
            modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id +
                '" class="form-control chat_message"></textarea>';
            modal_content += '</div><div class="form-group" align="right">';
            modal_content += '<button type="button" name="send_chat" id="' + to_user_id +'" class="send_chat">Send</button></div></div>';
            $('#user_model_details').html(modal_content);
        }

        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            make_chat_dialog_box(to_user_id, to_user_name);
            $("#user_dialog_" + to_user_id).dialog({
                autoOpen: false,
                width: 400
            });
            $('#user_dialog_' + to_user_id).dialog('open');
            $('#chat_message_' + to_user_id).emojioneArea({
                pickerPosition: "top",
                toneStyle: "bullet"
            });
        });

        $(document).on('click', '.send_chat', function() {
            var to_user_id = $(this).attr('id');
            var chat_message = $.trim($('#chat_message_' + to_user_id).val());
            if (chat_message != '') {
                $.ajax({
                    url: "insert_chat.php",
                    method: "POST",
                    data: {
                        to_user_id: to_user_id,
                        chat_message: chat_message
                    },
                    success: function(data) {
                        //$('#chat_message_'+to_user_id).val('');
                        var element = $('#chat_message_' + to_user_id).emojioneArea();
                        element[0].emojioneArea.setText('');
                        $('#chat_history_' + to_user_id).html(data);
                    }
                })
            } else {
                alert('Type something');
            }
        });

        function fetch_user_chat_history(to_user_id) {
            $.ajax({
                url: "fetch_user_chat_history.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id
                },
                success: function(data) {
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        }

        function update_chat_history_data() {
            $('.chat_history').each(function() {
                var to_user_id = $(this).data('touserid');
                fetch_user_chat_history(to_user_id);
            });
        }

        $(document).on('click', '.ui-button-icon', function() {
            $('.user_dialog').dialog('destroy').remove();
            $('#is_active_group_chat_window').val('no');
        });

      
        $(document).on('click', '.remove_chat', function() {
            var chat_message_id = $(this).attr('id');
            if (confirm("Are you sure you want to remove this chat?")) {
                $.ajax({
                    url: "remove_chat.php",
                    method: "POST",
                    data: {
                        chat_message_id: chat_message_id
                    },
                    success: function(data) {
                        update_chat_history_data();
                    }
                })
            }
        });

    });
    </script>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Oldenburg');

    html,
    body,
    div,
    span,
    applet,
    object,
    iframe,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    code,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    strong,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    embed,
    figure,
    figcaption,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    ruby,
    section,
    summary,
    time,
    mark,
    audio,
    video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        outline: none;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    html {
        height: 101%;
    }

    body {
        background: #dde9f0 url('https://i.imgur.com/p6YhOiv.png');
        font-family: Arial, Tahoma, sans-serif;
        font-size: 62.5%;
        line-height: 1;
        padding-bottom: 65px;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block;
    }

    ol,
    ul {
        list-style: none;
    }

    blockquote,
    q {
        quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: '';
        content: none;
    }

    strong {
        font-weight: bold;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    img {
        border: 0;
        max-width: 100%;
    }



    p {
        font-size: 1.2em;
        font-weight: normal;
        line-height: 1.35em;
        color: #343434;
        margin-bottom: 12px;
    }

    /* page container */
    #wrap {
        display: block;
        width: 850px;
        margin: 0 auto;
        padding-top: 35px;
    }


    /* user menu settings */
    #dropdown {
        display: block;
        padding: 13px 16px;
        width: 266px;
        margin: 0 auto;
        position: relative;
        cursor: pointer;
        font-size: 20px;

        -webkit-transition: all 0.15s linear;
        -moz-transition: all 0.15s linear;
        -ms-transition: all 0.15s linear;
        -o-transition: all 0.15s linear;
        transition: all 0.15s linear;
    }

    #dropdown:hover {
        color: #F5F5F5;
    }

    #dropdown.open {
        background: #5a90e0;
        color: #fff;
        border-left-color: #6c6d70;
    }

    #dropdown ul {
        position: absolute;
        top: 100%;
        left: -4px;
        /* move content -4px because of container left border */
        width: 266px;
        padding: 5px 0px;
        display: none;
        border-left: 4px solid #8e9196;
        background: #fff;
        -webkit-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    #dropdown ul li {
        font-size: 0.9em;
    }

    #dropdown ul li a {
        text-decoration: none;
        display: block;
        color: #447dd3;
        padding: 7px 15px;
    }

    #dropdown ul li a:hover {
        color: #6fa0e9;
        background: #e7f0f7;
    }

    .chat_message_area {
        position: relative;
        width: 100%;
        height: auto;
        background-color: #FFF;
        border: 1px solid #CCC;
        border-radius: 3px;
    }

    #group_chat_message {
        width: 100%;
        height: auto;
        min-height: 80px;
        overflow: auto;
        padding: 6px 24px 6px 12px;
    }

    .image_upload {
        position: absolute;
        top: 3px;
        right: 3px;
    }

    .image_upload>form>input {
        display: none;
    }

    .image_upload img {
        width: 24px;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <!-- navbar -->
    <div class="navbar">
        <nav class="nav__mobile"></nav>
        <div class="container">
            <div class="navbar__inner">
                <a href="index.php" class="navbar__logo">Worketeria</a>
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <nav class="navbar__menu">
                    <ul>
                        <li>
                            <div class="pull-right">
                                <a align="right"
                                    style="text-decoration:none; font-size:20px;"><?php echo $_SESSION['customer_name']; ?></a>
                            </div>
                        </li>
                        <li>
                            <div class="pull-right">
                                <a align="right" style="text-decoration:none; font-size:20px;"
                                    href="log_out.php">Logout</a>
                            </div>
                        </li>
                    </ul>


                </nav>
                <div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
                                class=""></path>
                        </svg></a></div>
            </div>
        </div>
    </div>

    <!-- END nav -->
    <div class="container">
        <br><br><br><br><br><br><br><br><br><br><br><br>


        <br />
        <div class="row">
            <div class="col-md-8 col-sm-6">
                <h2>List of workers</h2>
            </div>
        </div>
        <div class="table-responsive">

            <div id="user_details"></div>
            <div id="user_model_details"></div>
        </div>
        <br />
        <br />

    </div>






    <script src="js/js/popper.min.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
  
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/jquery.magnific-popup.min.js"></script>
    <script src="js/js/aos.js"></script>
    <script src="js/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/js/google-map.js"></script>
    <script src="js/js/main.js"></script>

</body>

<!--End of Tawk.to Script-->
</html>
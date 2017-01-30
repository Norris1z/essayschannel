var username;

$(document).ready(function()
{
    username = $('#username').html();

    pullData();

    $(document).keyup(function(e) {
        if (e.keyCode == 13)
            sendMessage();
        else
            isTyping();
    });
});

function pullData()
{
    retrieveChatMessages();
    retrieveTypingStatus();
    setTimeout(pullData,3000);
}

function retrieveChatMessages()
{
    $.post('retrieveChatMessages', {username: username, '_token': '{!! csrf_token() !!}'}, function(data)
    {
        if (data.length > 0)
            $('.message').append('<br><div>'+data+'</div><br>');
    });
}

function retrieveTypingStatus()
{
    $.post('retrieveTypingStatus', {username: username, '_token': '{!! csrf_token() !!}'}, function(username)
    {
        if (username.length > 0)
            $('#typingStatus').html(username+' is typing');
        else
            $('#typingStatus').html('');
    });
}

function sendMessage()
{
    var text = $('#text').val();

    if (text.length > 0)
    {
        $.post('sendMessage', {text: text, username: username, '_token': '{!! csrf_token() !!}'}, function()
        {
            $('#chat-window').append('<br><div style="text-align: right"><p>'+text+'</p></div><br>');
            $('#text').val('');
            notTyping();
        });
    }
}

function isTyping()
{
    $.post('isTyping', {username: username, '_token': '{!! csrf_token() !!}'});
}

function notTyping()
{
    $.post('notTyping', {username: username, '_token': '{!! csrf_token() !!}'});
}
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
    $.post('http://localhost/retrieveChatMessages', {username: username}, function(data)
    {
        if (data.length > 0)
            $('.message').append('<br><div>'+data+'</div><br>');
    });
}

function retrieveTypingStatus()
{
    $.post('http://localhost/retrieveTypingStatus', {username: username}, function(username)
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
        $.post('http://localhost/sendMessage', {text: text, username: username}, function()
        {
            $('#chat-window').append('<br><div style="text-align: right"><p>'+text+'</p></div><br>');
            $('#text').val('');
            notTyping();
        });
    }
}

function isTyping()
{
    $.post('http://localhost/isTyping', {username: username});
}

function notTyping()
{
    $.post('http://localhost/notTyping', {username: username});
}
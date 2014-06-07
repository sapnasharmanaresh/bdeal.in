var baseurl = "http://localhost/bdeal.comDesignV2/";

function cart(prod_id) {
    $.post(baseurl + 'cart/addToCart', {
        'product_id': prod_id
    }, function(data) {
        if (data == 1) {
            alert('Kindly login to add product in cart');
        } else {
            location.reload();
        }
    })
}

function cartCount() {
    $.post(baseurl + 'cart/cartCount'
            , function(data) {
        $('#cart').html(data);
    })
}


function addToList(prod_id) {

    $.post(baseurl + 'wishList/addToList', {
        'product_id': prod_id
    }, function(data) {
        if (data == 1) {
            alert('Kindly login to add product in wishlist');
        } else {
            location.reload();
        }
    })


}

function listCount() {
    $.post(baseurl + 'wishList/listCount'
            , function(data) {
        //  alert(data);
        $('#list').html(data);
    })
}


function postReview(prod_id) {

    reviewBody = $('#newReview').val();
    reviewTitle = $('#reviewTitle').val();
    //alert(value);
    $.post(baseurl + 'reviews/addReview',
            {
                'reviewHead': reviewTitle,
                'review': reviewBody,
                'product_id': prod_id
            }, function(data) {
        if (data == 1) {
            alert('Kindly login to write a review');
        } else {
            location.reload();
        }
    })


}

function showReviews(prod_id) {
    $.post(baseurl + 'reviews/showReviews',
            {
                'product_id': prod_id
            }, function(data) {
        $('#showReviews').html(data);
    }
    )

}

function countReviews(prod_id) {
    $.post(baseurl + 'reviews/totalReviews',
            {
                'product_id': prod_id
            }, function(data) {

        $('#reviews__number').html(data);
    }
    )
}

function sendProdDesc() {
    url = $(location).attr('href');
    alert(url);
    email = $('#mailProdDesc').val();
    alert(email);
    $.post(baseurl + 'product/mailDesc',
            {
                'url': url,
                'email': email
            }, function(data) {
        //    alert(data)
        alert('email has been sent');
    }
    )

}

function search(value) {
    alert(value);
    // window.location=baseurl+'search/search?'+value;
    $.post(baseurl + 'search/searchMain', {
        'search': value
    }, function(data) {
        alert(data);
    })
}

///*
//
//var sendReq = getXmlHttpRequestObject();
//var receiveReq = getXmlHttpRequestObject();
//var lastMessage = 0;
//var mTimer;
////Function for initializating the page.
//function startChat() {
//    //Set the focus to the Message Box.
//    document.getElementById('txt_message').focus();
//    //Start Recieving Messages.
//    
//    getChatText();
//}
//
////Gets the browser specific XmlHttpRequest Object
//function getXmlHttpRequestObject() {
//    if (window.XMLHttpRequest) {
//        return new XMLHttpRequest();
//    } else if (window.ActiveXObject) {
//        return new ActiveXObject("Microsoft.XMLHTTP");
//    } else {
//        document.getElementById('p_status').innerHTML = 'Status: Cound not create XmlHttpRequest Object.  Consider upgrading your browser.';
//    }
//}
//
////Gets the current messages from the server
//function getChatText() {
//    if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
//        receiveReq.open("GET", 'chat?chat=1&last=' + lastMessage, true);
//        receiveReq.onreadystatechange = handleReceiveChat;
//        receiveReq.send(null);
//    }
//}
//
////Add a message to the chat server.
//function sendChatText() {
//    if (document.getElementById('txt_message').value == '') {
//        alert("You have not entered a message");
//        return;
//    }
//    if (sendReq.readyState == 4 || sendReq.readyState == 0) {
//        sendReq.open("POST", 'chat?chat=1&last=' + lastMessage, true);
//        sendReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//        sendReq.onreadystatechange = handleSendChat;
//        var param = 'message=' + document.getElementById('txt_message').value;
//        param += '&name=Ryan Smith';
//        param += '&chat=1';
//        sendReq.send(param);
//        document.getElementById('txt_message').value = '';
//    }
//}
//
////When our message has been sent, update our page.
//function handleSendChat() {
//    //Clear out the existing timer so we don't have 
//    //multiple timer instances running.
//    clearInterval(mTimer);
//    getChatText();
//}
//
//function handleReceiveChat() {
//    if (receiveReq.readyState == 4) {
//        //Get a reference to our chat container div for easy access
//        var chat_div = document.getElementById('div_chat');
//        //Get the AJAX response and run the JavaScript evaluation function
//        //on it to turn it into a useable object.  Notice since we are passing
//        //in the JSON value as a string we need to wrap it in parentheses
//        alert(receiveReq.responseText);
//        var response = eval("(" + receiveReq.responseText + ")");
//        for (i = 0; i < response.messages.message.length; i++) {
//            chat_div.innerHTML += response.messages.message[i].user;
//            chat_div.innerHTML += '&nbsp;&nbsp;<font class="chat_time">' + response.messages.message[i].time + '</font><br />';
//            chat_div.innerHTML += response.messages.message[i].text + '<br />';
//            chat_div.scrollTop = chat_div.scrollHeight;
//            lastMessage = response.messages.message[i].id;
//        }
//        mTimer = setTimeout('getChatText();', 2000); //Refresh our chat in 2 seconds
//    }
//}
//
////This functions handles when the user presses enter.  Instead of submitting the form, we
////send a new message to the server and return false.
//function blockSubmit() {
//    sendChatText();
//    return false;
//}
////This cleans out the database so we can start a new chat session.
//function resetChat() {
//    if (sendReq.readyState == 4 || sendReq.readyState == 0) {
//        sendReq.open("POST", 'getChat.php?chat=1&last=' + lastMessage, true);
//        sendReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//        sendReq.onreadystatechange = handleResetChat;
//        var param = 'action=reset';
//        sendReq.send(param);
//        document.getElementById('txt_message').value = '';
//    }
//}
////This function handles the response after the page has been refreshed.
//function handleResetChat() {
//    document.getElementById('div_chat').innerHTML = '';
//    getChatText();
//}
//
//
//window.onload = startChat; 

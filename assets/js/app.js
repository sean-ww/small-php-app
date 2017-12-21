function submitSlug() {
    var slugInput = document.getElementById('slug-input');
    if (isUrl(slugInput.value)) {
        postUrl(slugInput.value);
    } else {
        alert('Please enter a valid url');
    }
}

// lightly validate the url
function isUrl(url) {
    // regex source: https://jsfiddle.net/b9chris/0rq4k6a8/
    var regex = /^(https?:\/\/)?[a-z0-9-]*\.?[a-z0-9-]+\.[a-z0-9-]+(\/[^<>]*)?$/;
    if (regex.test(url)) {
        return true;
    } else {
        return false;
    }
}


function postUrl(url) {
    $.post( window.location.pathname, {
        url: url
    }).done(function(result) {
        alert('Your short url: ' + window.location.href + 'l/' + result);
    }).fail(function(err) {
        alert('An error occurred. Please try again.');
    });
}

function sendAjax(type, url, success, cache = false) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: type,
        url: url,
        dataType: 'json',
        cache: cache,
        success: success
    });
}
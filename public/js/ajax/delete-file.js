document.getElementById('modalOk').addEventListener('click', function () {
    let getData = document.querySelector('input[fileid]').value;
    if (getData) {
        let sendData = '/storage/delete/file/' + getData + '/';
        sendAjax('GET', sendData, function (i) {
            console.log('Удалён: ' + i);
            if (i) {
                location.reload();
            } else {
                console.log(i);
            }
        });
    }
});
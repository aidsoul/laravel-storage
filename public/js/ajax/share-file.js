domLoaded(function()
{
    let shareFileButton = document.querySelector('a#shareFile');
    shareFileButton.addEventListener('click', function () {
        let file = document.querySelector('input[fileid]').value;
        let url = new URL(window.location.href);
        sendAjax('GET', url.origin + '/storage/file/' + file + '/share', function (item) {
            let linkButton = document.querySelector('a#go-to-file');
            let shareModalH5 = document.querySelector('h5#share-file-info');
            if (item.share) {
                linkButton.href = item.share;
                shareModalH5.innerHTML = 'Публичная ссылка на файл';
                linkButton.innerHTML = 'Перейти к файлу';
            }
            if (item.link) {
                linkButton.href = '/file/get/' + item.link;
                shareModalH5.innerHTML = 'Ссылка на файл взята из кэша';
                linkButton.innerHTML = 'Перейти к сохраненной версии ссылки';
            }
    
        });
    });
    
});


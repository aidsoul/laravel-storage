domLoaded(function () {
    let dataFile = document.querySelectorAll('div#file');
    let fileFunctionBlock = document.querySelector('div#file-functions');
    let action = function (e) {
        // let folderBlock = document.querySelector('div#folder-functions');
        // folderBlock.style.visibility = 'hidden';
        // folderBlock.style.position = 'absolute';
        // Delete folder
            // document.querySelector('div#folder-functions-delete').style.display = 'none';
        // END
        fileFunctionBlock.style.visibility = 'visible';

        let item = e.target;

        // get file
        let getData = item.getAttribute('data-file');

        document.getElementById('form-change-file').value = getData;

        let sendData = '/storage/get/file/' + getData + '/';
        //imgPreview
        let imgPreview = document.querySelector('img.img-preview');
        let imhPreviewGet = item.querySelector('img.card-img-top');
        imgPreview.removeAttribute('hidden');
        imgPreview.src = imhPreviewGet.src;

        let fileId = document.querySelector('input[fileid]');

        let filename = document.querySelector('div[filename]');
        let filesize = document.querySelector('div[filesize]');
        let filedate = document.querySelector('div[filedate]');
        let publicaccess = document.querySelector('div[publicaccess]');

        let fileGetName = item.querySelector('div.card-body p#file-name').innerHTML;
        let fileSendName = filename.innerHTML = 'Имя: ' + fileGetName;
        let fileGetSize = item.querySelector('input#file-size').value;
        if (fileGetSize < 1) {
            if (fileGetSize == 0) {
                fileGetSize = '< 1 КБ';
            } else {
                fileGetSize = fileGetSize * 1024 + ' КБ';
            }
        } else {
            fileGetSize = fileGetSize + ' МБ';
        }
        filesize.innerHTML = 'Размер: ' + fileGetSize;

        let fileGetExtension = item.querySelector('input#file-extension').value;
        if (file.extension) {
            filename.innerHTML = fileSendName + '.' + fileGetExtension;
        } else {
            filename.innerHTML = fileSendName;
        }

        let fileGetDateCreate = item.querySelector('input#file-date-create').value;
        let fileCreateAt = fileGetDateCreate.split('.')[0];
        filedate.innerHTML = 'Загружен: ' + fileCreateAt.replace('T', ' ');
        fileId.value = getData;
        
        let fileGetPublicLink = item.querySelector('input#file-public-link').value;
        if (fileGetPublicLink) {
            publicaccess.innerHTML = 'Общий доступ: есть';
        } else {
            publicaccess.innerHTML = 'Общий доступ: нет';
        }
    }
    
    for (i = 0; i < dataFile.length; i++) {
        dataFile[i].addEventListener('click', action);
    }
});
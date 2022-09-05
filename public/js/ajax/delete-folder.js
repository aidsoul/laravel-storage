function deleteFolder()
{   let folderId = document.querySelector('input#folder-temporaryId').value;
    let url = '/storage/folder/' + folderId + '/delete';
    let folderDelete  = document.querySelector('button#modal-folder-delete-button');
    folderDelete.addEventListener('click', function(){
        sendAjax('GET', url, function (i) {
            if (i) {
                location.reload();
            } else {
                console.log('Возникла ошибка при удалении файла');
            }
        });
    });
    console.log(url);
}

domLoaded(function () {
    let folder = document.querySelectorAll('div#folder');
    let folderBlock = document.querySelector('div#folder-functions');

    let folderAction = function (e) {
        let item = e.target;


        // Delete folder
            // let deleteButton = document.querySelector('div#folder-functions-delete');
            // deleteButton.style.display = 'block';
            // let folderid = item.getAttribute('data-folder');
            // document.querySelector('input#folder-temporaryId').value = folderid;
            // deleteFolder();
        // END
        // let folderDeleteInfo = deleteButton.querySelector('p.folder-delete-info');
        // let folderName = item.querySelector('p#folder-name').innerHTML;
        // folderDeleteInfo.innerHTML = 'Удалить папку: ' + folderName + ' ?'; 

        let fileFunctionBlock = document.querySelector('div#file-functions');
        fileFunctionBlock.style.visibility = 'hidden';
        folderBlock.style.visibility = 'visible';
        // folderBlock.style.removeProperty('position');
    };
    let folderOpen = function (e) {
        let item = e.target;
        let folderid = item.getAttribute('data-folder');
        let url = new URL(window.location.href);
        window.location.href = url.origin + '/storage/' + folderid;
    }

    for (i = 0; i < folder.length; i++) {
        folder[i].addEventListener('click', folderAction);
        folder[i].addEventListener('dblclick', folderOpen);
    }

    let foldersAndFiles = document.querySelector('div#folders-and-files');

    // foldersAndFiles.addEventListener('rightclick', function(e){
    //     let fileFunctionBlock = document.querySelector('div#file-functions');
    //     fileFunctionBlock.style.visibility = 'hidden';
    //     folderBlock.style.visibility = 'visible';
    //     folderBlock.style.removeProperty('position');
    //     console.log(1);
    // });

});
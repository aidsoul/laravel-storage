domLoaded(function()
{
    let downloadFile = document.querySelector('a#downloadFile');
    downloadFile.addEventListener('click', function(){
        let file = document.querySelector('input[fileid]').value;
        let basePath = '/storage/download/';
        let filename = document.querySelector('div[filename]');
        downloadFile.href = basePath + 'file/' + file + '/';
        let fileName = filename.textContent;
        downloadFile.download = fileName.replace(/Имя: /g);
    });
});
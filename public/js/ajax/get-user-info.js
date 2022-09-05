send('GET','/user/get', function(get){

    let userNameField = $('div[username]');
    userNameField.text(get.data.lastname + ' ' + get.data.firstname);

    let storageInfo = $('p[storageinfo]');
    storageInfo.text('Использовано: ' + get.data.storage_size_used.toFixed(1) + ' Мб из ' + get.data.storage_size + ' Мб');

    let storageCoefficient = get.data.storage_size / get.data.storage_size_used;
    let storageUsed = 100 / storageCoefficient;
    storageUsed = storageUsed.toFixed(1);

    let progressused = $('div[progressused]');
    progressused.css({'width': storageUsed+'%'});    
    progressused.text(storageUsed + '%');    
});


let items = document.querySelectorAll('[disabledAttribute]');
let button = document.getElementById('update-submit');
let allValues = [];
button.addEventListener("click", function(){
    for (i = 0; i < items.length; i++) {
        allValues = [items[i].value];
        if(!items[i].value)
        {
            items[i].setAttribute('disabled', 'disabled');
        }
        
    }
});

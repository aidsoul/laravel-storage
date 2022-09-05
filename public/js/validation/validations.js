// Message
function notifiDanger(tag) {
    $(tag).css('border-color', 'red');
    setTimeout(function () {
        $(tag).css('border-color', '');
    }, 1000);
}

function notifiOk(tag) {
    $(tag).css('border-color', 'green');
}
// validations
let tag = /<[A-Za-zА-Яа-я ]{1,}>|[<]{1}[>]{1}/g;
let cyrillic = /[А-Яа-я.,:!?;+-]/g;
let email = /[А-Яа-я%,:!?;№"+-]/g;
let fio = /[^А-Яа-я]/g;
let number = /[^0-9]/g;

function pattern(e, replaceTag) {
    let input = e.target;

    // current input value
    let value = input.value;
    let inputLength = value.length;

    // modified input value
    let newValue = value.replace(replaceTag, "");
    let newValueLenght = newValue.length;

    if (newValueLenght < inputLength) {
        input.value = newValue;
        notifiDanger(input);
    }

    // Maximum field value
    if (inputLength > input.max) {
        let difference = inputLength - input.max;
        if(difference == 1){
            input.value = input.value.substring(0, inputLength - 1);
        }
        else{
            input.value = input.value.substring(0, inputLength - input.max);
        }
        notifiDanger(input);
    }

    input.value.replaceAll(' ', '');

}

function patternfio(e) {
    pattern(e, fio);
}

function rmtag(e) {
    pattern(e, tag);
}

function rmcyrillic(e) {
    pattern(e, cyrillic);
}

function rmtagcyrillic(e) {
    pattern(e, tag);
    pattern(e, cyrillic);
}

function patternemail(e) {
    pattern(e, tag);
    pattern(e, email);
}

function onlynumbers(e) {
    pattern(e, number);
}

function validation(tag) {
    let items = document.querySelectorAll('input[' + tag.name + ']');
    for (i = 0; i < items.length; i++) {
        items[i].addEventListener("input", tag);
    }
}

function domLoadedValidation(funtctionTag) {
    document.addEventListener("DOMContentLoaded", validation(funtctionTag))
}
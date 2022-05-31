
function fixCustomFileSelectLabel(elemId){
    var inputElem = $(`#${elemId}`) ;
    var label = $(`label[for="${elemId}"]`);

    if(inputElem[0].files[0]){
        label.text(inputElem[0].files[0].name);
    }

    inputElem.on('input',function(e){
        label.text(this.files[0].name);
    });
}


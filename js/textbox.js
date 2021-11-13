/* $(function () {
    $("#mybutton").click(function () {
        if ($('#phone').val() != '' || $('#phone').val().length != 10){
            
        }
    });
}); */


function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}

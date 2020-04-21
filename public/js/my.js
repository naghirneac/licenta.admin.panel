//Confirm deleting the request
$('.delete').click(function () {
    var res = confirm("Confirmați acțiunea!");
    if (!res) return false;
})

//Confirm deleting the request from database
$('.deletebd').click(function () {
    var res = confirm("Confirmați ștergerea!");
    if (res) {
        var ress = confirm("Cererea va fi ștearsă din baza de date!");
        if (!ress) return false;
    }
    if (!res) return false;
})



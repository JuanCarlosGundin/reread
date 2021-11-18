function validar() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    if (email == "" || password == "") {

        if (email == "" && password != "") {
            //alert ("No se ha especificado ningun Email");
            document.getElementById('email').style.border = "2px solid red";
            document.getElementById('password').style.border = "2px solid grey";
            alert("Llegamos")
            return false;

        } else if (email != "" && password == "") {
            //alert ("No se ha especificado ninguna Contraseña");
            document.getElementById('password').style.border = "2px solid red";
            document.getElementById('email').style.border = "2px solid grey";
            return false;

        } else {
            //alert ("No se ha especificado ningun valor");
            document.getElementById('password').style.border = "2px solid red";
            document.getElementById('email').style.border = "2px solid red";
            return false;
        }
    } else {
        return true;
    }
}
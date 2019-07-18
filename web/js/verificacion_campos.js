function verificar_campos_login() {
    var text=document.forms[0].user.value.length;
	var password=document.forms[0].password.value.length;
    if(text==0 || password==0) {
        alert("Ingresá el usuario y la clave");
        return false;
    }else{
        document.forms[0].submit();
    }
}
// valida fecha

function age(Fecha){
fecha = new Date(Fecha);
hoy = new Date();
ed = parseInt((hoy -fecha)/365/24/60/60/1000);
//alert(ed);
document.getElementById('edad').value = ed;
}
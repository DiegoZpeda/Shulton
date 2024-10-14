function editTienda(id, nombre, latitud, longitud, precio) {
    document.getElementById('tienda_id').value = id;
    document.getElementById('tienda_nombre').value = nombre;
    document.getElementById('tienda_latitud').value = latitud;
    document.getElementById('tienda_longitud').value = longitud;
    document.getElementById('precio').value = precio;
    document.querySelector('button[name="add"]').style.display = 'none';
    document.querySelector('button[name="update"]').style.display = 'inline';
}

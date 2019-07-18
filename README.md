# almafuerte
Sitio web de EEST N8 Almafuerte




### Login

http://almafuerte.dx.am/


```bash
# Login as Student
Username: silver
Pass: 12345


# Login as Teacher
Username: nelson
Pass: 12345
```

### Importante
Es compatible solo con PHP5 (xampp 1.7.1), con versiones mas nuevas que deprecan la func mysql_connect() no funciona, habría que adaptar todas las func de mysql a el nuevo myqsli y listo.

### Configuraciones

```php
conexion.php
// Para conectar a la base de datos, ahi están todas las variables de host, db, user y pass.


variables.php
// Tiene todas las direcciones del resto del sitio web, agregan las url ahi y las callean en caso de que quieran agregar mas.


permisosArchivos.php
// En este archivo se manejan los permisos para subir, modificar, o eliminar materiales según el tipo de usuario (alumno, profesor, o directivo), se pueden agregar mas tipos de usuario.
```



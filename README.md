# TPE Parte 3 - API Web 2

Trabajo Práctico Especial - Parte 3 (API REST)
Materia: Web 2

Alumnos:
* Juan Manuel Juarez
* Ignacio Mengochea

## Sobre el trabajo
Acá le dejamos la API para la web de equipos de la Liga Argentina que veníamos haciendo. Creamos los endpoints para poder consultar, agregar y editar los equipos y las zonas desde Postman sin necesidad de usar la web vieja.

Lo probamos con el Postman y anda todo (GET, POST y PUT).

## Como probarlo
1. Bajar los archivos del repo.
2. Importar la base de datos `db_sql` (es la misma de siempre pero por las dudas la subimos).
3. Configurar el usuario y contraseña en `app/models/equipoApiModel.php y app/models/zonaApiModel.php` si no le conecta.
4. Usar Postman para pegarles a las rutas.

## Lista de Endpoints

Acá explicamos cómo se usan los servicios que creamos.

### 1. Ver todos los equipos 
Ruta: `GET /api/equipos`

Te devuelve la lista completa.
* Si querés ordenar, le podés agregar `?sort=nombre` o `?sort=estadio` o `?sort=capitan`.
* Tambien `&order=DESC` si queres que vaya al revés.

### 2. Ver un equipo solo
Ruta: `GET /api/equipos/:id`

Ejemplo: `/api/equipos/5`
Te devuelve los datos de este equipo. Si no existe te tira un 404.

### 3. Agregar un equipo (POST)
Ruta: `POST /api/equipos`

Hay que enviarle un JSON en el body con los datos.
Ejemplo.
```json 
    {
    "nombre": "Chacarita Juniors",
    "estadio": "Estadio de Chacarita Juniors",
    "clasico": "Club Atlético Atlanta",
    "capitan": "Luciano Perdomo",
    "id_zona": 1
    }
```

### 1. Ver las 2 zonas
Ruta: `GET /api/zona`

Te devuelve la lista completa.
* Si querés ordenar, le podés agregar `?sort=nombre`.
* Tambien `&order=DESC` si queres que vaya al revés.

### 2. Ver una zona sola
Ruta: `GET /api/zona/:id`

Ejemplo: `/api/zona/1`
Te devuelve los datos de esta zona. Si no existe te tira un 404.

### 3. Agregar una zona (POST)
Ruta: `POST /api/zona`

Hay que enviarle un JSON en el body con los datos.
Ejemplo:
```json
{
    "nombre": "Zona C",
    "descripcion": "Zona C de la Primera División del Fútbol Argentino",
}
```

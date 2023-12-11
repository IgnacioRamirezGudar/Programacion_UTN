var express = require('express');
var app = express();
var index = require('./public/frontend/clases/test.js');
var path = require('path');
app.set('port', 200);
app.get('/', function (req, res) {
    res.send(app.get('port'));
});
app.listen(app.get('port'), function () {
    console.log('Servidor corriendo sobre puerto:', app.get('port'));
});
//AGREGO FILE SYSTEM
var fs = require('fs');
//AGREGO JSON
app.use(express.json());
//INDICO RUTA HACIA EL ARCHIVO
var path_archivo = "../archivos/neumaticos.json";
//INDICO RUTA PARA EL ARCHIVO PRODUCTOS-FOTOS
//const path_archivo_foto = "./archivos/productos_fotos.txt";
//AGREGO MULTER
//const multer = require('multer');
//AGREGO MIME-TYPES
//const mime = require('mime-types');
/*AGREGO STORAGE
const storage = multer.diskStorage({

    destination: "public/fotos/",
});

const upload = multer({

    storage: storage
});*/
//AGREGO MYSQL y EXPRESS-MYCONNECTION
/*const mysql = require('mysql');

const myconn = require('express-myconnection');
const db_options = {
    host: 'localhost',
    port: 3306,
    user: 'root',
    password: '',
    database: 'gomeria_bd'
};

//AGREGO MW
app.use(myconn(mysql, db_options, 'single'));

//AGREGO CORS (por default aplica a http://localhost)
const cors = require("cors");

//AGREGO MW
app.use(cors());*/
//DIRECTORIO DE ARCHIVOS ESTÁTICOS
app.use(express.static("public"));
//##############################################################################################//
//RUTAS PARA EL CRUD ARCHIVOS
//##############################################################################################//
//LISTAR
app.get('/neumaticos_lista', function (request, response) {
    fs.readFile(path_archivo, "UTF-8", function (err, archivo) {
        if (err)
            throw ("Error al intentar leer el archivo.");
        console.log("Archivo leído.");
        var prod_array = archivo.split(",\r\n");
        response.send(JSON.stringify(prod_array));
    });
});
//Agregar
app.get('/neumatico', function (request, response) {
    response.require(index);
});
app.get('/test', function (request, response) {
    response.type('text/javascript');
    response.sendFile(path.resolve(__dirname, 'public/frontend/clases/test.js'));
});

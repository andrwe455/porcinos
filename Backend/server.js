const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const app = express();
const path = require('path');
const mongo = require('./database/mongo.js');
const ejs = require('ejs');
const express = require('express');
const path = require('path');

// Configura la carpeta de vistas
app.set('view engine', 'ejs');

// Configura la carpeta de archivos estáticos
app.use(express.static(path.join(__dirname, 'public')));

// Ruta principal
app.get('/', (req, res) => {
  res.render('index'); // Renderiza la vista 'index.ejs'
});

app.listen(3000, () => {
  console.log('Servidor en puerto 3000');
});



const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor escuchando en el puerto ${PORT}`);
    console.log(`http://localhost:${PORT}`);
});

mongo.connect()
//parseo del body
app.use(express.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(cors(({ origin: '*' })));
app.use(express.json());


//frontend

app.set('view engine', 'ejs');
app.set('views', path.resolve(__dirname, '../Frontend/views'));

app.get('/', (req, res) => {
    res.render('index');
});




// Rutas de tu API
const router =require('./routes/routes.js');
app.use('/', router);
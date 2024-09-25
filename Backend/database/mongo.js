// Create a MongoClient with a MongoClientOptions object to set the Stable API version

const mongoose = require('mongoose');
const uri3 = "mongodb://0.tcp.ngrok.io:12509/porcinos";

function connect() {
    return mongoose.connect(uri3)
        .then((conn) => {
            console.log('Conectado a la base de datos');
            return conn;  // Devolver la conexión para su uso posterior
        })
        .catch((error) => {
            console.error('Error de conexión', error);
            throw error;  // Lanza el error para manejarlo en el nivel superior
        });
}

module.exports = { connect, mongoose };



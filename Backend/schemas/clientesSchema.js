const mongoose = require('mongoose');

const clientesSchema = new mongoose.Schema({
    Cedula: String,
    Nombre:{
        type: String,
        required: true
    },
    Apellido:{
        type: String,
        required: true
    },
    Dirección:{
        type: String,
        required: true
    },
    Telefono:{
        type: String,
        required: true
    }
});

const Cliente = mongoose.model('Cliente', clientesSchema, 'clientes');

module.exports = Cliente;
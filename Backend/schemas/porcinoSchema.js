const mongose = require('mongoose');

const porcinoSchema = new mongose.Schema({
    identificacion: String,
    Raza: {
        type: String,
        enum:["york","hamp","duroc"]
    },
    Edad: Number,
    Peso: Number,
    Alimentacion: {
        Descripcion: String,
        dosis: Number
    },
    Cliente: String
});

const Porcino = mongose.model('Porcino', porcinoSchema, 'porcinos');

module.exports = Porcino;
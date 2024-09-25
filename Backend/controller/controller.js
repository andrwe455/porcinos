const porcinoSchema = require('../schemas/porcinoSchema');
const Cliente = require('../schemas/clientesSchema');


function createPorcino(req, res) {
    const { identificacion, clienteId } = req.body;
    Cliente.findById(clienteId)
    .then((cliente) => {
        if (!cliente) {
            return ({ message: 'Cliente not found' });
        }

        const porcino = new porcinoSchema({ identificacion, cliente: clienteId });
        return porcino.save();
    })
    .then((porcino) => {
        res.status(201).json(porcino);
    })
    .catch((error) => {
        res.status(400).json(error);
    });
}

function getPorcinos(req, res) {
    porcinoSchema.find()
        .then((porcinos) => {
            res.status(200).json(porcinos);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

function getPorcino(req, res) {
    const { identificacion } = req.params;
    porcinoSchema.findOne
        ({ identificacion })
        .then((porcino) => {
            res.status(200).json(porcino);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

function updatePorcino(req, res) {
    const { identificacion } = req.params;
    const porcino = req.body;
    porcinoSchema.findOneAndUpdate
        ({ identificacion }, porcino, { new: true })
        .then((porcino) => {
            res.status(200).json(porcino);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

function deletePorcino(req, res) {
    const { identificacion } = req.params;
    porcinoSchema.findOneAndDelete
        ({ identificacion })
        .then((porcino) => {
            res.status(200).json(porcino);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

function getClientes(req, res) {
    Cliente.find()
        .then((clientes) => {
            res.status(200).json(clientes);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

function getCliente(req, res) {
    const { Cedula } = req.params;
    Cliente.findOne
        ({ Cedula })
        .then((cliente) => {
            res.status(200).json(cliente);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

function createCliente(req, res) {
    const { Cedula, Nombre, Apellido, Dirección, Telefono } = req.body;
    const cliente = new Cliente({ Cedula, Nombre, Apellido, Dirección, Telefono });
    cliente.save()
        .then((cliente) => {
            res.status(201).json(cliente);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

function updateCliente(req, res) {
    const { Cedula } = req.params;
    const cliente = req.body;
    Cliente.findOneAndUpdate
        ({ Cedula }, cliente, { new: true })
        .then((cliente) => {
            res.status(200).json(cliente);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

function deleteCliente(req, res) {
    const { Cedula } = req.params;
    Cliente.findOneAndDelete
        ({ Cedula })
        .then((cliente) => {
            res.status(200).json(cliente);
        })
        .catch((error) => {
            res.status(400).json(error);
        });
}

module.exports = { createPorcino, getPorcinos, getPorcino, updatePorcino, deletePorcino, getClientes, getCliente, createCliente, updateCliente, deleteCliente };
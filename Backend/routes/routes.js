const {Router} = require('express');
const router = Router();
const controller = require('../controller/controller');


router.post('/porcino', controller.createPorcino);
router.get('/porcinos', controller.getPorcinos);
router.get('/porcino/:identificacion', controller.getPorcino);
router.put('/porcino/:identificacion', controller.updatePorcino);
router.delete('/porcino/:identificacion', controller.deletePorcino);

router.post('/cliente', controller.createCliente);
router.get('/clientes', controller.getClientes);
router.get('/cliente/:Cedula', controller.getCliente);
router.put('/cliente/:Cedula', controller.updateCliente);
router.delete('/cliente/:Cedula', controller.deleteCliente);


router.get('/porcino_view', controller.porcinoView);
router.get('/clientes_view', controller.clienteView);
router.get('/porcino_new', controller.getPorcinoNew);
router.get('/cliente_new', controller.getClienteNew);
router.get('/porcino_update', controller.getPorcinoEdit);
router.get('/cliente_update', controller.getClienteEdit);
router.get('/porcino_delete', controller.getPorcinoDelete);
router.get('/cliente_delete', controller.getClienteDelete);


module.exports = router;
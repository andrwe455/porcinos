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




module.exports = router;
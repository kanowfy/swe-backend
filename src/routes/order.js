const express = require("express");
const {
    getAllOrders,
    createOrder,
    getOrderByCustomerId,
    updateOrder,
    deleteOrder,
} = require("../controllers/order");

const router = express.Router();

router.route("/").get(getAllOrders).post(createOrder);
router.route("/:customerId").get(getOrderByCustomerId);
router.route("/:id").put(updateOrder).delete(deleteOrder);

module.exports = router;

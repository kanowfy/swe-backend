const express = require("express");
const {
    getAllOrders,
    createOrder,
    getUserOrders,
    updateOrder,
    deleteOrder
} = require("../controllers/order");
const { verifyAndAuthorize, verifyAndAuthorizeAdmin } = require("../middleware/verifyToken");

const router = express.Router();

router.get("/", verifyAndAuthorizeAdmin, async (req, res) => {
    await getAllOrders(req, res);
})

router.get("/:id", verifyAndAuthorize, async (req, res) => {
    await getUserOrders(req, res);
})

router.post("/", verifyAndAuthorize, async (req, res) => {
    await createOrder(req, res);
})

router.put("/:id", verifyAndAuthorizeAdmin, async (req, res) => {
    await updateOrder(req, res);
})

router.delete("/:id", verifyAndAuthorizeAdmin, async (req, res) => {
    await deleteOrder(req, res);
})

module.exports = router;

const express = require("express");
const {
    getAllCarts,
    createCart,
    getUserCart,
    updateCart,
    deleteCart
} = require("../controllers/cart");
const { verifyAndAuthorize, verifyAndAuthorizeAdmin } = require("../middleware/verifyToken");

const router = express.Router();

router.get("/", verifyAndAuthorizeAdmin, async (req, res) => {
    await getAllCarts(req, res);
})

router.get("/:id", verifyAndAuthorize, async (req, res) => {
    await getUserCart(req, res);
})

router.post("/", verifyAndAuthorize, async (req, res) => {
    await createCart(req, res);
})

router.put("/:id", verifyAndAuthorize, async (req, res) => {
    await updateCart(req, res);
})

router.delete("/:id", verifyAndAuthorize, async (req, res) => {
    await deleteCart(req, res);
})

module.exports = router;

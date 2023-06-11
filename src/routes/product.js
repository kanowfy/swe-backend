const express = require("express");
const {
    getAllProducts,
    addProduct,
    getProductById,
    updateProduct,
    deleteProduct
} = require("../controllers/product");
const { verifyAndAuthorizeAdmin } = require("../middleware/verifyToken");

const router = express.Router();

router.get("/", async (req, res) => {
    await getAllProducts(req, res);
})

router.get("/:id", async (req, res) => {
    await getProductById(req, res);
})

router.post("/", verifyAndAuthorizeAdmin, async (req, res) => {
    await addProduct(req, res);
})

router.put("/:id", verifyAndAuthorizeAdmin, async (req, res) => {
    await updateProduct(req, res);
})

router.delete("/:id", verifyAndAuthorizeAdmin, async (req, res) => {
    await deleteProduct(req, res);
})

module.exports = router;

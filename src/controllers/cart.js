const cartService = require("../services/cart");

exports.getAllCarts = async (req, res) => {
    try {
        const carts = await cartService.getAllCarts();
        res.json({ data: carts, status: "success" });
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};

exports.createCart = async (req, res) => {
    try {
        const cart = await cartService.createCart(req.body);
        res.json({ data: cart, status: "success" });
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};

exports.getUserCart = async (req, res) => {
    try {
        const cart = await cartService.getUserCart(req.params.id);
        res.json({ data: cart, status: "success" });
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};

exports.updateCart = async (req, res) => {
    try {
        const cart = await cartService.updateCart(req.params.id, req.body);
        res.json({ data: cart, status: "success" });
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};

exports.deleteCart = async (req, res) => {
    try {
        await cartService.deleteCart(req.params.id);
        res.json({ status: "success" });
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
};

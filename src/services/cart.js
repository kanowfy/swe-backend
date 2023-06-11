const CartModel = require("../models/Cart");

exports.getAllCarts = async () => {
    return await CartModel.find({});
}

exports.createCart = async (cart) => {
    return await CartModel.create(cart);
}

exports.getUserCart = async (id) => {
    return await CartModel.findOne({ userId: id });
}

exports.updateCart = async (id, cart) => {
    return await CartModel.findByIdAndUpdate(id, cart);
}

exports.deleteCart = async (id) => {
    return await CartModel.findByIdAndDelete(id);
}

const OrderModel = require("../models/Order");

exports.getAllOrders = async () => {
    return await OrderModel.find({});
}

exports.createOrder = async (order) => {
    return await OrderModel.create(order);
}

exports.getUserOrders = async (id) => {
    return await OrderModel.find({ userId: id });
}

exports.updateOrder = async (id, order) => {
    return await OrderModel.findByIdAndUpdate(id, order);
}

exports.deleteOrder = async (id) => {
    return await OrderModel.findByIdAndDelete(id);
}

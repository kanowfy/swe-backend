const express = require("express");
const cors = require('cors')
require("dotenv").config();
const app = express();
const connectDB = require("./src/config/mongo");

const PORT = process.env.PORT;
app.use(cors())
app.use(express.json());
app.use(
    express.urlencoded({
        extended: true,
    })
);

// import routers
const userRouter = require("./src/routes/user");
const productRouter = require("./src/routes/product");
const toppingRouter = require("./src/routes/variation/topping");
const categoryRouter = require("./src/routes/variation/category");
const sizeRouter = require("./src/routes/variation/size");
const orderRouter = require("./src/routes/order");
const transactionRouter = require("./src/routes/transaction");

// use routers
app.use("/api/user", userRouter);
app.use("/api/products", productRouter);
app.use("/api/variation/topping", toppingRouter);
app.use("/api/variation/category", categoryRouter);
app.use("/api/variation/size", sizeRouter);
app.use("/api/order", orderRouter);
app.use("/api/transaction", transactionRouter);


app.listen(PORT, () => {
    console.log(`Listening on port ${PORT}`)
    connectDB();
});

module.exports = app

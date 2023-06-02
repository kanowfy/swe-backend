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
const authRouter = require("./src/routes/auth");
const authTestRouter = require("./src/routes/authtest");

// use routers
app.use("/api/user", authRouter);
app.use("/resource", authTestRouter);

app.listen(PORT, () => {
    console.log(`Listening on port ${PORT}`)
    connectDB();
});

module.exports = app

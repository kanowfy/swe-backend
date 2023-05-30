const express = require("express");
const cors = require('cors')
require("dotenv").config();
const app = express();
const connectDB = require("./src/config/mongo");

// add route dependency here

const PORT = process.env.PORT;
app.use(cors())
app.use(express.json());
app.use(
    express.urlencoded({
        extended: true,
    })
);

// use router middleware here

app.listen(PORT, () => {
    console.log(`Listening on port ${PORT}`)
    connectDB();
});

module.exports = app

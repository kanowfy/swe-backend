const { mongoose } = require("mongoose");

const categorySchema = new mongoose.Schema({
    size: {
        type: String,
        required: true,
        enum: ["S", "M", "L"]
    },
    price: {
        type: Number,
        required: true,
        max: 999999
    }
});

module.exports = mongoose.model("Category", categorySchema);

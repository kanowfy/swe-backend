const { mongoose } = require("mongoose");

const productSchema = new mongoose.Schema({
    name: {
        type: String,
        required: true,
        minLength: 5,
    },
    category: {
        type: String,
        required: true,
        enum: ['ice-cream', 'beverage']
    },
    description: {
        type: String,
    },
    price: {
        type: Number,
        required: true,
        max: 999999
    },
    image: {
        type: String,
        required: true
    },
    dateCreated: {
        type: Date,
        default: Date.now
    }
});

module.exports = mongoose.model('Product', productSchema)

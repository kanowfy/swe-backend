const { mongoose } = require("mongoose");
const Variation = require("./Variation");

const productSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true,
    minLength: 5,
  },
  description: {
    type: String,
  },
  basePrice: {
    type: Number,
    required: true,
    max: 999999,
  },
  discount: {
    type: Number,
    default: 0,
  },
  category: [
    {
      title: {
        type: String,
        required: true,
      },
    },
  ],
  variations: [Variation.schema],
  toppingList: [
    {
      toppingId: {
        type: String,
      },
    },
  ],
  image: {
    type: String,
    required: true,
  },
  dateCreated: {
    type: Date,
    default: Date.now,
  },
});

module.exports = mongoose.model("Product", productSchema);

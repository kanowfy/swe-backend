const router = require('express').Router();
const verified = require("../middleware/verifyToken");

router.get("/", verified, (req, res) => {
    res.send("super secret data");
})

module.exports = router;

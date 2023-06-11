const router = require('express').Router();
const User = require("../models/User");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const { registerValidation, loginValidation } = require("../utils/validation");

router.post('/register', async (req, res) => {
    const { error } = registerValidation(req.body);
    if (error) return res.status(400).json(error.details[0].message);

    const usernameExists = await User.findOne({ username: req.body.username });
    if (usernameExists) return res.status(400).json("username already exists");

    const phoneNumberExists = await User.findOne({ phoneNumber: req.body.phoneNumber });
    if (phoneNumberExists) return res.status(400).json("number has been used");

    const salt = await bcrypt.genSalt(10);
    const hashedPassword = await bcrypt.hash(req.body.password, salt);

    const user = new User({
        username: req.body.username,
        password: hashedPassword,
        phoneNumber: req.body.phoneNumber
    });

    try {
        await user.save();
        res.json({ id: user._id });
    } catch (err) {
        res.status(400).json(err);
    }
});

router.post('/login', async (req, res) => {
    const { error } = loginValidation(req.body);
    if (error) return res.status(400).json(error.details[0].message);

    const user = await User.findOne({ phoneNumber: req.body.phoneNumber });
    if (!user) return res.status(400).json("account not found");

    const validPassword = await bcrypt.compare(req.body.password, user.password);
    if (!validPassword) return res.status(400).json("invalid password");

    const token = jwt.sign({ id: user._id, isAdmin: user.isAdmin }, process.env.JWT_SECRET, { expiresIn: "7d" });
    res.header('TOKEN', token).json(token);
});

module.exports = router

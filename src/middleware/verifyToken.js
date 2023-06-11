const jwt = require('jsonwebtoken');

const verifyToken = (req, res, next) => {
    const token = req.header("TOKEN");
    if (!token) return res.status(401).json("Access Denied");
    try {
        const verified = jwt.verify(token, process.env.JWT_SECRET);
        req.user = verified;
        next();
    } catch (err) {
        res.status(403).json("Invalid token");
    }
}

const verifyAndAuthorize = (req, res, next) => {
    verifyToken(req, res, () => {
        if (req.user.id === req.params.id || req.user.isAdmin) {
            next();
        } else {
            return res.status(403).json("Access denied")
        }
    })
}

const verifyAndAuthorizeAdmin = (req, res, next) => {
    verifyToken(req, res, () => {
        if (req.user.isAdmin) {
            next();
        } else {
            return res.status(403).json("Access denied")
        }
    })
}

module.exports = { verifyToken, verifyAndAuthorize, verifyAndAuthorizeAdmin };



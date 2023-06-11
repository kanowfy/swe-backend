const router = require('express').Router();
const { getAllUsers, getUserById, deleteUser, updateUser } = require('../controllers/user');
const { verifyAndAuthorize, verifyAndAuthorizeAdmin } = require('../middleware/verifyToken');

router.put("/:id", verifyAndAuthorize, async (req, res) => {
    if (req.body.password) {
        const salt = await bcrypt.genSalt(10);
        req.body.password = await bcrypt.hash(req.body.password, salt);
    }

    await updateUser(req, res);
});

router.get("/", verifyAndAuthorizeAdmin, async (req, res) => {
    await getAllUsers(req, res);
});

router.get("/:id", verifyAndAuthorizeAdmin, async (req, res) => {
    await getUserById(req, res);
});

router.delete("/:id", verifyAndAuthorize, async (req, res) => {
    await deleteUser(req, res);
})

module.exports = router

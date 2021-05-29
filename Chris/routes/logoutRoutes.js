const express = require('express');
const app = express();
const router = express.Router();
const bodyParser = require('body-parser');
const bcrypt = require('bcrypt');
const User = require('../schema/UserSchema');

app.use(bodyParser.urlencoded({ extended: false }))

router.get("/",(req, res, next) => {
    
    if(req.session){
        req.session.destroy(()=>{
            res.render("login");
        })
    }
})

router.post("/",(req, res, next) => {
    res.redirect("/");
})

module.exports = router;
const express = require('express');
const app = express();
const router = express.Router();
const bodyParser = require('body-parser');
const bcrypt = require('bcrypt');

const User = require('../schema/UserSchema');

app.set("view engine", "pug");
app.set("views", "views");
app.use(bodyParser.urlencoded({ extended: false }))


router.get("/",(req, res, next) => {
    res.status(200).render("login");
})



router.post("/", async (req, res, next) => {
    var payload = req.body;

    if(req.body.logStaffId && req.body.logPassword) {
        var user = await User.findOne( {
            $or: [
                {staffId: req.body.logStaffId },
                {email: req.body.logstaffId }]
        })
        .catch((error) => {
            console.log(error)

            payload.errorMessage = "something went wrong."
            res.status(200).render("login", payload);
        });

        if (user != null){
           var result = await bcrypt.compare(req.body.logPassword, user.password)

           if(result === true){
                req.session.user = user;
                return res.redirect('/');
           }
        }
        payload.errorMessage = "login credentials incorrect."
        return res.status(200).render("login", payload);
          
        
    }
    payload.errorMessage = "make sure each field has a value."
    res.status(200).render("login", payload);
})

module.exports = router;
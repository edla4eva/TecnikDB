const express = require('express');
const app = express();
const router = express.Router();
const bodyParser = require('body-parser');
const User = require('../schema/UserSchema');
const bcrypt = require('bcrypt');


app.set("view engine", "pug");
app.set("views", "views");

app.use(bodyParser.urlencoded({ extended: false }))
router.get("/",(req, res, next) => {
    res.status(200).render("register");
})

router.post("/",async (req, res, next) => {
    
    var firstName = req.body.firstName.trim();
    var lastName = req.body.lastName.trim();
    var staffId = req.body.staffId.trim();
    var email = req.body.email.trim();
    var password = req.body.password;

    var payload = req.body;

    if(firstName && lastName && staffId && email && password){
        var user = await User.findOne( {
            $or: [
                {staffId: staffId },
                {email: email }]
        })
        .catch((error) => {
            console.log(error)

            payload.errorMessage = "something went wrong."
            res.status(200).render("register", payload);
        });
        if(user == null){
            //No user Found

            var data = req.body;
            
            data.password = await bcrypt.hash(password, 10)

            User.create(data)
            .then((user)=> {
                req.session.user = user;
                return res.redirect('/');
            })
        }
        else{
            //user found
            if(email== user.email){
                payload.errorMessage = "Email Already in use." 
            }
            else{
                payload.errorMessage = "Username Already in use."
            }
            res.status(200).render("register", payload);
        }
        
        
        
    }
    else{
        payload.errorMessage = "Make sure each field has a valid value."
        res.status(200).render("register", payload);
    }

    
})
module.exports = router;
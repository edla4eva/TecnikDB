const express = require('express');
const app = express();
const port = 3007;
const path = require('path')
const middleware = require('./middleware');
const bodyParser = require('body-parser');
const mongoose = require('./database');
const session = require('express-session');


const server = app.listen(port,() =>{
    console.log('Server listening on port ' + port);
})
 app.set("view engine", "pug");
 app.set("views", "views");

 app.use(session({
    secret:"bbq chips",
    resave: true,
    saveUninitialized: false 
 }))

app.use(bodyParser.urlencoded({ extended: false }))
app.use(express.static(path.join(__dirname, "public")));
//Routes
const loginRoute = require('./routes/loginRoutes');
app.use("/login",  loginRoute);
const registerRoute = require('./routes/registerRoutes');
app.use("/register", registerRoute)
const logoutRoute = require('./routes/logoutRoutes');
app.use("/logout", logoutRoute)
const jobRoute = require('./routes/jobsRoutes');
app.use("/jobs", jobRoute)

const staffRoute = require('./routes/staffsRoutes');
app.use("/staffs", staffRoute)



app.get("/", middleware.requireLogin, (req, res, next) => {
    var payload = {
        pageTitle: "Home" ,
        userLoggedIn: req.session.user
    }
    

    res.status(200).render("home", payload);
})
 
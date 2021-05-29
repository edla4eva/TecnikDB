const mongoose = require('mongoose');


const Schema = mongoose.Schema;
const UserSchema = new Schema({
    staffId:{type: String, required: true, trim:true, unique:true},
    firstName:{type: String, required: true, trim:true},
    lastName:{type: String, required: true, trim:true},
    email: {type: String, required: true, trim:true, unique:true},
    password: {type: String, required: true},
    profilePic: {type: String, default:"/images/profilePic.png"},
}, {timestamps: true});

var User = mongoose.model('User', UserSchema);

module.exports = User;
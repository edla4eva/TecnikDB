const mongoose = require('mongoose');
mongoose.set('useNewUrlParser', true);
mongoose.set('useUnifiedTopology', true);
mongoose.set('useFindAndModify', false);


class Database {

    constructor(){
        this.connect();
    }
    
    connect(){
        mongoose.connect('mongodb+srv://admin:12345@twitterclonecluster.p7chq.mongodb.net/TrinityKars?retryWrites=true&w=majority')
        .then(() => {
            console.log('database connection successful');
        })
        .catch((err) => {
                console.log('database connection unsuccessful '+ err);
        })
    }
         
      
}
module.exports = new Database();
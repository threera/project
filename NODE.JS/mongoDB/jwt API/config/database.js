const mongoose = require('mongoose');

const { MONGO_URI } = process.env;


exports.connect = () => {
    mongoose.set('strictQuery', true);
    mongoose.connect(MONGO_URI, {
        useNewUrlParser: true,
        useUnifiedTopology: true,
     /*    useCreateIndex : true,
        useFindAndModify : false */
    })
    .then(() => {
        console.log('Connect');
    })
    .catch((error) => {
        console.log('Error');
        console.error(error);
        process.exit(1);
    })
}
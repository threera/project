require('dotenv').config();
require('./config/database').connect();

const express = require('express');
const User = require('./model/user');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const auth = require('./middleware/auth')

const app = express();

app.use(express.json())

//register
app.post('/register', async (req, res) => {

    try {
        // get user input 
        const { first_name, last_name, email, password } = req.body;

        // Validate user input
        if (!(first_name && last_name && password && email)) {
            res.status(404).send("All input is required")
        }

        // check if user already  exists
        const oldUser = await User.findOne({ email });

        if (oldUser) {
            res.status(409).send("User already exists, please  login")
        }

        // Encrypt user password
        encryptedPassword = await bcrypt.hash(password, 10);

        // create new user
        const user = await User.create({
            first_name,
            last_name,
            email: email.toLowerCase(),
            password: encryptedPassword
        })

        // Create Token
        const token = jwt.sign(
            {
                user_id: user._id,
                email
            },
            process.env.TOKEN_KEY,
            {
                expiresIn: "2h"
            }
        )

        //save user token
        user.token = token;

        res.status(201).json(user)

    } catch (error) {
        console.log(error);
    }

})



//login
app.post('/login', async (req, res) => {

    //get user input
    const { email, password } = req.body;

    try {
        //validate user input 
        if (!(email && password)) {
            res.status(400).send("All input is required")
        }

        //validate if user exist in our database
        const user = await User.findOne({ email });

        if (user && (await bcrypt.compare(password, user.password))) {
            // crate token
            const token = jwt.sign(
                {
                    user_id: user._id, email
                },
                process.env.TOKEN_KEY,
                {
                    expiresIn: "2h"
                },
            )

            user.token = token;

            res.status(200).json(user)
        }
        res.status(400).send("Invalid Credentials")
    } catch (error) {
        console.log(error);
    }


})

app.post('/welcome', auth, (req, res) => {
    res.status(200).send("Welcome")
})

module.exports = app;

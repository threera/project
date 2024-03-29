import Users from '../model/user'


// GET http://localhost:3000/api/users
export async function getUsers(req, res) {
    try {
        const users = await Users.find({})
        if (!users) return res.status(404).json({ error: "Data not Found" })
        return res.status(200).json(users)
    } catch (error) {
        res.status(404).json({ error: "Error" })
    }
}

// GET id
export async function getUser(req, res) {
    try {
        const { userId } = req.query;

        if (userId) {
            const user = await Users.findById(userId)
            res.status(200).json(user)
        }
        res.status(404).json({ error: "User Not Selected...!" })
    } catch (error) {
        res.status(404).json({ error: "Cannot get the User...!" })
    }
}


// POST http://localhost:3000/api/users
export async function postUser(req, res) {
    try {
        const formData = await req.body
        if (!formData) return res.status(404).json({ error: "Form Data Not Frovided...!" })
        Users.create(formData, (err, data) => {
            return res.status(200).json(data)
        })
    } catch (error) {
        res.status(404).json({ error: "Error" })
    }
}

// PUT http://localhost:3000/api/users/1
export async function putUser(req, res) {
    try {
        const { userId } = req.query;
        const formData = req.body
        if (userId && formData) {
            const user = await Users.findByIdAndUpdate(userId, formData)
            return res.status(200).json(user)
        }
        res.status(404).json({ error: "User Not Selectted...!" })
    } catch (error) {
        res.status(404).json({ error: "Error" })
    }
}

// DELETE http://localhost:3000/api/users/1
export async function deleteUser(req, res) {
    try {
        const { userId } = req.query;
        if (userId) {
            const user = await Users.findByIdAndDelete(userId)
            
             res.status(200).json(user)
        }
        res.status(404).json({ error: "User Not Selectted...!" })
    } catch (error) {
        res.status(404).json({ error: "Error" })
    }
}
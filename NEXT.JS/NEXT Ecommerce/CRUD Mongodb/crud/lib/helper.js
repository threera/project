
//GET
export const getUsers = async () => {
    const response = await fetch('http://localhost:3000/api/users')
    const json = await response.json()
    return json
}

// GET ID
export const getUser = async (userId) => {
    const response = await fetch(`http://localhost:3000/api/users/${userId}`)
    const json = await response.json()
    if (json) return json
    return {}
}

// POST
export const addUser = async (formDataa) => {
    try {
        const Option = {
            method: 'POST',
            headers: { 'Content-Type': "application/json" },
            body: JSON.stringify(formDataa)
        }

        const response = await fetch(`http://localhost:3000/api/users`, Option)
        const json = await response.json()
        return json

    } catch (error) {
        return error
    }

}

// Update
export const updateUser = async (userId, formDataa) => {
    try {
        const Option = {
            method: 'PUT',
            headers: { 'Content-Type': "application/json" },
            body: JSON.stringify(formDataa)
        }

        const response = await fetch(`http://localhost:3000/api/users/${userId}`, Option)
        const json = await response.json()
        return json

    } catch (error) {
        return error
    }

}

// DELETE ID
export const deleteUser = async (userId, formDataa) => {
    try {
        const Option = {
            method: 'DELETE',
            headers: { 'Content-Type': "application/json" },
            body: JSON.stringify(formDataa)
        }

        const response = await fetch(`http://localhost:3000/api/users/${userId}`, Option)
        const json = await response.json()
        return json

    } catch (error) {
        return error
    }
}



import { useReducer } from "react"
import { BiBrush } from "react-icons/bi";
import Success from "./Success"
import Bug from "./Bug"
import { useQuery, useMutation, useQueryClient } from "react-query";
import { getUser, getUsers, updateUser } from "../lib/helper";


export default function UpdateUserForm({ formId, formData, setFormData }) {

    const queryClient = useQueryClient()
    const { isLoading, isError, data, error } = useQuery(['users', formId], () => getUser(formId))
    const UpdateMutation = useMutation((newData) => updateUser(formId, newData), {
        onSuccess: async (data) => {
            // queryClient.setQueryData('users', (old) => [data])
            queryClient.prefetchQuery('users', getUsers)
        }
    })

    if (isLoading) return <div>Loading...</div>
    if (isError) return <div>Error</div>

    const { name, avatar, salary, date, email, status } = data
    const [firstname, lastname] = name ? name.split(' ') : formData

    const handleSubmit = async (e) => {
        e.preventDefault();
        let userName = `${formData.firstname ?? firstname} ${formData.lastname ?? lastname}`
        let updated = Object.assign({}, data, formData, { name: userName })
        console.log(updated);
        await UpdateMutation.mutate(updated)
    }

    return (
        <form className="grid lg:grid-cols-2 w-4/6 gap-4" onSubmit={handleSubmit}>
            <div className="input-type">
                <input type="text" name="firstname" onChange={setFormData} defaultValue={firstname} className="border w-full px-5 py-3 focus:outline-none rounded-md" placeholder="FirstName" />
            </div>
            <div className="input-type">
                <input type="text" name="lastname" onChange={setFormData} defaultValue={lastname} className="border w-full px-5 py-3 focus:outline-none rounded-md" placeholder="LastName" />
            </div>
            <div className="input-type">
                <input type="text" name="email" onChange={setFormData} defaultValue={email} className="border w-full px-5 py-3 focus:outline-none rounded-md" placeholder="Email" />
            </div>
            <div className="input-type">
                <input type="text" name="salary" onChange={setFormData} defaultValue={salary} className="border w-full px-5 py-3 focus:outline-none rounded-md" placeholder="Salary" />
            </div>
            <div className="input-type">
                <input type="date" name="date" onChange={setFormData} defaultValue={date} className="border px-5 py-3 focus:outline-none rounded-md" placeholder="Salary" />
            </div>
            <div className="flex gap-10 items-center">
                <div className="form-check">
                    <input type="radio" value="Active" defaultChecked={status == "Active"} onChange={setFormData} id="radioDefault1" name="status" className="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-gray-500 focus:outline-none transtion-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" />
                    <label htmlFor="radioDefault1" className="inline-block let-gray-800">Active</label>
                </div>
                <div className="form-check">
                    <input type="radio" value="Inactive" defaultChecked={status !== "Active"} onChange={setFormData} id="radioDefault2" name="status" className="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-gray-500 focus:outline-none transtion-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" />
                    <label htmlFor="radioDefault2" className="inline-block let-gray-800">Inactive</label>
                </div>
            </div>

            <button type="submit" className="flex justify-center text-md w-2/6 bg-yellow-500 text-white px-4 py-2 border rounded-md hover:bg-gray-50 hover:border-yellow-500 hover:text-yellow-500 ">
                Update <span className="px-1"><BiBrush size={24}></BiBrush></span></button>
        </form>
    )
}
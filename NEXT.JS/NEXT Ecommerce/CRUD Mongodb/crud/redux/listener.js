import { createListenerMiddleware } from "@reduxjs/toolkit";
import { toggleChangAction, updateAction } from "./reducer"; 


const listenerMiddleware = createListenerMiddleware()


listenerMiddleware.startListening({
    actionCreator:toggleChangAction,
    effect:async(action, listenerApi)=> {
        listenerApi.dispatch(updateAction(action.payload))
    }
})
export default listenerMiddleware
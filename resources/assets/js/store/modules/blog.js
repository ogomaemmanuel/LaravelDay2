import axios from 'axios'

const state={
    blogs:[]
}

const getters={

}


const mutations={


}



const actions ={
    getBlogs(store){

    },

    createBlog(store, newBlog){
        axios.post('/')


    }

}


export default {
    state,
    getters,
    mutations,
    actions
}


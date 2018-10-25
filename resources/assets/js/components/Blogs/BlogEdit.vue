<template>
    <div>
        <el-form ref="form" :model="blog" label-width="120px">
            <el-form-item label="Activity name">
                <el-input v-model="blog.title"></el-input>
            </el-form-item>
            <el-form-item label="Body">
                <el-input type="textarea" v-model="blog.body"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">Create</el-button>
                <el-button>Cancel</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                blog:{
                    title:'',
                    body:'',
                    id:'',
                    user_id:'',
                }
            }
        }
    }
</script>

<style>

</style>
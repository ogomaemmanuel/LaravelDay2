<template>
    <div>
        <el-form ref="form" :model="blog" label-width="120px">
            <el-form-item label="Title">
                <el-input v-model="blog.title"></el-input>
            </el-form-item>
            <el-form-item label="Body">
                <el-input :rows="8" type="textarea" :placeholder="userData.id" v-model="blog.body"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click.prevent="createBlog">Create</el-button>
                <el-button @click="goBackToBlogList()" >Cancel</el-button>
            </el-form-item>
        </el-form>

    </div>


</template>

<script>
    export default {
        props: ['userData'],
        data(){
            return{
                blog:{
                    title:'',
                    body:'',
                    user_id:'',
                }
            }
        },
        methods:{
            goBackToBlogList(){
                this.$router.go(-1);
            },

            createBlog() {
                let self = this;
                self.blog.user_id = self.userData.id;

                let data = self.blog;

                axios.post('/api/postblog', data).then(function (response) {

                    self.$notify({
                        title: 'Blog',
                        message: 'Blog posted Successfully'
                    });
                    self.$router.go(-1);

                }).catch(error=>{

                    self.$notify({
                        type: 'error',
                        title: 'Blog',
                        message: 'Blog could not be posted Successfully'
                    });


                });




            }

//            createBlog(){
//                this.$store.dispatch('createBlog',this.blog).then(()=>{
//                    this.blog={};
//                });
//            }


        }
    }
</script>

<style>

</style>
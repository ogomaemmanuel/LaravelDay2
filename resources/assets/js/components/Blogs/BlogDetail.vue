<template>
    <div>
        <div>

            <h4> Blog Detail</h4>
            <div class="blog-body">
            <div class="blog-header">
            <h4>{{blog.title}}</h4>
            </div>
            <div class="blog-body-container">
            <div class="blog-detail">
            <span class="blog-icon"> <i class="el-icon-picture"></i> {{blog.user.name}}</span>
            <span  class="blog-icon">  <i class="el-icon-date"></i> {{blog.created_at}} </span>
            <span class="blog-icon"> <i class="el-icon-share"></i></span>
            </div>{{blog.created_at}}
            <div class="blog-content">
            <p> {{blog.body}}</p>
            </div>
                <h6>Comments</h6>
            </div>
                <table>
                    <tr v-for="comment in blog.comments" >
                        <td> {{comment.body}}</td>
                    </tr>
                </table>
                <el-button @click="goBackToBlogList()" >Back</el-button>
            </div>
        </div>
    </div>
</template>

<script>


    export default {
        data() {
            return {

                blog: {
                    title:"",
                    created_at:"",
                    user:{
                        name:"",
                    },
                    comments:[],
                }
            }

        },


        methods: {
        anything() {
            let vm = this;
            let id = this.$route.params.id;

            console.log("Blog Id",id);
            axios.get('/api/blog/'+id).then(response => {
               this.blog= response.data;
            })
        },
            goBackToBlogList(){
                this.$router.go(-1);
            },
        },


        beforeMount(){
            this.anything()
        },


    }


</script>
<style scoped>

    .blog-body {
        height:100%;
        color: #1b1e21;
        background-color: #FFFFFF;
        width: 400px;
        margin-top: 20px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom:0px;

    }
    .read-more{
        margin-right: 5px;
    }

    .blog-header {
        position: relative;
        text-align: center;
        color: #000000;
        margin-top: 0px;
        background-color: #F2F2F2;
        height: 50%;
        padding-top: 80px;

    }

    .blog-content {
        margin-top: 5px;

    }

    .blog-body-container{
        margin-left: 20px;
        margin-bottom: 0px;

    }

    .blog-icon{
        margin-right: 15px;
    }
    .read-more{
        float: right;
        margin-buttom:2px;
    }


</style>
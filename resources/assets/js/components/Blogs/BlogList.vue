<template>
    <div>

        <el-button @click="goToBlogCreate()" type="primary" icon="el-icon-edit"></el-button>

        <blog v-for="blog in blogs" :key="blog.id" :blog="blog">

            <div slot="readmore" class="read-more">
                <el-button @click="goToBlogDetail(blog.id)"type="primary">Read More</el-button>
            </div>

        </blog>
    </div>
</template>

<script>

    import blog from './Blog.vue'

    export default {
        components: {
            blog,
        },


        data() {
            return {
                blogs: []
            }
        },

        methods: {
            goToBlogCreate: function () {
                this.$router.push('blogcreate')

            },

            goToBlogDetail(id){
               // this.$router.push('blogdetail',)
                this.$router.push({ name: 'blogdetail', params: { id: id }})
            }



        },

        created() {
            let vm = this;
            axios.get('api/bloglist').then(resp => {


               // console.log(resp.data.data)
                vm.blogs = resp.data.data;

            })

        }
    }
</script>

<style>

</style>
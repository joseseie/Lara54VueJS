<template>

    <div>
        <hr>

        <p class="text-center" v-for="like in likes">

            <img :src="like.user.avatar" alt="" width="40px" height="40px" class="avatar-like" />

        </p>

        <hr>

        <button class="btn btn-primary">
            Like this post
        </button>

        <button class="btn btn-danger">
            Unlike this post
        </button>

    </div>

</template>

<script>
    export default {

        mounted() {
            this.posts_likes();
        },
        props: ['id'],
        data(){
            return {
                likes: null,
            }

        },
        computed: {
            post() {

                return this.$store.state.posts.find( ( post ) => {
                    return post.id === this.id
              })
            }

        },
        methods: {
            posts_likes(){
                this.$http.get('/feed/likes/'+this.id)
                    .then((response) => {
                        console.log(response)
                        this.likes = response.body;
                        console.log({"Post": "Post com id "+this.id,"Likes":response});
                    })


            }
        }

    }
</script>

<style>
    .avatar-like {
        border-radius: 50%;
    }
</style>
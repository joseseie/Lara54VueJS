<template>

    <div>
        <hr>


        <p class="text-center" v-for="like in post.likes">

            <img :src="like.user.avatar" alt="" width="40px" height="40px" class="avatar-like" />

        </p>

        <hr>

        <button class="btn btn-primary" @click="mostrarId()">
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
//                        response.body.forEach((post) => {
//
//                            this.$store.commit('add_post',post)
//
//                        })
                        console.log({"Post": "Post com id "+this.id,"Likes":response});
                    })


            },
            mostrarId(){
                alert("Clicou no post com id: "+this.id)
                console.log({'user_of_post': this.post.user})
            }
        }

    }
</script>

<style>
    .avatar-likes {
        border-radius: 50%;
    }
</style>
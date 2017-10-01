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

        },
        props: ['id'],

        computed: {
            post() {

                return this.$store.state.posts.find( ( post ) => {
                    return post.id === this.id
              })
            }

        },
        methods: {
            mostrarId(){
                alert("Clicou no post com id: "+this.id+"\n"+this.post.user)
            }
        }

    }
</script>

<style>
    .avatar-likes {
        border-radius: 50%;
    }
</style>
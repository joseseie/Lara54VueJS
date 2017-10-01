<template>

    <div>
        <hr>

        <p class="text-center" v-for="like in likes">

            <img :src="like.user.avatar" alt="" width="40px" height="40px" class="avatar-like" />

        </p>

        <hr>

        <button class="btn btn-primary" v-if="!auth_user_likes_post" @click="like()">
            Like this post
        </button>

        <button class="btn btn-danger" v-else @click="unlike">
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
            likes2() {
                var likers = []

                if(this.likes != null)
                {
                    this.likes.forEach((like) => {
                        likers.push(like.user.id);
                    })
                }

                return likers
            },
            auth_user_likes_post() {

                var check_index = this.likes2.indexOf(
                    this.$store.state.auth_user.id
                )

                if(check_index == -1)
                    return false
                else
                    return true;

            },
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

                        this.likes = response.body;

                    })


            },
            like() {
                this.$http.get('/like/'+this.id)
                    .then( ( resp ) => {

                        this.$store.commit('update_post_likes', {
                            id: this.id,
                            like: resp.body
                        })
                        new Noty({
                            type: 'info',
                            layout: 'bottomLeft',
                            text: 'Post gostado com sucesso.!'
                        }).show();
                });
            },
            unlike() {
                this.$http.get('/unlike/'+this.id)
                    .then( (response) => {

                        this.$store.commit('unlike_post', {
                            post_id: this.id,
                            like_id: response.body
                        })
                        new Noty({
                            type: 'info',
                            layout: 'bottomLeft',
                            text: 'Post unliked successfuly.!'
                        }).show();

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
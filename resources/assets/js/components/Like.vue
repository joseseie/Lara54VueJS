<template>

    <div>
        <hr>
        <p class="text-center">
            //Avatars of post likes
        </p>

        <hr>

        <buttom class="btn btn-primary">
            Like this post
        </buttom>

        <buttom class="btn btn-danger">

            Unlike this post

        </buttom>        

    </div>

</template>

<script>
    export default {

        mounted() {

        },
        props: [id]

    }
</script>
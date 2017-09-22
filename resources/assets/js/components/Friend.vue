<template>
    <div class="container">
        <div class="row">

            Componente Functionando com sucesso.


        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/check_relationship_status/' + this.profile_user_id)
        }
    }
</script>

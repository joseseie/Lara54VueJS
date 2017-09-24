<template>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <textarea rows="5" class="form-control"
                        v-model="content">
                        </textarea>
                        <br>

                        <button class="btn btn-success pull-right"
                        :disabled="not_working" @click="create_post()">
                            Create a Post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        mounted() {

        },
        data() {
            return {
                content: '',
                not_working: true
            }
        },
        methods: {
            create_post() {
                this.$http.post('/create/post',{ conteudo: this.content })
                    .then((resp) => {
                        console.log(resp);
                        new Noty({
                            type: 'info',
                            layout: 'bottomLeft',
                            text: 'O seu artigo foi publicado com sucessso!'
                        }).show();
                    })
            }
        },
        watch: {
            content() {
                if(this.content.length > 0)
                    this.not_working = false;
                else
                    this.not_working = true;
            }
        }
    }

</script>
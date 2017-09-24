<template>

    <div class="container">

        <div class="row">

            <div class="col-lg-10 col-lg-offset-1">

                <div class="panel panel-default">

                    <div class="panel-heading text-center">

                        Jsoe Seie

                    </div>     

                    <div class="panel-body">

                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.

                    </div>              

                </div>

            </div>

        </div>


    </div>

</template>

<script>
    export default {

        mounted() {
            this.get_feed()
        },
        methods: {
            get_feet() {
                this.$http.get('/feed')
                    .then((response) => {
                        response.body.forEach((post) => {

                            this.$store.commit('add_post',post)
                        
                        })
                    })
            }
        }


    }
</script>

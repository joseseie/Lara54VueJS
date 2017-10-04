<template>

    <div class="container">

        <div class="row">

            <div class="col-lg-6 colg-lg-offset-3">

                <input type="text" class="input-lg form-control" placeholder="Search for other users" v-model="query" @keyup.enter="search()"/>

                <hr>

                <div class="row" v-if="results.length">

                    <div class="text-center" v-for="user in results">

                        <img src="user.avatar" alt=""/>

                        <h4 class="text-center"> {{ user.name }} </h4>
                    </div>

                </div>
            </div>

        </div>

    </div>

</template>

<script>

    var algoliasearch = require('algoliasearch');
    var client = algoliasearch("YIM6IPJ3NC", "e30124dc583621e14522fff284813a4c");
    var index = client.initIndex('users');

    export default {
        mounted() {

        },
        data() {
            return {
                query: '',
                results: []
            }
        },
        methods: {
            search() {
                index.search(this.query, (err,content) => {
//                    console.log(err,content);
                    this.results = content.hits;
                })
            }
        }
    }


</script>






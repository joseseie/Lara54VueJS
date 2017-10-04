<template>

    <div class="container">

        <div class="row">

            <div class="col-lg-6 colg-lg-offset-3">

                <input type="text" class="input-lg form-control" placeholder="Search for other users"/>

                <hr>

                <div class="row">


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
            index.search('kati', (err,content) => {
                console.log(err,content);
            })
        }
    }


</script>






<template>
    <div>
        <h1>Teste</h1>
    </div>
</template>

<script>

    export default {

        mounted(){
        //    this.teste()
            this.listen()

        },
        props:['id'],
        methods: {
            listen(){
                Echo.private('App.User.' + this.id)
                    .notification((notification) => {
                        alert('New notification')
                        console.log(notification)
                        console.log('Teste Jose seie componente good.')
                    })
            },
            teste(){
                console.log('Mensagem de teste')
                alert('componente funcionando.')
            }
        }

    }
</script>
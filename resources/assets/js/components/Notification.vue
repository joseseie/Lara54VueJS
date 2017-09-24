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
//                        noty()({
//                            type: 'success',
//                            layout: 'bottomLeft',
//                            text: notification.name + notification.message
//                        })
//                        document.getElementById("noty_audio").play()

                    })
            },
            teste(){
                console.log('Mensagem de teste')
                alert('componente funcionando.')
            }
        }

    }
</script>
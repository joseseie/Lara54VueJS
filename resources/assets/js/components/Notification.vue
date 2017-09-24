<template>
    <div>

    </div>
</template>

<script>
    import Noty from 'noty';
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
                        new Noty({
                            type: 'success',
                            layout: 'bottomLeft',
                            text: notification.name  + notification.message
                        }).show();

                        document.getElementById("noty_audio").play()

                    })
            },
            teste(){
                new Noty({
                    type: 'success',
                    layout: 'bottomLeft',
                    text: 'Mensagem de teste de Noty, Parabens noty funciona bem'
                }).show()
                alert('funcao teste\nTeste de recursos')
                
            }
        }

    }
</script>
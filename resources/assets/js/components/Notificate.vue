<template>
    
</template>

<script>
    import Noty from 'noty';
    export default {
        mounted(){
            this.notify();
        },
        props:['type','layout','text'],
        methods: {
            notify(){
                new Noty({
                    type: this.type,
                    layout: this.layout,
                    text: 'this.text'
                }).show();

                alert('Notificando o utilizador')                
            }
        }

    }
</script>
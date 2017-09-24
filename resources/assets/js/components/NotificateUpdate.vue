<template>
    
</template>

<script>
    import Noty from 'noty';
    export default {
        methods: {
            notify(){
                new Noty({
                    type: 'stccess',
                    layout: 'top',
                    text: 'Dados actualizados com sucesso.'
                }).show();

                alert('Notificando o utilizador')                
            }
        }

    }
</script>
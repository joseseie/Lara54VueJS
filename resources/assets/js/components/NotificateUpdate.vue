
<script>
    import Noty from 'noty';
    export default {
        mounted() {
            this.notify()
        },
        methods: {
            notify(){
                new Noty({
                    type: 'info',
                    layout: 'bottomLeft',
                    text: 'Os deus Dados de perfil foram actualizados com sucesso'
                }).show();

                console.log('Notificando o utilizador')                
            }
        }

    }
</script>
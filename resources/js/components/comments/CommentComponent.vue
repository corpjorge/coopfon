<template>
    <div>
        <h3 class="text-center">Envíale un mensaje <br><small>- Usuario conectado -</small></h3>
        <div class="media media-post">
            <div class="media-body">
                <form @submit.prevent="send()">
                <textarea v-model="msn.congratulations" class="form-control" placeholder="Escribe un mensaje de aprecio..." rows="6"></textarea>
                <div class="media-footer">
                    <button type="submit" class="btn btn-primary btn-wd float-right">Enviar mensaje</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                msn: {congratulations: ''}
            }
        },
        methods:{
            send(){
                const params = this.msn;
                this.msn = {congratulations: ''};

                axios.post('/felicitaciones',{
                    'congratulations': params.congratulations,
                }).then(function (response) {
                   console.log(response);
                }).catch(function (error) {
                   console.log(error);
                });
            }
        }
    }
</script>


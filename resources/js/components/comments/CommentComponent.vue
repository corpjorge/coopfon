<template>
    <div>
        <h3 class="text-center">Envíale un mensaje <br><small>- Hola {{user}} -</small></h3>
        <div class="media media-post">
            <div class="media-body">
                <form @submit="send()">
                <textarea v-model="msn.congratulations" class="form-control" placeholder="Escribe un mensaje de aprecio..." rows="6" required></textarea>
                <span id="congratulations-error" class="error text-danger" for="input-congratulations" style="display: block;">{{error[0]}}</span>
                <div class="media-footer">
                    <button type="submit" class="btn btn-primary btn-wd float-right">Enviar mensaje</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import comments from './CommentsComponent';

    export default {
        props: [
            'birthday',
            'user'
        ],
        data() {
            return {
                msn: {congratulations: ''},
                error: ''
            }
        },
        methods:{
            send(){
                const params = this.msn;
                this.msn = {congratulations: ''};
                comments.methods.commentsGet();

                axios.post('/felicitaciones',{
                    'congratulations': params.congratulations,
                    'birthday_user': this.birthday,
                }).then((errors) => {
                    this.error = '';
                    $.notify({
                        icon: "done",
                        message: "Mensaje enviado con aprecio"
                    }, {
                        type: 'success',
                        timer: 3000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                }).catch((errors) => {
                    this.error = errors.response.data.errors.congratulations;
                });
            }
        }
    }
</script>


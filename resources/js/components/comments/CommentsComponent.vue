<template>
    <div>
        <div class="media" v-for="comment in comments">
            <div class="media-body">
                <h4 class="media-heading">{{ comment.user.name }} <small> {{ date(comment.created_at).fromNow() }} </small></h4>
                <p>{{ comment.congratulations }}</p>
            </div>
        </div>
    </div>

</template>

<script>

    import moment from 'moment';

    moment.locale('es');

    export default {
        props: [
            'user',
        ],
        data() {
            return {
                comments: [],
                date: moment
            }
        },
        created(){
            this.commentsGet();
        },
        methods:{
            commentsGet(){
                let url = '/felicitaciones/coment/'+this.user;
                    axios.get(url)
                    .then((response) => {
                        this.comments = response.data;
                    });
            }
        }
    }
</script>

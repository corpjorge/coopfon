<template>
    <div>
        <div class="media" v-for="comment in comments">
            <div class="media-body">
                <h4 class="media-heading">{{ comment.user.name }} <small> {{ comment.created_at }}</small></h4>
                <p>{{ comment.congratulations }}</p>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: [
            'user',
        ],
        data() {
            return {
                comments: [],
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

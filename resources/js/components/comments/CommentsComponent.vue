<template>
    <div class="media"  >
        <div class="media-body">
            <h4 class="media-heading">Tina Andrew <small>&#xB7; 7 minutes ago</small></h4>
            <p>Chance too good. God level bars. I&apos;m so proud of @LifeOfDesiigner #1 song in the country. Panda! Don&apos;t be scared of the truth because we need to restart the human foundation in truth I stand with the most humility. We are so blessed!</p>
            <p>All praises and blessings to the families of people who never gave up on dreams. Don&apos;t forget, You&apos;re Awesome!</p>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                msnx: [],
            }
        },
        created(){
            let url = '/felicitaciones'
            axios.get(url).then(function (response) {
                this.msn = response.data;
                console.log(this.msn);
            }).catch(function (error) {
                console.log(error);
            });
        },

    }
</script>

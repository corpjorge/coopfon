<template>
    <div>
        <h3 class="text-center">Envíale un mensaje <br><small>- Usuario no conectado -</small></h3>
        <div class="media media-post">
            <div class="media-body">
                <form class="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your email">
                            </div>
                        </div>
                    </div>
                    <textarea class="form-control" placeholder="Escribe un mensaje de aprecio......" rows="6"></textarea>
                    <div class="media-footer">
                        <h6>Sign in with</h6>
                        <a href="" class="btn btn-just-icon btn-round btn-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="" class="btn btn-just-icon btn-round btn-facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="" class="btn btn-just-icon btn-round btn-google">
                            <i class="fa fa-google-plus-square"></i>
                        </a>
                        <a href="#" class="btn btn-primary float-right">Post Comment</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

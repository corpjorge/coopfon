<template>
    <div class="navbar-form">
        <div class="input-group no-border">
            <input v-model="search" @keyup="resultsGet" type="search" class="form-control" placeholder="Buscar...">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </div>
        <div v-if="results.length" class="dropdown show">
            <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton">
                <div v-for="result in results">
                    <a class="dropdown-item" :href="'/user/'+result.id+'/edit'" >
                        Nombre: {{result.name}} |
                        Email:   {{result.email}} |
                        Documento:  {{result.document}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "searchComponent",
        data() {
            return {
                results: [],
                search: ''
            }
        },
        methods:{
            resultsGet(){
                let url = '/search/users/'+this.search;
                axios.get(url)
                    .then((response) => {
                        this.results = response.data;
                    });
            }
        }
    }
</script>

<style scoped>

</style>

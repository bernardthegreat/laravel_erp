<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                
                <label id="started">By</label> {{ results.cases }}
            </div>
        </div>
        
    </div>
</template>
 

<script>
    const url = "https://coronavirus-19-api.herokuapp.com/countries/philippines";

    export default {
        data() {
            results: []
        },
        
        mounted() {
             this.interval = setInterval(() => {
                axios.get(url).then(response => { 
                this.results = response.data
                
                /* do something */
            });
            }, 3000 );
        },
    }
</script>
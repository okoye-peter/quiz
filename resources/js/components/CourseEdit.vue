<template>
    <div>
        <p @dblclick="display = !display" v-show="display" data-toggle="tooltip" data-placement="top" title="double click to edit">{{value | capitalize}}</p>
        <input v-model:value="value" @blur="update" v-show="!display">
    </div>
</template>

<script>
    export default({
        props:{
            id:{
                type: Number,
                required:true
            },
            column:{
                type: String,
                required: true,
            },
            val:{
                required: true,
            }
        },

        data(){
            return{
                display: true,
                value: this.val,
            }
        },
        
        methods:{
            update(){
                axios.patch(`/admin/${this.id}-course`, {
                    column: this.column,
                    value: this.value,
                }).then(response => {
                    if(response.data === 1){
                        this.display = !this.display;
                        let div = document.getElementById('wrapper');
                        let adiv = document.createElement('div');
                        adiv.setAttribute('class', 'alert alert-success alert-dismissable fade show');
                        let abutton = document.createElement('button');
                        abutton.innerHTML = `&times;`;
                        abutton.setAttribute('type', 'button');
                        abutton.setAttribute('class', 'close');
                        abutton.setAttribute('data-dismiss', 'alert');
                        adiv.append(abutton);
                        let msg = document.createTextNode('Course updated successfully');
                        adiv.append(msg);
                        div.insertBefore(adiv, div.getElementsByClassName('card')[0]);
                        window.scrollTo(0,0);
                    }else{
                        this.display = !this.display
                        let div = document.getElementById('wrapper');
                        let adiv = document.createElement('div');
                        adiv.setAttribute('class', 'alert alert-danger alert-dismissable fade show');
                        let abutton = document.createElement('button');
                        abutton.innerHTML = `&times;`;
                        abutton.setAttribute('type', 'button');
                        abutton.setAttribute('class', 'close');
                        abutton.setAttribute('data-dismiss', 'alert');
                        adiv.append(abutton);
                        let msg = document.createTextNode('Oops! something went wrong.');
                        adiv.append(msg);
                        div.insertBefore(adiv, div.getElementsByClassName('card')[0]);
                        window.scrollTo(0,0);
                    }
                }).catch(error => {
                    console.log(error.data);
                })
            }
        },

        filters: {
            capitalize: function (value) {
                if (!value) return '';
                value = value.toString();
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        }
    });
</script>

<style scoped>
</style>
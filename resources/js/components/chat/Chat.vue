<template>
    <div>
        <messages></messages>
        
        <div class="form-group">

            <textarea @keydown="KeyDownMessage" v-model="body" placeholder="Sua Mensagem"></textarea>
        
        </div>
        <button :disabled="loading" class="btn btn-success" @click.prevent="SendMessage">
            <pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>
            Enviar
        </button>
    </div>
</template>

<script>
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

    export default {
        data() {
            return {
                body: '',
                loading: false,
            }
        },
        methods: {
            KeyDownMessage (e) {
                if(e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault();
                    this.SendMessage()
                }
            },
            SendMessage () {
                if(!this.body || this.body.trim() == '' || this.loading){
                    return
                }
                this.loading = true;
                this.$store.dispatch('storeMessage', {body: this.body})
                                .then(() => this.body = '')
                                .finally(() => this.loading = false)
            }
        },
        components: {
            PulseLoader
        }
    }
</script>

<style scoped>
    .float-left {
        float: left;
    }

    textarea {
        width: 700px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 6px;
        max-width: 700px;
        float: left;
        margin-right: 30px;
    }
</style>
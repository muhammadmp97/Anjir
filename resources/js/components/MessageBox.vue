<template>
    <div id="message-box" :class="'message-box-' + type" @click="hide">
        {{ body }}
    </div>
</template>
   
<script>
    export default {
        props: ['message', 'level'],

        data() {
            return {
                body : '',
                type: ''
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message)
            }

            window.events.$on('message-box', (message, level) => this.flash(message, level))
        },

        methods: {
            flash(message, level = 'success') {
                $('#message-box').hide()
                
                this.body = message
                this.type = level

                $('#message-box').fadeIn(800)

                var timeout = setTimeout(() => {
                    this.hide()
                    clearTimeout(timeout)
                }, 8000)
            },

            hide() {
                $('#message-box').fadeOut(700)
            }
        }
    }
</script>
   
<style>
    #message-box {
        display: none;
        position: fixed;
        z-index: 999;
        background: #fff;
        font-family: 'FVazir';
        font-size: 17px;
        box-shadow: 0 2px 13px rgba(0, 0, 0, .3);
        border-radius: 6px;
        padding: 12px 20px 10px;
        bottom: 60px;
        right: 70px;
        cursor: pointer;
    }

    .message-box-primary {
        border-top: 3px solid #5658d6;
    }

    .message-box-success {
        border-top: 3px solid #158d3d;
    }

    .message-box-error {
        border-top: 3px solid #aa122b;
    }
</style>
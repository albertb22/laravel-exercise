<template>
    <div class="font-sans antialiased h-screen flex">
        <chat-sidebar :channels="channels"></chat-sidebar>
        <chat-content :active-channel="activeChannel"></chat-content>
    </div>
</template>

<script>
    export default {
        components: {
            'chat-sidebar': require('./chat/Sidebar').default,
            'chat-content': require('./chat/Content').default,
        },

        data() {
            return {
                channels: [
                ]
            }
        },

        created() {
            axios.get('/api/channels')
                .then(response => {
                    this.channels = response.data;
                    this.channels[0].active = true;
                })
        },

        mounted() {

        },

        computed: {
            activeChannel() {
                if (this.channels.length === 0) {
                    return null;
                }
                let index = _.findIndex(this.channels, 'active');

                return this.channels[0];
            }
        },
    }
</script>
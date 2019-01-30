<template>
    <div class="font-sans antialiased h-screen flex">
        <chat-sidebar :channels="channels" @switchActiveChannel="switchActiveChannel"></chat-sidebar>
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
        methods: {
            switchActiveChannel(newActiveChannel) {
                if (this.activeChannel.id !== newActiveChannel.id) {
                    this.channels.forEach((channel, index) => {
                        channel.active = false
                    });

                    let index = _.findIndex(this.channels, (channel) =>  {
                        return channel.id === newActiveChannel.id
                    });

                    if (index !== -1) {
                        this.channels[index].active = true;
                    }
                }
            }
        },
        computed: {
            activeChannel() {
                if (this.channels.length === 0) {
                    return null;
                }
                let index = _.findIndex(this.channels, 'active');

                return this.channels[index];
            }
        },
    }
</script>
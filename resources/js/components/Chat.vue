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
                    {
                        name: 'general',
                        active: true,
                        messages: [
                            {
                                name: 'Robert-John',
                                date: 1548342226,
                                content: 'Hello from the other side'
                            },
                            {
                                name: 'Robert-John',
                                date: 1548342226,
                                content: 'Hello from the other side'
                            },
                            {
                                name: 'Robert-John',
                                date: 1548342226,
                                content: 'Hello from the other side'
                            },
                            {
                                name: 'Robert-John',
                                date: 1548342226,
                                content: 'Hello from the other side'
                            },
                        ]
                    }
                ]
            }
        },

        mounted() {

        },

        computed: {
            activeChannel() {
                return this.channels[_.findIndex(this.channels, {active: true})];
            }
        },
    }
</script>
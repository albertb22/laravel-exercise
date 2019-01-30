<template>
    <div class="font-sans antialiased h-screen flex">
        <chat-sidebar :chats="chats" :authUser="authUser" @switchActiveChat="switchActiveChat" v-if="authUser !== null"></chat-sidebar>
        <chat-content :active-chat="activeChat" :authUser="authUser" v-if="authUser !== null"></chat-content>
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
                chats: [],
                authUser: {
                    name: '',
                    status: 'online'
                },
            }
        },

        created() {
            axios.get('/api/users/auth')
                .then(response => {
                    this.authUser = response.data;
                });

            axios.get('/api/channels')
                .then(response => {
                    this.chats = this.chats.concat(response.data);

                    this.chats.filter((chat) => {
                        return chat.type === 'channels';
                    })[0].active = true;
                });

            axios.get('/api/users')
                .then(response => {
                    this.chats = this.chats.concat(response.data);
                });
        },
        mounted() {

        },
        methods: {
            switchActiveChat(newActiveChat) {
                if (! (this.activeChat.id === newActiveChat.id && this.activeChat.type === newActiveChat.type)) {
                    this.chats.forEach((chat) => {
                        chat.active = false
                    });

                    let index = _.findIndex(this.chats, (chat) =>  {
                        return chat.id === newActiveChat.id && chat.type === newActiveChat.type;
                    });

                    if (index !== -1) {
                        this.chats[index].active = true;
                    }
                }
            }
        },
        computed: {
            activeChat() {
                if (this.chats.length === 0) {
                    return null;
                }
                let index = _.findIndex(this.chats, 'active');
                return this.chats[index];
            },
        },
    }
</script>
<template>
    <div class="bg-indigo-darker text-purple-lighter flex-none w-64 pb-6 hidden md:block">
        <div class="text-white mb-2 mt-3 px-4 flex justify-between">
            <div class="flex-auto">
                <h1 class="font-semibold text-xl leading-tight mb-1 truncate">Tailwind CSS</h1>
                <div class="flex items-center mb-6">
                    <span class="bg-green rounded-full block w-2 h-2 mr-2"></span>
                    <span class="text-white opacity-50 text-sm" v-text="authUser.name"></span>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <div class="px-4 mb-2 text-white flex justify-between items-center">
                <div class="opacity-75">Channels</div>
                <div>
                    <svg class="fill-current h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" />
                    </svg>
                </div>
            </div>
            <div v-if="channels && channels.length > 0">
            <div v-for="(channel, index) in channels" :key="index" :class="[channel.active ? 'bg-teal-dark' : '', 'py-1 px-4 text-white']" @click="switchActiveChat(channel)"># {{ channel.name }}</div>
            </div>
        </div>

        <div class="mb-8">
            <div class="px-4 mb-2 text-white flex justify-between items-center">
                <div class="opacity-75">Direct Messages</div>
                <div>
                    <svg class="fill-current h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" />
                    </svg>
                </div>
            </div>
            <div v-if="users && users.length > 0">
            <div v-for="user in users" :class="[user.active ? 'bg-teal-dark' : '', 'flex items-center py-1 px-4']" @click="switchActiveChat(user)">
                <span class="bg-green rounded-full block w-2 h-2 mr-2"></span>
                <span class="text-white opacity-75">{{user.name}} <span class="text-grey text-sm" v-if="user.id === authUser.id">(you)</span></span>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            chats: {
                type: Array,
                default: [],
            },
            authUser: {
                type: Object,
                default: null
            }
        },

        data() {
            return {

            }
        },
        methods: {
            switchActiveChat(chat) {
                this.$emit('switchActiveChat', chat);
            }
        },
        computed: {
            users() {
                return this.chats.filter((chat) => {
                    return chat.type === 'users';
                });
            },
            channels() {
                return this.chats.filter((chat) => {
                    return chat.type === 'channels';
                });
            },
        },
    }
</script>
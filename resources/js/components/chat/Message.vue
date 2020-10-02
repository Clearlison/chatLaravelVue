<template>
<div class="chat-message">
    <div class="chat-info">
        <b>{{message.user.name}}:</b> <span>{{message.created_at}}</span>
    </div>

    <div class="chat-img" v-if="message.user.image">
        <img :src="`../profiles/${message.user.image}`">
    </div>

    <div class="chat-img " v-else>
        <img :src="'../img/no-image.jpg'">
    </div>

    <div :class="['message', {'owner' : message.owner == true}]">
        {{message.body}}
    </div>

</div>
</template>

<script>
export default {
    props: ['message']
}
</script>

<style scoped>
.chat-img {
    float: left;
}

.chat-img img {
    max-width: 60px;
    min-width: 60px;
    border-radius: 100%;
    border: 1px solid #ffffff;
}

.chat-message {
    float: left;
    width: 100%;
    margin: 10px 0;
}

.chat-info {
    float: left;
    width: 100%;
}

.chat-info span {
    float: right;
    margin: 0 9px 0 0;
}

.message {
    background-color: #ffffff;
    /*float: left; */
    padding: 6px;
    border-radius: 4px;
    margin: 32px 9px 0 72px;
    position: relative;
    /*word-wrap: break-word;*/
}

.message.owner {
    background-color: #dcf8c6;
}

.message::before {
    position: absolute;
    right: 100%;
    top: 15px;
    border: solid transparent;
    border-right-color: #ffffff;
    content: ' ';
    height: 0;
    width: 0;
    pointer-events: none;
    border-width: 6px;
    margin-top: -8px;
}

.message.owner::before {
    border-right-color: #dcf8c6;
}
</style>

<template>
<div>
    <h3>{{users.length}} online</h3>
    <div class="users scroll">
        <div class="user" v-for="user in users" :key="user.id">
            <div class="on">{{' '}}</div>
            <div class="user-img" v-if="user.image">
                <img :src="`../profiles/${user.image}`" alt="">
            </div>
            <div class="user-img" v-else>
                <img :src="'..//img/no-image.jpg'" alt="">
            </div>
            <strong>{{user.name}}</strong>
        </div>
    </div>
</div>
</template>

<script>
export default {
    computed: {
        users() {
            return this.$store.state.chat.users;
        }
    }
}
</script>

<style scoped>
.users {
    float: left;
    width: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    height: 300px;
    max-height: 300px;
}

.user {
    float: left;
    width: 100%;
    margin: 10px 0;
}

.user-img img {
    border-radius: 100%;
    max-width: 30px;
    float: left;
    border: 1px solid #ffffff;
}

.on {
    height: 10px;
    width: 100%;
    clear: both;
    border-radius: 100%;
    max-width: 10px;
    min-width: 10px;
    float: left;
    background-color: green;
    margin: 10px 5px 0 0;
}

strong {
    float: left;
    margin: 4px 4px;
}

.scroll::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 px rgba(0, 0, 0, .3);
    background-color: #3FA300;
}
</style>

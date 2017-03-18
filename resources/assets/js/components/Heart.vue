<template>
    <div>
        <i @click="likePost" v-bind:class="{ red : isLiked }" class="fa fa-heart pull-right" style="margin-top: 10px"></i>
    </div>
</template>

<script>
    export default {
        props : ['article'],

        data () {
            return {
                isLiked : false
            }
        },

        created () {
            this.$http.get('/like/isLiked/' + this.article)
                .then(response => {
                    this.isLiked = response.body
                })
        },

        methods : {
            likePost () {
                if (this.isLiked) {
                    this.$http.post('/like/unlikePost', {article_id : this.article})
                        .then(response => {
                            this.isLiked = !this.isLiked
                        })
                } else {
                    this.$http.post('/like/likePost', {article_id : this.article})
                        .then(response => {
                        this.isLiked = !this.isLiked
                        })
                }
            }
        }
    }
</script>

<style scoped>
    .red {
        color: red;
    }
</style>
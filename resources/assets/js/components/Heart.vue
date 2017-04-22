<template>
    <span>
        {{ totalLikes }}
        <i @click="likePost" v-bind:class="{ red : isLiked }" class="fa fa-heart"></i>
    </span>
</template>

<script>
    export default {
        props : ['article'],

        data () {
            return {
                isLiked : false,
                totalLikes : null
            }
        },

        created () {
            this.$http.get('/like/isLiked/' + this.article)
                .then(response => {
                    this.isLiked = response.body
                })

            this.$http.get('/like/number/' + this.article)
                .then (response => {
                    if (response.body > 0) {
                        this.totalLikes = response.body
                    }
                })
        },

        methods : {
            likePost () {
                if (this.isLiked) {
                    this.$http.post('/like/unlikePost', {article_id : this.article})
                        .then(response => {
                            this.isLiked = !this.isLiked
                            this.totalLikes = this.totalLikes - 1 > 0 ? this.totalLikes - 1 : null
                        })
                } else {
                    this.$http.post('/like/likePost', {article_id : this.article})
                        .then(response => {
                            this.isLiked = !this.isLiked
                            this.totalLikes = this.totalLikes !== null ? this.totalLikes + 1 : 1
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
<template>
    <button @click="follow" class="btn" v-bind:class="{'btn-success' : value === 'follow', 'btn-danger' : value === 'unfollow'}">
        {{ this.value }}
    </button>
</template>

<script>
    export default {
        props : ['target'],

        data () {
            return {
                value : 'follow'
            }
        },

        created () {
          this.$http.post('/user/isFollowed', {target : this.target})
              .then (response => {
                  this.value = response.body === true ? 'unfollow' : 'follow'
              })
        },

        methods : {
            follow () {
                if (this.value === 'follow') {
                    this.$http.post('/user/follow', {target_id : this.target})
                        .then (response => {
                            this.value = 'unfollow'
                        })
                } else {
                    this.$http.post('/user/unfollow', {target_id : this.target})
                        .then (response => {
                            this.value = 'follow'
                        })
                }
            }
        }
    }
</script>

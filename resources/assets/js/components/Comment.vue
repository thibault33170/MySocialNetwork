<template>
    <div style="padding: 0;" class="pull-left col-lg-6 col-lg-offset-2 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-10">
        <input v-on:keyup.enter="send" type="text" v-model="comment" style="padding-right: 0;" class="form-control" placeholder="Commenter ...">
        <button @click.prevent="send" class="btn btn-default "><i class="fa fa-commenting"></i></button>
    </div>
</template>

<script>
    export default {
        props : ['article', 'user'],

        data () {
            return {
                'comment' : ''
            }
        },

        methods : {
            send () {
                if (this.comment != '') {
                    let data = {
                        article_id : this.article,
                        user_id : this.user,
                        content : this.comment
                    }

                    this.$http.post('/comments', data)
                        .then (response => {
                            this.comment = ''
                            window.location.replace('/articles')
                        })
                }
            }
        }
    }
</script>

<template>
    <div>
        <i @click="deletePost" class="fa fa-trash pull-right" style="margin-top: 10px; margin-left: 1em;"></i>
    </div>
</template>

<script>
    export default {
        props : ['article'],

        methods : {
            deletePost () {
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete this post!'
                }).then( () => {
                    this.$http.delete('articles/' + this.article)
                        .then( response => {
                            this.$swal(
                                'Deleted!',
                                'Your post has been deleted.',
                                'success'
                            )
                            window.location.replace('/articles')
                        })
                }).catch( () => {
                    this.$swal(
                        'Cancelled',
                        'Your post is safe :)',
                        'error'
                    )
                })
            }
        }
    }
</script>
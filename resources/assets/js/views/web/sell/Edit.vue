<template>
    <edit-form :title="title"></edit-form>
</template>

<script>
    import EditForm from './Form'

    export default {
        components: {EditForm},
        data() {
            return {
                title: '编辑供应'
            }
        },
        mounted() {
        },
    }
</script>
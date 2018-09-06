<template>
    <create-form :title="title"></create-form>
</template>

<script>
    import CreateForm from './Form'

    export default {
        components: {CreateForm},
        data() {
            return {
                title: '新增供应'
            }
        },
        mounted() {

        },
    }
</script>

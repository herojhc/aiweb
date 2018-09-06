<template>
    <Row :gutter="20" style="padding: 10px 0">
        <i-col :span="12" :offset="6">
            <Card>
                <h2 slot="title">{{title}}</h2>
                <Form :model="form" label-position="left" :label-width="100">
                    <FormItem label="名称" :error="errors.name && errors.name[0]">
                        <Input v-model="form.name" placeholder="供应名称"></Input>
                    </FormItem>
                    <FormItem label="描述" :error="errors.introduce && errors.introduce[0]">
                        <Input v-model="form.introduce" type="textarea" :autosize="{minRows: 2,maxRows: 5}"
                               placeholder="描述"></Input>
                    </FormItem>
                    <FormItem>
                        <Button type="primary" :loading="isSaving" @click="onSubmit">{{btnSaveName}}</Button>
                        <Button type="ghost" style="margin-left: 8px" @click="goBack">返回</Button>
                    </FormItem>
                </Form>
            </Card>
        </i-col>
    </Row>
</template>

<script>
    import mixin from '../../../mixins/form';

    export default {
        components: {},
        mixins: [mixin],
        data() {
            return {
                resource: 'sells'
            }
        },
        created() {
            // 加载其他数据，比如 select 选项
        },

        methods: {

            afterInit() {
                this.$refs['imageCtrl'].uploadedImage = {
                    url: this.form.logo
                };
            },

            avatarUploaded(data) {
                this.form.logo = data.url;
            },
        }
    }
</script>

<style scoped>

</style>
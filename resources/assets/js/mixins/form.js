/**
 * Created by JHC on 2017-11-24.
 */

/**
 * Created by JHC on 2017-11-24.
 */
export default {
    props: {
        title: String,
        modal: {
            type: Boolean,
            default: function () {
                return false
            }
        }
    },
    data() {
        return {
            prefixPath: null,
            formId: this.$route.params.id,
            form: {},
            errors: {},
            isSaving: false,
            shouldInit: true
        }
    },
    mounted() {
        if (this.shouldInit) {
            this.init()
        }
    },
    watch: {
        // 如果路由有变化，会再次执行该方法
        '$route': 'init'
    },
    computed: {
        btnSaveName: function () {
            return this.formId ? '立即更新' : '立即创建'
        }
    },
    methods: {
        resourcePath() {
            if (this.prefixPath) {
                return '/' + this.prefixPath + '/' + this.resource
            }
            return '/' + this.resource;
        },
        init() {
            this.$Spin.show();
            let _form = {};
            if (this.formId > 0) {
                axios.get(this.resourcePath() + '/' + this.formId + '/edit').then((response) => {
                    _form = response.data.data;
                    this.setForm(_form);
                    this.$Spin.hide()
                })
            }
            else {
                this.setForm(_form);
                this.$Spin.hide()
            }
        },
        setForm(form) {
            if (!this.isEmptyObject(form)) {
                this.form = JSON.parse(JSON.stringify(Object.assign(this.form, form)));
            }

            this.afterInit();
        },
        afterInit() {

        },
        beforeSubmit() {
            return true;
        },
        onSubmit() {

            let url = this.resourcePath();
            let method = 'post';

            if (this.formId) {
                url += '/' + this.formId;
                method = 'patch';
            }
            if (this.beforeSubmit()) {
                this.isSaving = true;
                axios({
                    method: method,
                    url: url,
                    data: this.form
                }).then(() => {
                    this.isSaving = false;
                    this.$Message.success('恭喜您，保存成功');
                    if (this.modal) {
                        this.$emit('formSaved');
                    }
                    else {
                        this.goBack();
                    }

                }).catch(
                    error => {
                        this.isSaving = false;
                        if (typeof error.response.data === 'object' && error.response.data.errors) {
                            this.errors = error.response.data.errors;
                        }
                    }
                );
            }

        },
        goBack() {
            this.$router.back();
        }
    }
}
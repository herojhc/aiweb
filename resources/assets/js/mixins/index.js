/**
 * Created by JHC on 2017-11-15.
 */
export default {
    data() {
        return {
            prefixPath: null,
            resource: null,
            list: [],
            multipleSelection: [],
            total: 0,
            listLoading: true,
            fieldList: [],
            listQuery: {
                page: 1,
                limit: localStorage.getItem(this.$options.name + '_limit') ? parseInt(localStorage.getItem(this.$options.name + '_limit')) : 20,
                searchField: 'name',
                keyword: '',
                sort: localStorage.getItem(this.$options.name + '_sort') || ''
            },
            listColumns: []
        };
    },
    methods: {
        resourcePath() {
            if (this.prefixPath) {
                return '/' + this.prefixPath + '/' + this.resource
            }
            return '/' + this.resource;
        },
        getList() {
            if (this.resource) {
                this.listLoading = true;
                axios({
                    method: 'get',
                    url: this.resourcePath(),
                    params: this.listQuery
                }).then((response) => {
                    this.formatData(response.data, (data) => {
                        this.list = data.data;
                        this.total = data.meta && data.meta.total;
                        this.listLoading = false;
                        this.afterGetList(response);
                    });

                });
            }

        },
        formatData(resp, callback) {
            callback(resp);
        },
        afterGetList() {

        },

        handleFilter() {
            this.getList();
        },

        handleSortChange(sort) {
            if (sort.prop && sort.order) {
                this.listQuery.sort = sort.prop + '|' + sort.order;
            }
            else
                this.listQuery.sort = '';

            localStorage.setItem(this.$options.name + '_sort', this.listQuery.sort);

            this.getList();
        },
        handleSelectionChange(val) {
            this.multipleSelection = val;
        },

        handleSizeChange(val) {
            this.listQuery.limit = val;
            localStorage.setItem(this.$options.name + '_limit', this.listQuery.limit);
            this.getList();
        },

        handleCurrentChange(val) {
            this.listQuery.page = val;
            this.getList();
        },
        handleDelete(id) {

            this.$Modal.confirm({
                title: '提示',
                content: '<p>此操作将永久删除, 是否继续?</p>',
                onOk: () => {
                    axios.delete(this.resourcePath() + '/' + id).then(() => {
                        this.$Message.success('删除成功');
                        this.getList();
                    });
                }
            });
        },
        handleBatchDelete() {
            let ids = [];
            this.multipleSelection.forEach(item => {
                ids.push(item.id);
            });
            if (ids.length <= 0) {
                this.$Message.warning('请选择');
                return;
            }

            this.$Modal.confirm({
                title: '提示',
                content: '<p>此操作将永久删除, 是否继续?</p>',
                onOk: () => {
                    axios.post(this.resourcePath() + '/batch', {
                        'delete': ids
                    }).then(() => {
                        this.$Message.success('删除成功');
                        this.getList();
                    });
                }
            });
        },
        handleCommand(name) {

        }
    }
}
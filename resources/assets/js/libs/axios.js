// 添加响应拦截器
window.axios.interceptors.response.use(function (response) {
    // 对响应数据做点什么
    return response;
}, function (error) {
    // 对响应错误做点什么

    if (error.response) {
        // 请求已发出，但服务器响应的状态码不在 2xx 范围内

        switch (error.response.status) {
            // 返回 401 清除token信息并跳转到登录页面
            case 401:
                window.location.href = '/login';
                return;
            default:
                break;
        }

        if (typeof error.response.data === 'object') {
            Vue.prototype.$Message.error(error.response.data.message);
        }
    }

    return Promise.reject(error);
});
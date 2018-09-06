/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import App from './App.vue'
import router from './routers/web'
import store from './store'
import iView from 'iview'
import i18n from '@@/locale'
import config from '@@/config'
import importDirective from '@@/directive'
import 'iview/dist/styles/iview.css'
import '@@/index.less'

Vue.use(iView, {
    i18n: (key, value) => i18n.t(key, value)
});

/**
 * 导入全局mixin
 */
import MixInTools from './mixins/tools';
import MixInUser from './mixins/user';

Vue.mixin(MixInUser);
Vue.mixin(MixInTools);

Vue.config.productionTip = false;
/**
 * @description 全局注册应用配置
 */
Vue.prototype.$config = config;
/**
 * 注册指令
 */
importDirective(Vue);

require('./libs/axios');

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    i18n,
    store,
    render: h => h(App)
});

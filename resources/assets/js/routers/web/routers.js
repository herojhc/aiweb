import Main from '@@/views/web/main/index'
import parentView from '@@/components/Parent'

export default [
    {
        path: '/',
        name: 'index',
        redirect: '/home',
        component: Main,
        meta: {
            hideInMenu: true,
            notCache: true
        },
        children: [
            {
                path: 'home',
                name: 'home',
                meta: {
                    hideInMenu: true,
                    notCache: true
                },
                component: require('@@/views/web/home/Index.vue')
            }
        ]
    },
    {
        path: '',
        name: 'info',
        meta: {
            title: '信息',
            icon: 'ios-book'
        },
        component: Main,
        children: [
            {
                path: 'product',
                name: 'product',
                meta: {
                    title: '产品'
                },
                redirect: '/product/index',
                children: [
                    {
                        path: 'index',
                        name: 'product/index',
                        meta: {
                            hideInMenu: true,
                            title: '产品首页'
                        },
                        component: require('@@/views/web/domain/Index.vue'),
                    },
                    {
                        path: ':id/edit',
                        name: 'product/edit',
                        meta: {
                            hideInMenu: true,
                            title: '编辑产品'
                        },
                        component: require('@@/views/web/domain/Index.vue'),
                    },
                    {
                        path: ':id',
                        name: 'product/show',
                        meta: {
                            hideInMenu: true,
                            title: '产品详情'
                        },
                        component: require('@@/views/web/domain/Index.vue'),
                    }
                ]
            },
            {
                path: 'solution',
                name: 'solution',
                meta: {
                    title: '解决方案'
                },
                component: require('@@/views/web/domain/Index.vue'),
            }
        ]
    },
    {
        path: '/setting',
        name: 'setting',
        meta: {
            title: '设置',
            icon: 'ios-book'
        },
        component: Main,
        children: [
            {
                path: 'domain',
                name: 'setting/domain',
                meta: {
                    title: '域名'
                },
                component: require('@@/views/web/domain/Index.vue'),
            },
            {
                path: 'homepage',
                name: 'setting/homepage',
                meta: {
                    title: '模板'
                },
                component: require('@@/views/web/domain/Index.vue'),
            },
        ]
    },
    {
        path: '/401',
        name: 'error_401',
        meta: {
            hideInMenu: true
        },
        component: require('@@/views/web/error-page/401.vue')
    },
    {
        path: '/500',
        name: 'error_500',
        meta: {
            hideInMenu: true
        },
        component: require('@@/views/web/error-page/500.vue')
    },
    {
        path: '*',
        name: 'error_404',
        meta: {
            hideInMenu: true
        },
        component: require('@@/views/web/error-page/404.vue')
    }
]

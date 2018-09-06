export default {
    state: {
        userName: '',
        userId: '',
        avatarImgPath: '',
        access: ''
    },
    mutations: {
        setAvatar(state, avatarPath) {
            state.avatarImgPath = avatarPath
        },
        setUserId(state, id) {
            state.userId = id
        },
        setUserName(state, name) {
            state.userName = name
        },
        setAccess(state, access) {
            state.access = access
        }
    },
    actions: {

        // 退出登录
        handleLogOut() {
            return new Promise((resolve, reject) => {
                axios({
                    method: 'post',
                    url: '/logout',
                    baseURL: '/',
                }).then(() => {
                    location.href = '/';
                    resolve();
                }).catch(err => {
                    reject(err)
                })
            })

        },
        // 获取用户相关信息
        getUserInfo({state, commit}) {

            return new Promise((resolve, reject) => {

                try {
                    const data = window.XXH.state.user;
                    commit('setAvatar', data.avatar);
                    commit('setUserName', data.name);
                    commit('setUserId', data.user_id);
                    commit('setAccess', data.access);
                    resolve(data)
                }
                catch (e) {
                    reject(e)
                }
            });
        }
    }
}

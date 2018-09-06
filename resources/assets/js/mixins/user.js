/**
 * Created by JHC on 2017-11-24.
 */

export default{
    computed: {
        currentUserId(){
            return window.XXH.state.user.user_id;
        },
        avatarPath () {
            return window.XXH.state.user.avatar;
        },
        currentUser(){
            return window.XXH.state.user;
        },
        currentCorpId(){
            return window.XXH.state.corp.corp_id;
        },
        logoPath () {
            return window.XXH.state.corp.logo;
        },
        currentCorp(){
            return window.XXH.state.corp;
        },
        currentContactId(){
            return window.XXH.state.contact.contact_id;
        },
        currentContact(){
            return window.XXH.state.contact;
        },
    }
}
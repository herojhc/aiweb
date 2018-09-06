/**
 * Created by JHC on 2017-11-24.
 */

export default{
    methods: {
        nowTimestamp(){
            return moment().unix();
        },
        getNow(){
            return moment().format('YYYY-MM-DD');
        },
        momentFromDateTime(dateTime){
            return moment(dateTime, 'YYYY-MM-DD HH:mm:ss');
        },
        dateTimeToTimestamp(dateTime){
            return this.momentFromDateTime(dateTime).unix();
        },
        url(path){
            if (path && path.substring(0, 1) != '/') {
                path = '/' + path;
            }
            return this.baseUrl + path;
        },
        redirectToUrl(url){
            window.location.href = url;
        },
        redirectToUrlFromBaseUrl(url){
            window.location.href = this.url(url);
        },
        reloadPage(){
            this.redirectToUrl(window.location);
        },
        objectToFormData(item){
            var form_data = new FormData();

            for (var key in item) {
                form_data.append(key, item[key]);
            }

            return form_data;
        },
        isEmptyObject(object){
            return Object.keys(object).length === 0;
        },
        /**
         * param 将要转为URL参数字符串的对象
         * key URL参数字符串的前缀
         * encode true/false 是否进行URL编码,默认为true
         *
         * return URL参数字符串
         */
        urlEncode(param, key, encode) {
            if (param == null) return '';
            var paramStr = '';
            var t = typeof (param);
            if (t == 'string' || t == 'number' || t == 'boolean') {
                paramStr += '&' + key + '=' + ((encode == null || encode) ? encodeURIComponent(param) : param);
            } else {
                for (var i in param) {
                    var k = key == null ? i : key + (param instanceof Array ? '[' + i + ']' : '.' + i);
                    paramStr += this.urlEncode(param[i], k, encode);
                }
            }
            return paramStr;
        },
        //    图片上传，将base64的图片转成二进制对象，塞进formdata上传
        upload(basestr, type, callback) {
            let text = window.atob(basestr.split(",")[1]);
            let buffer = new Uint8Array(text.length);
            for (let i = 0; i < text.length; i++) {
                buffer[i] = text.charCodeAt(i);
            }
            let blob = this.getBlob([buffer], type);


            let formData = this.getFormData();
            formData.append('file', blob);
            this.$indicator.open();
            axios.post('files', formData)
                .then((response) => {
                    callback(response.data.url);
                    this.$indicator.close();
                }).catch(() => {
                this.$indicator.close();
            });

        },
        /**
         * 获取blob对象的兼容性写法
         * @param buffer
         * @param format
         * @returns {*}
         */
        getBlob(buffer, format) {
            try {
                return new Blob(buffer, {type: format});
            } catch (e) {
                var bb = new (window.BlobBuilder || window.WebKitBlobBuilder || window.MSBlobBuilder);
                buffer.forEach(function (buf) {
                    bb.append(buf);
                });
                return bb.getBlob(format);
            }
        },
        /**
         * 获取formdata
         */
        getFormData() {
            let isNeedShim = ~navigator.userAgent.indexOf('Android')
                && ~navigator.vendor.indexOf('Google')
                && !~navigator.userAgent.indexOf('Chrome')
                && navigator.userAgent.match(/AppleWebKit\/(\d+)/).pop() <= 534;
            return isNeedShim ? new this.FormDataShim() : new FormData()
        },
        /**
         * formdata 补丁, 给不支持formdata上传blob的android机打补丁
         * @constructor
         */
        FormDataShim() {
            console.warn('using formdata shim');
            var o = this,
                parts = [],
                boundary = Array(21).join('-') + (+new Date() * (1e16 * Math.random())).toString(36),
                oldSend = XMLHttpRequest.prototype.send;
            this.append = function (name, value, filename) {
                parts.push('--' + boundary + '\r\nContent-Disposition: form-data; name="' + name + '"');
                if (value instanceof Blob) {
                    parts.push('; filename="' + (filename || 'blob') + '"\r\nContent-Type: ' + value.type + '\r\n\r\n');
                    parts.push(value);
                }
                else {
                    parts.push('\r\n\r\n' + value);
                }
                parts.push('\r\n');
            };
            // Override XHR send()
            XMLHttpRequest.prototype.send = function (val) {
                var fr,
                    data,
                    oXHR = this;
                if (val === o) {
                    // Append the final boundary string
                    parts.push('--' + boundary + '--\r\n');
                    // Create the blob
                    data = getBlob(parts);
                    // Set up and read the blob into an array to be sent
                    fr = new FileReader();
                    fr.onload = function () {
                        oldSend.call(oXHR, fr.result);
                    };
                    fr.onerror = function (err) {
                        throw err;
                    };
                    fr.readAsArrayBuffer(data);
                    // Set the multipart content type and boudary
                    this.setRequestHeader('Content-Type', 'multipart/form-data; boundary=' + boundary);
                    XMLHttpRequest.prototype.send = oldSend;
                }
                else {
                    oldSend.call(this, val);
                }
            };
        }
    }
}
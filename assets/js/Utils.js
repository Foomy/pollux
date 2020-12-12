let Utils = {

    ajax: function (url, data, callback) {
        let xhr = new XMLHttpRequest(),
            method = 'post',
            async = true;

        xhr.onreadystatechange = function () {
            if (XMLHttpRequest.DONE === xhr.readyState) {
                if ('function' === typeof callback) {
                    return callback(JSON.parse(xhr.response));
                }
            }
        };

        xhr.open(method, url, async);
        xhr.setRequestHeader('x-requested-with', 'XMLHttpRequest');
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
    }

};

export default Utils;
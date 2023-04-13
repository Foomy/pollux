;let Layer = {
    contentData: null,

    init: function (contentData) {
        this.contentData = contentData;
    },

    setContent() {
        let xhr = new XMLHttpRequest(),
            method = 'post',
            async = true,
            url;

        url = '/layer/' + window.btoa(this.contentData);
console.log(window.btoa(this.contentData));

        xhr.open(method, url, async);
        xhr.setRequestHeader('x-request-with', 'XMLHttpRequest');
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send();
    },
};
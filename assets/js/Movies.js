let Movies = {
    init: function () {
        this.initAddMovieBtn();
        this.initEditBtn();
        this.initDetailBtn();
    },

    initAddMovieBtn: function () {
        let btnCollection = document.getElementsByClassName('js-btn-add');

        btnCollection.item(0).addEventListener('click', function() {
            document.location.href = '/movie/add';
        });
    },

    initEditBtn: function () {
        let btnCollection = document.getElementsByClassName('js-btn-edit');

        for (let btn of btnCollection) {
            btn.addEventListener('click', function (event) {
                let uuid      = event.currentTarget.dataset.id,
                    encrypted = window.btoa(uuid);

                console.log(encrypted);
                document.location.href = '/movie/edit/' + encrypted;
            });
        }
    },

    initDetailBtn: function() {
        let btnCollection = document.getElementsByClassName('js-btn-detail');

        for (let btn of btnCollection) {
            btn.addEventListener('click', function (event) {
                let uuid = event.currentTarget.dataset.id,
                    xhr = new XMLHttpRequest(),
                    method = 'post',
                    async = true,
                    url;

                url = '/movie/details/' + window.btoa(uuid);

                xhr.open(method, url, async);
                xhr.setRequestHeader('x-request-with', 'XMLHttpRequest');
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send();

                xhr.onreadystatechange = function () {
                    if (XMLHttpRequest.DONE === xhr.readyState) {
                        console.log(xhr.response, xhr.status);

                        Layer.init(xhr.response);
                    }
                }
            });
        }
    }
};

document.addEventListener('DOMContentLoaded', function () {
    Movies.init();
});
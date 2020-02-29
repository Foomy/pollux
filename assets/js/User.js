import Utils from "./Utils";

let User = {

    init: function () {
        this.initEditButtons();
        this.initDeleteButtons();
    },

    initEditButtons: function () {
        let editButtons = document.getElementsByClassName('is-edit-btn');

        for (let edtBtn of editButtons) {
            edtBtn.addEventListener('click', function () {
                let url = edtBtn.dataset.url;

                Utils.ajax(url, '', function (response) {

                })
            })
        }
    },

    initDeleteButtons: function () {
        let deleteButtons = document.getElementsByClassName('is-delete-btn');

        for (let delBtn of deleteButtons) {
            delBtn.addEventListener('click', function () {
                let url = delBtn.dataset.url;

                Utils.ajax(url, '', function (response) {
                    let userId;

                    if (! repsonse.error) {
                        if ('undefined' !== typeof repsonse.userId) {
                            userId = repsonse.userId;
                        } else {
                            return;
                        }

                        User.List.removeRow('user-row-' + userId);
                        User.List.redrawAlternation('is-user-row');

                        // @todo show success banner
                        return;
                    }

                    // @todo show error banner
                });
            })
        }
    },

    List: {

        removeRow: function(id) {
            document.getElementById(id).remove();
        },

        redrawAlternation: function(rowSelector) {
            let rows = document.getElementsByClassName(rowSelector),
                i = 1;

            for (let row of rows) {
                row.classList.remove('odd', 'even');

                if (0 === i % 2) {
                    row.classList.add('even');
                }
                else {
                    row.classList.add('odd');
                }

                i++;
            }
        }

    }

};

export default User;
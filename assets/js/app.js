import User from "./User";

let App = {

    init: function () {
        User.init();
    }

};

document.addEventListener("DOMContentLoaded", function(event) {
    App.init();
});

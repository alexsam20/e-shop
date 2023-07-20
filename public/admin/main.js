$(function () {

    $('.delete').click(function () {
        let res = confirm('Confirm the action.');
        if (!res) return false;
    });

});
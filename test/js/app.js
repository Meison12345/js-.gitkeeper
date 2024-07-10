'use strict';
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.querySelector('.modal');

    document.querySelector('.localnews__left img').addEventListener('click', function (e) {
        modal.classList.add('modal-active');
        document.body.style.overflow = 'hidden';
    })

    window.addEventListener('click', function (e) {
        console.log(e.target);
        if (e.target === modal) {
            closeModal();
        }
    });


    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    function closeModal() {
        modal.classList.remove('modal-active');
        document.body.style.overflow = '';
    }
});
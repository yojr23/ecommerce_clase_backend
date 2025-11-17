document.addEventListener('DOMContentLoaded', () => {
    const statusAlert = document.querySelector('.alert.success');
    if (statusAlert) {
        setTimeout(() => {
            statusAlert.classList.add('fade');
            statusAlert.addEventListener('transitionend', () => statusAlert.remove(), { once: true });
        }, 5000);
    }
});

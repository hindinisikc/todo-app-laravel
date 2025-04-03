document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("taskModal");
    let openModalBtn = document.getElementById("openModalBtn");
    let closeModalBtn = document.getElementById("closeModalBtn");

    openModalBtn.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    closeModalBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Close modal if user clicks outside of it
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});

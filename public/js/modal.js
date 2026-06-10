function openModal(id) {
    const modal = document.getElementById(id);
    const content = modal.querySelector("#modalContent");

    modal.classList.remove("opacity-0", "pointer-events-none");

    content.classList.remove("scale-95");
    content.classList.add("scale-100");
}

function closeModal(id) {
    const modal = document.getElementById(id);
    const content = modal.querySelector("#modalContent");

    modal.classList.add("opacity-0", "pointer-events-none");

    content.classList.remove("scale-100");
    content.classList.add("scale-95");
}

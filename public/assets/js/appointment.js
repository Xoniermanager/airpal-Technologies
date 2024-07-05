function splitButton() {
    var originalButton = document.getElementById("original-button");
    originalButton.classList.add("hidden");

    var additionalButtons = document.getElementById("additional-buttons");
    additionalButtons.classList.remove("hidden");
}

function showContent(contentId) {
    var content = document.getElementById(contentId);
    content.classList.remove("hidden-content");
}

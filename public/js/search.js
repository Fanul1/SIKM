document.addEventListener("DOMContentLoaded", function () {
    const filterTypeDropdown = document.getElementById("filterType");
    const searchInput = document.getElementById("searchInput");
    const noResultsMessage = document.getElementById("noResults");

    filterTypeDropdown.addEventListener("change", function () {
        filterCards(filterTypeDropdown.value);
    });

    searchInput.addEventListener("input", function () {
        filterCards(filterTypeDropdown.value);
    });

    function filterCards(filterType) {
        const ukmCards = document.querySelectorAll(".ukm-card");
        const beritaCards = document.querySelectorAll(".berita-card");
    
        ukmCards.forEach(card => {
            const ukmName = card.querySelector(".font-bold").textContent.toLowerCase();
            const showCard = (filterType === "all" || filterType === "ukm") && ukmName.includes(searchInput.value.toLowerCase());
            card.style.visibility = showCard ? "visible" : "hidden";
            card.style.height = showCard ? "auto" : "0";
            card.style.width = showCard ? "auto" : "0";
        });
    
        beritaCards.forEach(card => {
            const beritaJudul = card.querySelector(".font-bold").textContent.toLowerCase();
            const showCard = (filterType === "all" || filterType === "berita") && beritaJudul.includes(searchInput.value.toLowerCase());
            card.style.visibility = showCard ? "visible" : "hidden";
            card.style.height = showCard ? "auto" : "0";
            card.style.width = showCard ? "auto" : "0";
        });

        updateNoResultsMessage();
    }

    function updateNoResultsMessage() {
        const visibleUkmCards = document.querySelectorAll(".ukm-card[style='display: grid;']");
        const visibleBeritaCards = document.querySelectorAll(".berita-card[style='display: grid;']");
        noResultsMessage.style.display = (visibleUkmCards.length + visibleBeritaCards.length) === 0 ? "block" : "none";
    }
});
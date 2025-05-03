document.addEventListener("DOMContentLoaded", () => {
    // Initialize video player with enhanced controls
    const videoPlayer = {
        video: document.getElementById("sermon-video"),
        chapterMarkers: document.querySelectorAll(".chapter-marker"),

        init: function () {
            if (!this.video) return;

            // Add event listeners to chapter markers
            this.chapterMarkers.forEach((marker) => {
                marker.addEventListener("click", this.jumpToChapter.bind(this));
            });

            // Add keyboard shortcuts
            document.addEventListener(
                "keydown",
                this.handleKeyboardShortcuts.bind(this)
            );

            // Add custom video controls if needed
            this.addCustomControls();

            // Add event listener for video time updates to highlight current chapter
            this.video.addEventListener(
                "timeupdate",
                this.updateCurrentChapter.bind(this)
            );
        },

        jumpToChapter: function (e) {
            const time = Number.parseFloat(
                e.currentTarget.getAttribute("data-time")
            );
            this.video.currentTime = time;
            this.video.play();
        },

        handleKeyboardShortcuts: function (e) {
            if (document.activeElement === this.video) {
                // Space bar to play/pause
                if (e.code === "Space") {
                    e.preventDefault();
                    this.togglePlayPause();
                }

                // Arrow right to forward 10 seconds
                if (e.code === "ArrowRight") {
                    this.video.currentTime += 10;
                }

                // Arrow left to rewind 10 seconds
                if (e.code === "ArrowLeft") {
                    this.video.currentTime -= 10;
                }

                // M key to mute/unmute
                if (e.code === "KeyM") {
                    this.video.muted = !this.video.muted;
                }

                // F key for fullscreen
                if (e.code === "KeyF") {
                    this.toggleFullscreen();
                }
            }
        },

        togglePlayPause: function () {
            if (this.video.paused) {
                this.video.play();
            } else {
                this.video.pause();
            }
        },

        toggleFullscreen: function () {
            if (!document.fullscreenElement) {
                this.video.requestFullscreen().catch((err) => {
                    console.error(
                        `Error attempting to enable fullscreen: ${err.message}`
                    );
                });
            } else {
                document.exitFullscreen();
            }
        },

        addCustomControls: () => {
            // Add custom controls if needed
            // This is optional and can be expanded based on requirements
        },

        updateCurrentChapter: function () {
            if (!this.chapterMarkers.length) return;

            const currentTime = this.video.currentTime;

            this.chapterMarkers.forEach((marker) => {
                const markerTime = Number.parseFloat(
                    marker.getAttribute("data-time")
                );
                const nextMarkerTime = this.getNextChapterTime(markerTime);

                if (
                    currentTime >= markerTime &&
                    (nextMarkerTime === null || currentTime < nextMarkerTime)
                ) {
                    marker.classList.add("bg-blue-100");
                    marker.classList.remove("bg-gray-100");
                } else {
                    marker.classList.remove("bg-blue-100");
                    marker.classList.add("bg-gray-100");
                }
            });
        },

        getNextChapterTime: function (currentMarkerTime) {
            let nextTime = null;

            this.chapterMarkers.forEach((marker) => {
                const markerTime = Number.parseFloat(
                    marker.getAttribute("data-time")
                );

                if (
                    markerTime > currentMarkerTime &&
                    (nextTime === null || markerTime < nextTime)
                ) {
                    nextTime = markerTime;
                }
            });

            return nextTime;
        },
    };

    // Initialize the video player
    videoPlayer.init();

    // Initialize search functionality
    const searchInput = document.getElementById("sermon-search");
    if (searchInput) {

        const searchInput = document.getElementById("sermon-search");
        const sermonCards = document.querySelectorAll(".sermon-card");
        const sermonContainer = document.getElementById("sermon-container");
        const noResults = document.getElementById("no-results");

        function formatInputDate(dateString) {
            const date = new Date(dateString);
            const options = {
                year: "numeric",
                month: "long",
                day: "numeric",
            };
            return date.toLocaleDateString("en-US", options); // Example: May 2, 2025
        }

        searchInput.addEventListener("input", function () {
            const searchDate = this.value;
            console.log("Search Date:", searchDate);
            const formattedSearchDate = formatInputDate(searchDate);
            let matchCount = 0;
            console.log(
                "Search Date:",
                searchDate,
                "Formatted:",
                formattedSearchDate
            );

            sermonCards.forEach((card) => {
                const cardDateText = card.querySelector("p").textContent.trim(); // e.g., "May 2, 2025"
                if (
                    searchDate === "" ||
                    cardDateText.includes(formattedSearchDate)
                ) {
                    card.classList.remove("d-none");
                    matchCount++;
                } else {
                    card.classList.add("d-none");
                }
            });

            noResults.classList.toggle(
                "d-none",
                !(matchCount === 0 && searchDate !== "")
            );
        });
    }
});

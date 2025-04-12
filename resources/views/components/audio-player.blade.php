<!-- Audio Player -->
<div id="floating-audio-player" style="display: none;">
    <div class="player-container">
        <div class="player-info">
            <span id="audio-title">Now Playing</span>
        </div>
        <div class="player-controls">
            <button id="seek-backward">⏪ 10s</button>
            <button id="pause-btn">⏸</button>
            <button id="seek-forward">10s ⏩</button>
            <button id="close-btn">✖</button>
        </div>
        <audio id="audio-element" controls style="display: none;"></audio>
    </div>
</div>
<style>
    #floating-audio-player {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #ffffff;
        border: 1px solid #ccc;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        z-index: 9999;
        padding: 12px 16px;
        width: 260px;
        font-family: sans-serif;
    }

    .player-container {
        display: flex;
        flex-direction: column;
    }

    .player-info {
        margin-bottom: 8px;
        text-align: center;
    }

    .player-info span {
        font-weight: bold;
        font-size: 14px;
        color: #333;
    }

    .player-controls {
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .player-controls button {
        background: none;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }

</style>

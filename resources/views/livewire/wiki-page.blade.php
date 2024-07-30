<div class="wiki-page">
    <div class="search-bar">
        @livewire('search-bar')
    </div>
    <div class="navigation-buttons">
        <button wire:click="goHome">Home</button>
        <button wire:click="goBack">Back</button>
    </div>
    <div class="wiki-description">
        {{ $description }}
    </div>
    <div class="canvas">
        @livewire('post-list')
    </div>
    <div class="tag-cloud">
        @livewire('tag-cloud')
    </div>
</div>

<style>
    .wiki-page {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .search-bar, .navigation-buttons, .wiki-description, .canvas, .tag-cloud {
        margin-bottom: 20px;
        width: 100%;
        max-width: 800px;
    }

    .navigation-buttons {
        display: flex;
        justify-content: space-between;
    }

    button {
        padding: 10px 20px;
        background-color: #3490dc;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #2779bd;
    }
</style>
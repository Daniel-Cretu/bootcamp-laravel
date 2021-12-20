@if(!$isLast)
    <div class="d-flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M 1 0 h -1 v 7 V 8 V 9 L 0 10 V 17 H 1 V 10 A 1 1 0 0 1 2 9 H 2 l 13 0 a 0.5 0.5 0 0 0 0 -1 H 2 a 1.5 1.5 0 0 1 -1 -1 V 0 z"/>
        </svg>
        <div class="d-flex ms-1 flex-grow-1 justify-content-between align-items-center border-bottom">
            Topping 1
            <span class="badge bg-warning rounded-pill">1</span>
        </div>
    </div>
@else
    <div class="d-flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M 1 0 h -1 v 7 a 2.5 2.5 0 0 0 2 2 l 13 0 a 0.5 0.5 0 0 0 0 -1 H 2 A 1.5 1.5 0 0 1 1 7 V 0 z"/>
        </svg>
        <div class="d-flex ms-1 flex-grow-1 justify-content-between align-items-center border-bottom">
            Topping 2
            <span class="badge bg-warning rounded-pill">3</span>
        </div>
    </div>
@endif

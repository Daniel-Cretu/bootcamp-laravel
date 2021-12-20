<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
        <h3 class="mb-0">{{$articleComment->author_email}}</h3>
        <div class="mb-1 text-muted">{{ date('d-M-y', strtotime($articleComment->created_at)) }}</div>
        <p class="card-text mb-auto">{{$articleComment->message}}</p>
    </div>
</div>

<section id="popular-articles">
    <h2>Most popular</h2>

    <ul articles-list>
        <template popular-article-template>
            <li>
                <div class="card mb-3" style="max-width: 540px;">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" data-views-counter></span>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" data-title></h5>
                                <p class="card-text" data-excerpt>This is card text</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 min ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </template>
    </ul>
</section>

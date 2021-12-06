<div class="uk-tile">
    <h2 class="uk-h1 uk-text-bold">What People Say About {{ $productName }}</h2>
    <hr class="uk-dividier-small">
    <div class="uk-panel uk-margin-medium uk-width-xlarge uk-margin-auto@m">

        <div class="uk-grid uk-grid-margin uk-grid-row-small uk-child-width-1-1" uk-grid>
            @forelse ($this->reviews as $review)
            <div wire:loading>
                @foreach (range(1,4) as $item)
                <x-skeleton-review-card />
                @endforeach
            </div>
            <div >
                <article class="uk-comment">
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle uk-grid" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-comment-avatar uk-border-circle"
                                    data-src="https://i.pravatar.cc/80?img={{ rand(1,70) }}" width="80" height="80"
                                    alt="" uk-img>
                            </div>
                            <div class="uk-width-expand">
                                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset"
                                        href="#">{{ $review->user->name }}</a>
                                </h4>
                                <div class="uk-comment-meta">
                                    {{ $review->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="uk-comment-body">
                        <p>{{ $review->content }}</p>
                    </div>
                </article>
            </div>

            @empty
                 <div>
                    <div class="uk-panel uk-alert uk-alert-warning uk-flex uk-flex-center uk-flex-middle"  uk-alert>
                        <p>{{ $productName }} has no reviews yet</p>
                    </div>
                </div>
            @endforelse
        </div>


        <div class="uk-margin-small-top">
            {{ $this->reviews->links() }}
        </div>
    </div>
</div>

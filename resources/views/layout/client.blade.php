<section class="clients-section style-two">
    <div class="auto-container">
        <div class="sponsors-outer">
            <ul class="clients-carousel owl-carousel owl-theme">
                @foreach ($reference as $reference)
                    <li class="slide-item">
                        <a href="{{ $reference->url }}"><img src="{{ $reference->image_url }}" alt=""></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

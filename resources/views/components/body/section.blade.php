<section class="mb-0 {{$class}}">
    <div class="container">
        <h3 class="mb-2 text-center">
            {{$sec_title}}
        </h3>
        @if ($sec_title != '')
            <div class="section-title">
                <div class="up-line"></div>
                <div class="center-line"></div>
                <div class="down-line"></div>
                <div class="icon"></div>
            </div>
        @endif
        {{$slot}}
    </div>
</section>
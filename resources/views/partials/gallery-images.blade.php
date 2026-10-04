<section class="visual-gallery" aria-labelledby="visual-gallery-heading">
    <header class="visual-gallery__intro">
        <div>
            <p class="visual-gallery__eyebrow">Design archive</p>
            <h3 id="visual-gallery-heading">Gallery — Visuals</h3>
        </div>
        <p>A closer look at selected layouts, campaign assets and visual explorations.</p>
    </header>

    <section class="visual-gallery__group" aria-labelledby="catalog-visuals-heading">
        <header class="visual-gallery__group-header">
            <h4 id="catalog-visuals-heading">Catalog Visuals</h4>
            <span>04 pieces</span>
        </header>
        <div class="image-block-container image-block-container--catalog">
            @include('partials.gallery.catalog')
        </div>
    </section>

    <section class="visual-gallery__group" aria-labelledby="social-visuals-heading">
        <header class="visual-gallery__group-header">
            <h4 id="social-visuals-heading">Social Media Visuals</h4>
            <span>09 pieces</span>
        </header>
        <div class="image-block-container image-block-container--social">
            @include('partials.gallery.social')
        </div>
    </section>

    <section class="visual-gallery__group" aria-labelledby="web-visuals-heading">
        <header class="visual-gallery__group-header">
            <h4 id="web-visuals-heading">Web Design Visuals</h4>
            <span>04 pieces</span>
        </header>
        <div class="image-block-container image-block-container--web">
            @include('partials.gallery.web')
        </div>
    </section>
</section>

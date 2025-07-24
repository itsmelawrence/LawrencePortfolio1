<div id="about" class="about">
    <div class="info-holder">
        <div class="left-info-holder">
            <div class="left-info-holder-i">
                <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/headimg.png" alt="">
            </div>
        </div>
        <div class="right-info-holder">
            <p class="desc-group">
                @php
                    $aboutWords = [
                        "With", "experience", "in", "corporate", "training,", "I’ve", "honed", "my", "ability", "to",
                        "create", "visually", "captivating", "and", "effective", "learning", "materials,", "including",
                        "presentations,", "infographics,", "and", "quick-reference", "guides.", "I", "also", "took", "on",
                        "the", "responsibility", "of", "editing", "educational", "videos,", "ensuring", "that", "each", "one",
                        "was", "clear,", "concise,", "and", "impactful", "for", "the", "intended", "audience.", "In", "my",
                        "role", "as", "a", "Freelancer,", "I", "have", "worked", "extensively", "with", "tools", "like",
                        "Canva,", "Photoshop,", "Adobe", "Premiere,", "and", "Adobe", "Illustrator", "to", "develop",
                        "creative", "and", "customized", "content.", "My", "expertise", "lies", "in", "graphic", "design,",
                        "video", "editing,", "and", "delivering", "tailored", "visual", "solutions", "that", "meet", "the",
                        "unique", "needs", "of", "my", "clients,", "ensuring", "their", "message", "resonates", "through",
                        "engaging", "and", "professional", "designs."
                    ];
                @endphp
                @foreach ($aboutWords as $word)
                    <span class="desc-text">{{ $word }}</span>
                @endforeach
            </p>
        </div>
    </div>
</div>

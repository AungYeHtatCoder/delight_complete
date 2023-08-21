<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Team</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi
                quidem hic quas.</p>
        </div>

        <div class="row">
            @foreach ($teams as $team)
            <div class="col-lg-6 mb-3" data-aos="zoom-in" data-aos-delay="100">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('uploads/'.$team->image) }}" class="img-fluid" alt></div>
                    <div class="member-info">
                        <h4>{{ $team->name }}</h4>
                        <span>{{ $team->position }}</span>
                        <p>{{ $team->bio }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

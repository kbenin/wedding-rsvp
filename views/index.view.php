<?php require('partials/header.php'); ?>
<?php require('partials/nav.php'); ?>

<main>
    <section class="banner" style="background-image:url('assets/images/banner-img.jpg');">
        <div class="container">
            <h1 class="event-title">Deric & Paulyn</h1>
            <p class="event-description">We can't wait to celebrate our special day with you. Here's how long until we say "I do"!</p>
            <ul class="countdown">
                <li>
                    <h3 class="countdown-number" id="days">0</h3>
                    <span class="countdown-label">Days</span>
                </li>
                <li>
                    <h3 class="countdown-number" id="hours">0</h3>
                    <span class="countdown-label">Hours</span>
                </li>
                <li>
                    <h3 class="countdown-number" id="minutes">0</h3>
                    <span class="countdown-label">Minutes</span>
                </li>
                <li>
                    <h3 class="countdown-number" id="seconds">0</h3>
                    <span class="countdown-label">Seconds</span>
                </li>
            </ul>
        </div>
    </section>
    <section class="links">
        <div class="container">
            <div class="cards-wrapper">
                <a href="/ceremony-and-reception" class="card" style="background-image: url('assets/images/card-ceremony-reception.jpg');">
                    <p class="card-label">Ceremony & Reception</p>
                </a>
                <a href="/gallery" class="card" style="background-image: url('assets/images/card-gallery.jpg');">
                    <p class="card-label">Gallery</p>
                </a>
                <a href="/entourage" class="card" style="background-image: url('assets/images/card-entourage.jpg');">
                    <p class="card-label">Entourage</p>
                </a>
            </div>
        </div>
    </section>
    <section class="gift-guide">
        <div class="container">
            <div class="content-wrapper">
                <div class="left-wrapper card">
                    <h2 class="heading">gift guide</h2>
                    <p class="description">Your prayers, love, laughter, and company are all we could ask for, Nevertheless, If you would like to bestow a gift upon us, A monetary gift would be great to help us in our journey.</p>
                </div>
                <div class="right-wrapper card" style="background-image: url('assets/images/gift-guide.jpg');">
                </div>
            </div>
        </div>
    </section>
    <section class="dress-code">
        <div class="container">
            <div class="content-wrapper">
                <h2 class="heading">dress code</h2>
                <p class="description">As we gather to celebrate our special day, we invite you to embrace the elegance of the occasion with your attire. Our wedding will take place in a romantic setting, and we would love for you to join us in creating a beautiful atmosphere.</p>
            </div>
            <div class="dress-code-guide">
                <div class="left principal-sponsors">
                    <h3 class="heading">principal sponsors</h3>
                    <div class="card-wrapper">
                        <div class="card gentlemen" style="background-image: url('assets/images/dress-code-principal-gentlemen.jpg');">
                            <div class="card-content">
                                <h4 class="card-title">gentlemen</h4>
                                <p>Black Suit and Tie</p>
                                <span class="note">( Tie color same as ladies )</span>
                            </div>
                        </div>
                        <div class="card ladies" style="background-image: url('assets/images/dress-code-principal-ladies.jpg');">
                            <div class="card-content">
                                <h4 class="card-title">ladies</h4>
                                <p>Strictly Long Gown</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right guests">
                    <h3 class="heading">guests</h3>
                    <div class="card-wrapper">
                        <div class="card gentlemen" style="background-image: url('assets/images/dress-code-guests-gentlemen.jpg');">
                            <div class="card-content">
                                <h4 class="card-title">gentlemen</h4>
                                <p>Black Suit and Tie</p>
                                <span class="note">( Tie color same as motif )</span>
                            </div>
                        </div>
                        <div class="card ladies" style="background-image: url('assets/images/dress-code-guests-ladies.jpg');">
                            <div class="card-content">
                                <h4 class="card-title">ladies</h4>
                                <p>Long Gown / Cocktail Dress</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="color-palette">
                <div class="color" style="background-color: #FFEFD5;"><div class="tooltiptext">#FFEFD5</div></div>
                <div class="color" style="background-color: #FFEEEE;"><div class="tooltiptext">#FFEEEE</div></div>
                <div class="color" style="background-color: #FDE5E3;"><div class="tooltiptext">#FDE5E3</div></div>
                <div class="color" style="background-color: #ECECEC;"><div class="tooltiptext">#ECECEC</div></div>
                <div class="color" style="background-color: #C0C0C0;"><div class="tooltiptext">#C0C0C0</div></div>
            </div>
            <div class="note-wrapper">
                <p class="note">WE ENCOURAGE YOU TO DRESS ACCORDING TO OUR COLOR THEME</p>
                <span class="strictly">STRICTLY FORMAL</span>
            </div>
        </div>
    </section>
    <section class="rsvp" style="background-image: url('assets/images/rsvp-bg.jpg');">
        <div class="container">
            <div class="content-wrapper">
                <div class="card">
                    <h2 class="heading">Will you be attending?</h2>
                    <p>We have reserved seat/s for you. The favor of your reply is requested on or before September 18, 2025. Please confirm your attendance.</p>
                    <a href="/rsvp" class="btn-link">RSVP</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require('partials/footer.php'); ?>

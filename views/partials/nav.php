<nav class="navigation-menu">
    <ul class="menu-wrapper">
        <li class="menu-item"><a href="/" class="link<?= urlIs('/') ? ' active' : '' ?>">HOME</a></li>
        <li class="menu-item"><a href="/entourage" class="link<?= urlIs('/entourage') ? ' active' : '' ?>">ENTOURAGE</a></li>
        <li class="menu-item"><a href="/gallery" class="link<?= urlIs('/gallery') ? ' active' : '' ?>">GALLERY</a></li>
        <li class="menu-item"><a href="/venue" class="link<?= urlIs('/venue') ? ' active' : '' ?>">VENUE</a></li>
        <li class="menu-item"><a href="/rsvp" class="btn-pill<?= urlIs('/rsvp') ? ' active' : '' ?>">RSVP</a></li>
    </ul>
</nav>
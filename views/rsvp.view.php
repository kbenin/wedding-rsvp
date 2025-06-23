<?php require('partials/header.php'); ?>
<?php require('partials/banner.php'); ?>

<main>
    <section class="main-content" style="background-image: url('assets/images/bg-about-couple.png');">
        <div class="container">
            <div class="inner-wrapper">
                <img src="\assets\images\logo-dp.svg" alt="Deric & Paulyn" class="logo-rsvp"/>
                <h3 class="heading">Kindly Reply</h3>
                <p class="description">Please respond by september 18</p>
                <div class="form-wrapper">
                    <form id="rsvp-form" autocomplete="off">
                        <label for="name">Name:</label>
                        <input type="search" id="name" name="name" placeholder="Please input name" required>
                        <div id="search-results"></div>
                        <span class="form-message">Please let us know who will be joining us to share in the joy of our special day</span>
                        <button type="submit" style="margin-top: 1em;">Submit</button>
                    </form>

                    <script>
                    document.getElementById('name').addEventListener('input', function() {
                        const query = this.value.trim();
                        if (query.length < 2) {
                            document.getElementById('search-results').innerHTML = '';
                            return;
                        }
                        fetch('search_names.php?q=' + encodeURIComponent(query))
                            .then(res => res.json())
                            .then(data => {
                                if (!data || !data.group || data.group.length === 0) {
                                    document.getElementById('search-results').innerHTML = '<div>No names found.</div>';
                                    return;
                                }
                                let html = '<div class="group-list">';
                                data.group.forEach(person => {
                                    html += `
                                        <div class="person-row" data-person-id="${person.id}">
                                            <span>${person.name}</span>
                                            <label>
                                                <input type="radio" name="attend_${person.id}" value="yes" required> Yes
                                            </label>
                                            <label>
                                                <input type="radio" name="attend_${person.id}" value="no" required> No
                                            </label>
                                            <input type="text" name="proxy_${person.id}" class="proxy-input" placeholder="Proxy name" style="display:none; margin-left:10px;" />
                                        </div>
                                    `;
                                });
                                html += '</div>';
                                document.getElementById('search-results').innerHTML = html;

                                // Show proxy input if "No" is selected
                                document.querySelectorAll('.person-row input[type=radio][value=no]').forEach(radio => {
                                    radio.addEventListener('change', function() {
                                        const row = this.closest('.person-row');
                                        row.querySelector('.proxy-input').style.display = 'inline-block';
                                    });
                                });
                                document.querySelectorAll('.person-row input[type=radio][value=yes]').forEach(radio => {
                                    radio.addEventListener('change', function() {
                                        const row = this.closest('.person-row');
                                        row.querySelector('.proxy-input').style.display = 'none';
                                    });
                                });
                            });
                    });
                    </script>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require('partials/footer.php'); ?>

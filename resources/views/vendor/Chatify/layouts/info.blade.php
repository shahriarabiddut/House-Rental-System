{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div id="jsonData">Loading</div>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
</div>

<script>
    // Function to get the last number from the URL
    function getLastNumberFromURL() {
        // Get the current URL
        let currentURL = window.location.href;

        // Use a regular expression to match the last number in the URL
        let match = currentURL.match(/(\d+)$/);

        // Check if a match is found
        if (match) {
            // Extract the matched number
            let lastNumber = match[0];

            // Call the fetchData function with the last number
            fetchData(lastNumber);
        } else {
            console.error('No number found in the URL');
        }
    }

    // Function to fetch JSON data
    function fetchData(lastNumber) {
        fetch('http://127.0.0.1:8000/userProfileJ/' + lastNumber)
            .then(response => response.json())
            .then(data => {
                // Call function to display JSON data
                displayData(data);
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Function to display JSON data on the webpage
    function displayData(data) {
        // Get the HTML element where you want to display the JSON data
        let jsonDataElement = document.getElementById('jsonData');

        // Convert the JSON data to a string and display it
        jsonDataElement.innerHTML = '<p>' + data.email + '</p>' + '<p clss="btn btn-success"> <a href=" ' + 'http://127.0.0.1:8000/userProfile/' + data.id +'">View Profile!</a></p>';
    }

    // Call the getLastNumberFromURL function when the page loads
    window.onload = getLastNumberFromURL;
</script>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Shared Photos</span></p>
    <div class="shared-photos-list"></div>
</div>

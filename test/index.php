<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX with External HTML File Example</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Function to fetch data via AJAX
            function fetchData() {
                $.ajax({
                    url: 'data.php',  // Fetch the data from data.php
                    type: 'GET',
                    dataType: 'html',  // Expect JSON response
                    success: function (data) {
                        // Inject the HTML from the response
                        $('#response').html(data);
                    },
                    error: function (xhr, status, error) {
                        // Handle errors in the AJAX request
                        $('#response').html('AJAX Error: ' + xhr.status + ' - ' + error);
                    }
                });
            }

            // Make the first AJAX call when the page loads
            fetchData();

            // Fetch data again when the button is clicked
            $('#fetchData').click(function () {
                fetchData();  // Call the same function on button click
            });
        });
    </script>
</head>
<body>

<h1>AJAX with External HTML File Example</h1>
<button id="fetchData">Fetch Data Again</button>

<div id="response" style="margin-top: 20px; border: 1px solid #ccc; padding: 10px;"></div>

</body>
</html>

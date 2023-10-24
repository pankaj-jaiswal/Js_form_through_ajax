<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetching the data through AJAX</title>
</head>

<body>
    <h1>Contact List</h1>

    <table id="contactTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tables = document.getElementById("contactTable");

            fetch('process.php')
                .then(response => {
                    if (!response.ok) {
                     throw new Error('Network response was not ok');
                    }
                     return response.json();
                })
                .then(data => {
                    
                    console.log(data);
                    data.forEach(item => {
                        var row = tables.insertRow();
                        row.insertCell().textContent = item.id;
                        row.insertCell().textContent = item.name;
                        row.insertCell().textContent = item.email;
                        row.insertCell().textContent = item.date;
                    });
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        });
    </script>

</body>

</html>

document.addEventListener('DOMContentLoaded', function() {
    var myForm = document.getElementById("myForm");
    var resultDiv = document.getElementById("result");

    myForm.addEventListener('submit', function(e) {
        e.preventDefault();

        var inputName = document.getElementById("name");
        var inputEmail = document.getElementById("email");

        document.getElementById('nameError').innerHTML = "";
        document.getElementById('emailError').innerHTML = "";

        if (inputName.value.trim() === "") {
            document.getElementById('nameError').innerHTML = 'Please fill out name fields.';
            return;
        } else if (inputEmail.value.trim() === "") {
            document.getElementById('emailError').innerHTML = 'Please fill out email fields.';
            return;
        }

        // Create FormData and send fetch request
        const formData = new FormData(myForm);

        fetch('process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);

            // Clear form fields after successful submission
            inputName.value = "";
            inputEmail.value = "";

            // Create an HTML table and append it to resultDiv
            var table = '<table border="1"><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Date</th></tr></thead><tbody>';

            data.forEach(function(user) {
                table += '<tr>';
                table += '<td>' + user.id + '</td>';
                table += '<td>' + user.name + '</td>';
                table += '<td>' + user.email + '</td>';
                table += '<td>' + user.date + '</td>';
                table += '</tr>';
            });

            table += '</tbody></table>';

            resultDiv.innerHTML = table;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

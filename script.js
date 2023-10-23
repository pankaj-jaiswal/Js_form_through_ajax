document.addEventListener('DOMContentLoaded', function() {
    var myForm = document.getElementById("myForm");

    myForm.addEventListener('submit', function(e) {
        var inputName = document.getElementById("name").value;
        var inputEmail = document.getElementById("email").value;

        document.getElementById('nameError').innerHTML = "";
        document.getElementById('emailError').innerHTML = "";

        if (inputName.trim() === "") {
            document.getElementById('nameError').innerHTML = 'Please fill out name fields.';
            e.preventDefault();
            return;
        } else if (inputEmail.trim() === "") {
            document.getElementById('emailError').innerHTML = 'Please fill out email fields.';
            e.preventDefault();
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
        })
        .catch(error => {
            console.error('Error:', error);
        });

        // Prevent form submission (done after the fetch request)
        e.preventDefault();
    });
});

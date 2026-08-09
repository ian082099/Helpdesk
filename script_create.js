function inputFilled() {
    var inputs = document.querySelectorAll('.form-control');
    inputs.forEach(function(input) {
        if (input.value !== '') {
            input.classList.add('filled');
        } else {
            input.classList.remove('filled');
        }
    });
}

document.getElementById('help_topic').addEventListener('change', function () {
    var selectedOption = this.value;
    var otherHelpTopicField = document.getElementById('otherHelpTopic');

    if (selectedOption === 'Other') {
        otherHelpTopicField.style.display = 'block';
    } else {
        otherHelpTopicField.style.display = 'none';
        document.getElementById('other_help_topic').value = '';
    }
});

document.getElementById('student_number').addEventListener('input', function () {
    var input = this.value.trim();
    var isNumber = /^\d+$/.test(input);
    if (!isNumber && input !== '') {
        Swal.fire({
            title: "Invalid Student Number",
            text: "Please enter a valid student number.",
            icon: "error",
        });
    }
});

document.getElementById('phone').addEventListener('input', function () {
    var input = this.value.trim();
    var isNumber = /^\d+$/.test(input);
    if (!isNumber && input !== '') {
        Swal.fire({
            title: "Invalid Phone Number",
            text: "Please enter a valid phone number.",
            icon: "error",
        });
        this.value = '';
    }
});




document.getElementById('cancelButton').addEventListener('click', function () {
    // Check if any input fields have data
    var inputs = document.querySelectorAll('.form-control');
    var hasInput = Array.from(inputs).some(function(input) {
        return input.value.trim() !== ''; // Check if input value is not empty
    });

    // Show confirmation dialog only if there is input data
    if (hasInput) {
        Swal.fire({
            title: "Cancel Action",
            text: "Your input data will not be saved. Are you sure you want to cancel?",
            icon: "warning",
            showCancelButton: true, // Show the cancel button
            confirmButtonText: "Yes", // Text for the confirm button
            cancelButtonText: "No", // Text for the cancel button
            dangerMode: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php";
            }
        });
    } else {
        // If no input data, simply redirect without confirmation
        window.location.href = "index.php";
    }
});

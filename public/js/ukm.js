function goBack() {
    window.history.back();
}

document.getElementById('avatar').addEventListener('change', function (event) {
    const preview = document.getElementById('avatar-preview');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
    }
});

function addImageInput() {
    var newInput = '<div class="flex items-center"><input type="file" name="gambar[]" class="block w-full mt-1 text-gray-900 border-gray-300 shadow-sm dark:text-white" required></div>';
    $('#imageInputs').append(newInput);

    // Show the remove button when there's more than one input
    if ($('#imageInputs div').length > 1) {
        $('#removeButton').show();
    }
}

function removeImageInput() {
    if ($('#imageInputs div').length > 1) {
        $('#imageInputs div:last-child').remove();
    }

    // Hide the remove button if there's only one input left
    if ($('#imageInputs div').length === 1) {
        $('#removeButton').hide();
    }
}
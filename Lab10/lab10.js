function saveData() {
    var xhr = new XMLHttpRequest();
    var formData = new FormData(document.getElementById("dataForm"));
    xhr.open("POST", "save_data.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("first_name").value = "";
            document.getElementById("last_name").value = "";
            updateSavedData();
        }
    };

    xhr.send(formData);
}

function updateSavedData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "show_data.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("savedData").innerHTML = xhr.responseText;
        }
    };

    xhr.send();
}

// Initial data retrieval
updateSavedData();

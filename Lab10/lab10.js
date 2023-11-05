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

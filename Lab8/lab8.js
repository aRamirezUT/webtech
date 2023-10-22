function getDataFromForm() {
  // Get the first name and last name from the input elements in the form
  const firstName = document.querySelector('input[name="fname"]').value;
  const lastName = document.querySelector('input[name="lname"]').value;

  runAjax(firstName, lastName);
}

function runAjax(fname, lname) {
  // Create a new XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  // Define the URL and request method
  const url = "./ajax.php";
  const params = `firstName=${fname}&lastName=${lname}`;

  // Configure the request
  xhttp.open("GET", `${url}?${params}`, true);

  // Define the callback function to handle the response
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState === 4) {
        if (xhttp.status === 200) {
            // Check if the response is a string
            if (typeof xhttp.responseText === "string") {
                // Update the content of the paragraph element with the response
                document.getElementById("responseString").textContent = xhttp.responseText;
            }
        } else {
            console.error("Request failed with status:", xhttp.status);
        }
    }
  };

  // Send the AJAX request
  xhttp.send();
}

// Attach the button click event listener
// document.getElementById("ajaxCall").addEventListener("click", getDataFromForm);
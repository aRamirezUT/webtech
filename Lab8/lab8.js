function getDataFromForm() {
  // Get the first name and last name from the input elements in the form
  var firstName = document.querySelector('input[name="fname"]').value;
  var lastName = document.querySelector('input[name="lname"]').value;
  
  console.log("First Name:", firstName);
  console.log("Last Name:", lastName);
  runAjax(firstName, lastName);
}

function runAjax(fname, lname) {
// Create a new XMLHttpRequest object
const xhr = new XMLHttpRequest();

// Define the URL and request method
const url = `./ajax.php?firstName=${fname}&lastName=${lname}`;
const method = "GET";

// Configure the request
xhr.open(method, url, true);

// Define the callback function to handle the response
xhr.onload = function() {
    if (xhr.status === 200) {
        if (typeof xhr.responseText === "string") {
            // Update the content of the paragraph element with the response
            document.getElementById("responseString").textContent = xhr.responseText;
        }
    } else {
        console.error("Request failed with status:", xhr.status);
    }
};

// Send the AJAX request
xhr.send();
}

// Attach the button click event listener
// document.getElementById("ajaxCall").addEventListener("click", getDataFromForm);

function getDataFromForm() {
  // Get the first name and last name from the input elements in the form
  const firstName = document.querySelector('input[name="fname"]').value;
  const lastName = document.querySelector('input[name="lname"]').value;

  // Call runAjax with first name and last name as arguments
  runAjax(firstName, lastName);
  alert("it worked!");
}

function runAjax(fname, lname) {
  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();

  // Define the URL and request method
  const url = "./ajax.php"; // Replace with the actual URL
  const method = "GET";

  // Construct the request URL with first name and last name as query parameters
  const requestUrl = `${url}?firstName=${fname}&lastName=${lname}`;

  // Configure the request
  xhr.open(method, requestUrl, true);

  // Define the callback function to handle the response
  xhr.onload = function() {
      if (xhr.status === 200) {
          // Check if the response is a string
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
document.getElementById("ajaxCall").addEventListener("click", getDataFromForm);
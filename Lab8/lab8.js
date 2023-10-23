function getDataFromForm() {
  // get fname and lname from the input elements in index.html
  let firstName = document.querySelector('input[name="fname"]').value;
  let lastName = document.querySelector('input[name="lname"]').value;

  runAjax(firstName, lastName);
}

function runAjax(fname, lname) {
// new XMLHttpRequest object
const xhr = new XMLHttpRequest();

// xhr request
xhr.open("GET", `./ajax.php?fname=${fname}&lname=${lname}`, true);

// callback function to handle the response
xhr.onload = function() {
    if (xhr.status === 200) {
        if (typeof xhr.responseText === "string") {
            // Update the content paragraph element with the response
            document.getElementById("responseString").textContent = xhr.responseText;
        }
    } else {
        console.error("Request failed with status:", xhr.status);
    }
};

// send ajax request
xhr.send();
}
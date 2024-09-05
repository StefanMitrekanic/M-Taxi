function TamnaTema() {
  var element = document.body;
  element.classList.toggle("dark-mode");
}

var modal = document.getElementById("confirmationModal");
var span = document.getElementsByClassName("close")[0];

document.getElementById("rideForm").onsubmit = function(event) {
    event.preventDefault();
    
    var formData = new FormData(this);

    fetch('{{ url_for("voznja") }}', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            document.getElementById("modalMessage").textContent = data.message;
            modal.style.display = "block";
        }
    });
};

span.onclick = function() {
    modal.style.display = "Vaša vožnja je potvrđena";
};

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "Vaša vožnja je odbijena";
    }
};

function Potvrda() {
  alert("Vaša vožnja je potvrđena");
}
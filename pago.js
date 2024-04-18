document.getElementById("submitBtn").addEventListener("click", function(event) {
    event.preventDefault(); // Evita el envío automático del formulario

    // Realiza las validaciones
    var nombre = document.getElementById("nombre").value.trim();
    var numero = document.getElementById("numero").value.trim();
    var expiracion = document.getElementById("expiracion").value.trim();
    var cvv = document.getElementById("cvv").value.trim();

    if (nombre === "" || numero === "" || expiracion === "" || cvv === "") {
        alert("Por favor, complete todos los campos.");
        return; // Detiene el envío del formulario si algún campo está vacío
    }

    // Si todas las validaciones pasan, envía el formulario
    document.getElementById("paymentForm").submit();
});
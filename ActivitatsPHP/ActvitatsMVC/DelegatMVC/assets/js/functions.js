function getDateTime() {

    let date = new Date();
    let year = date.getFullYear();
    let month = (date.getMonth() + 1).toString().padStart(2, '0');
    let day = date.getDate().toString().padStart(2, '0');
    let hour = date.getHours().toString().padStart(2, '0');
    let minute = date.getMinutes().toString().padStart(2, '0');
    let second = date.getSeconds().toString().padStart(2, '0');

    let datetime = `${year}-${month}-${day} ${hour}:${minute}:${second}`;

    // Envío de la variable datetime a un script PHP
    fetch('http://localhost/index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `datetime=${datetime}`
    });

}

function getUserIPAndSendToServer() {
    // Obtiene la dirección IP del usuario
    return (window.location.href.includes("localhost")) ?
        "localhost" :
        fetch("https://api.ipify.org?format=json")
        .then(response => response.json())
        .then(data => {
            const userIP = data.ip;

            // Envía la dirección IP al servidor
            return fetch("https://localhost/index.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `ip=${userIP}`,
                })
                .then(response => response.text())
                .then(data => console.log("Respuesta del servidor:", data))
                .catch(error => console.error("Error al enviar la dirección IP:", error));
        })
        .catch(error => console.error("Error al obtener la dirección IP:", error));
}
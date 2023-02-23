let index = 0; // index dictadors
let maxIndex = 0; // index maximo dictadors

function ajax() {
    const formData = new FormData();
    formData.append('index', index);

    fetch('index.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(handleResponse)
        .catch(error => console.error(error));
}

function handleResponse(data) {

    // mostramos dictador
    document.getElementById('dictador-container').innerHTML = data.split("::")[0];
    //obtenemos maxIndex
    maxIndex = data.split("::")[1] - 1;

}

function sendDictadorData() {
    console.log(true);
    // Obtenemos los valores del formulario
    let nom = document.getElementById("nom").value;
    let nacionalitat = document.getElementById("nacionalitat").value;
    let any_mort = document.getElementById("any_mort").value;
    let foto = document.getElementById("foto").value;


    // Creamos un objeto FormData y añadimos los valores del formulario
    let formData = new FormData();
    formData.append("nom", nom);
    formData.append("nacionalitat", nacionalitat);
    formData.append("any_mort", any_mort);
    formData.append("foto", foto);

    // Enviamos los datos mediante una petición fetch
    fetch("index.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => response.text())
        .then((data) => {
            console.log(data);
        })
        .catch((error) => {
            console.error(error);
        });

    maxIndex++;
    document.getElementById("nom").value = "";
    document.getElementById("nacionalitat").value = "";
    document.getElementById("any_mort").value = "";
    document.getElementById("foto").value = "";

}

function incrementIndex() {

    if (index >= 0 && index < maxIndex) {
        index++;
    } else if (index === maxIndex) {
        index = 0;
    }

    ajax();

}


function decreaseIndex() {

    if (index > 0 && index <= maxIndex) {
        index--;
    } else if (index === 0) {
        index = maxIndex;
    }

    ajax();

}

ajax();
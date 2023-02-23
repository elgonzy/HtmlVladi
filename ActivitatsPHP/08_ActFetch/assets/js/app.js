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
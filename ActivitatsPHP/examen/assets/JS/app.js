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

    // ponemos los datos de usuario donde tocan
    document.getElementById("username").innerHTML = data.split('::')[0];
    // mostramos dictador
    document.getElementById('obra-container').innerHTML = data.split("::")[1];
    //obtenemos maxIndex
    maxIndex = data.split("::")[2] - 1;
    console.log(data);

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
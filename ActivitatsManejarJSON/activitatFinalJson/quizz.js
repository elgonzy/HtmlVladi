const adresaURL = "https://quizapi.io/api/v1/questions?apiKey=5GbZgPE1MaJkrJWHN3pi3ndckIZ5FSK2YwugrgBI&category=sql&difficulty=Medium&limit=10";
const peticio = new XMLHttpRequest();

peticio.open('GET', adresaURL);
peticio.responseType = 'json';
peticio.send();
peticio.onload = function () {
    console.log(peticio.response);
}

let index = 0;
let answer;
let selectedAnswer = [];

//#region index management


function increaseIndex() {

    if (index < peticio.response.length - 1) {
        index++;
    }
    update();

}

function decreaseIndex() {

    if (index > 0) {
        index--;
    }
    update();

}

function resetIndex() {

    index = 0;
    update();

}

//#endregion

//#region quiz manager

const checkBox = [document.getElementById('option0').checked,
document.getElementById('option1').checked,
document.getElementById('option2').checked,
document.getElementById('option3').checked,
document.getElementById('option4').checked,
document.getElementById('option5').checked];

function getChecked() {

    for (let i = 0; i < checkBox.length; i++) {

        if (checkBox[i] === true) {
            console.log(true);
            selectedAnswer[index] = i;
            break;
        } else {
            console.log(false);
        }

    }
}

function correct() {

    answer = 0;
    console.log("Correcting...");
    for (let i = 0; i < selectedAnswer.length; i++) {

        console.log(selectedAnswer[i]);
        console.log(peticio.response[i].answer);
        if (selectedAnswer[i] + 1 == parseInt(peticio.response[i].answer)) {
            answer++;
        }

    }

}

function showCorrect() {

    correct();
    document.getElementById("showCorrectAnswers").innerHTML = "Your points are: " + answer;

}

//#endregion

function reset() {

    resetIndex();
    document.getElementById("showCorrectAnswers").innerHTML = "";
    selectedAnswer = [];
    update();

}

function update() {

    console.log("S'han actualitzat les dades");

    document.getElementById("question").innerHTML = peticio.response[index].question;

    document.getElementById("labelOption0").innerHTML = peticio.response[index].answers.answer_a;
    document.getElementById("labelOption1").innerHTML = peticio.response[index].answers.answer_b;
    if (peticio.response[index].answers.answer_c != null) {
        document.getElementById("labelOption2").innerHTML = peticio.response[index].answers.answer_c;
        checkBox[2].style.display = none

        
    }

    document.getElementById("labelOption3").innerHTML = peticio.response[index].answers.answer_d;
    document.getElementById("labelOption4").innerHTML = peticio.response[index].answers.answer_e;
    document.getElementById("labelOption5").innerHTML = peticio.response[index].answers.answer_f;

    for (let i = 0; i < 6; i++) {
        if (selectedAnswer[index] == i) {
            document.getElementById("option" + i).checked = true;
        } else {
            document.getElementById("option" + i).checked = false;

        }

    }

}

update();

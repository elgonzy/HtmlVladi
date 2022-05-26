const adresaURL = "https://quizapi.io/api/v1/questions?apiKey=Uwb3SuOcDjOWBDHHrjpdutmFKk2TOg2RqMljljFE&category=sql&difficulty=Medium&limit=10";
const peticio = new XMLHttpRequest();
var quizJSON = "";
peticio.open('GET', adresaURL);
peticio.responseType = 'json';
peticio.send();
peticio.onload = function () {
    quizJSON = peticio.response;
}
console.log(quizJSON);

let index = 0;
let answer;
let selectedAnswer = [];




//#region index management

function increaseIndex() {

    if (index < quizJSON.quiz.length - 1) {
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

function getChecked() {

    const checkBox = [document.getElementById('option0').checked,
    document.getElementById('option1').checked,
    document.getElementById('option2').checked,
    document.getElementById('option3').checked];

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
        console.log(quizJSON.quiz[i].answer);
        if (selectedAnswer[i] + 1 == parseInt(quizJSON.quiz[i].answer)) {
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

    document.getElementById("question").innerHTML = quizJSON[index].question;

    for (let i = 0; i < 4; i++)
        document.getElementById("labelOption" + i).innerHTML = quizJSON[index].options[i];

    for (let i = 0; i < 4; i++) {
        if (selectedAnswer[index] == i) {
            document.getElementById("option" + i).checked = true;

        } else {
            document.getElementById("option" + i).checked = false;

        }

    }

}

update();
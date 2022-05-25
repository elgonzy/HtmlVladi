let quizJSON = {
    "quiz": [
        {

            "question": "Which one is correct team name in NBA?",
            "options": [
                "New York Bulls",
                "Los Angeles Kings",
                "Golden State Warriros",
                "Huston Rocket"
            ],
            "answer": "4"

        },

        {
            "question": "5 + 7 = ?",
            "options": [
                "10",
                "11",
                "12",
                "13"
            ],
            "answer": "3"
        },
        {
            "question": "How to check an input from JS?",
            "options": [
                "input type='rounded' checked",
                ".checked = true;",
                "style:'checked'",
                "semen en lata"
            ],
            "answer": "2"
        },
        {
            "question": "Where Mitu was born?",
            "options": [
                "Ceuta",
                "Melilla",
                "Bucharest",
                "GitanoLand"
            ],
            "answer": "3"
        },
        {
            "question": "Where Cristian was born?",
            "options": [
                "Chile",
                "Peru",
                "Melilla",
                "MoroLand"
            ],
            "answer": "1"
        },
        {

            "question": "Which one is correct team name in Soccer?",
            "options": [
                "Barca",
                "Rial Madrid",
                "Diabetis",
                "Atletico De Madrid"
            ],
            "answer": "4"

        },
        {
            "question": "3 + 7 = ?",
            "options": [
                "10",
                "11",
                "12",
                "13"
            ],
            "answer": "1"
        },
        {
            "question": "How to use css correctly?",
            "options": [
                "input type='rounded' checked",
                ".checked = true;",
                "style='margin:40%' ",
                "semen en lata"
            ],
            "answer": "3"
        },
        {
            "question": "Where Pol was born?",
            "options": [
                "Ceuta",
                "Barcelona",
                "Bucharest",
                "GitanoLand"
            ],
            "answer": "4"
        },
        {
            "question": "Where Xavi was born?",
            "options": [
                "Sanseloni",
                "Sansa",
                "San Celoni",
                "MoroLand"
            ],
            "answer": "3"
        }
    ]
};

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
    
    document.getElementById("question").innerHTML = quizJSON.quiz[index].question;
    
    for (let i = 0; i < 4; i++)
        document.getElementById("labelOption" + i).innerHTML = quizJSON.quiz[index].options[i];

    for (let index = 0; index < 4; index++) {
        if (selectedAnswer[index] == i) {
            document.getElementById("option" + i).checked = true;

        } else {
            document.getElementById("option" + i).checked = false;

        }

    }

}

update();
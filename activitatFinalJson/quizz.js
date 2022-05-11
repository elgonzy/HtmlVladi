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
        }
    ]
}
    ;

//#region index management

let index = 0;

function increaseIndex() {
    
    correct();
    if (index < quizJSON.quiz.length-1) {
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

let answer = quizJSON.quiz.length;
let selectedAnswer = 2;

function getChecked() {

    const checkBox = [document.getElementById('option0').checked,
    document.getElementById('option1').checked,
    document.getElementById('option2').checked,
    document.getElementById('option3').checked];

    for (let i = 0; i < checkBox.length; i++) {
        
        if (checkBox[i] === true) {
            console.log(true);
            selectedAnswer = i ;
            break;
        } else {
            console.log(false);
        }
        
    }
}

function correct(){
    
    console.log("Correcting...");
    if (selectedAnswer != parseInt(quizJSON.quiz[index].answer)) {
        answer--;
    }

}

function showCorrect() {

    //document.getElementById("").innerHTML = "Num of correct answers:";
    document.getElementById("showCorrectAnswers").innerHTML = answer;

}

//#endregion

function update() {

    console.log("S'han actualitzat les dades");

    document.getElementById("question").innerHTML = quizJSON.quiz[index].question;
    document.getElementById("labelOption0").innerHTML = quizJSON.quiz[index].options[0];
    document.getElementById("labelOption1").innerHTML = quizJSON.quiz[index].options[1];
    document.getElementById("labelOption2").innerHTML = quizJSON.quiz[index].options[2];
    document.getElementById("labelOption3").innerHTML = quizJSON.quiz[index].options[3];
    
}

update();
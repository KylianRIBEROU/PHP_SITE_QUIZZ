document.addEventListener('DOMContentLoaded', function() {
    
    var btnQuestion = document.getElementById('btnQuestion');
    var lesComboBox =  [];
    var lesBtnChoix = [];
    let nbQuestion = document.getElementById('nbQuestion').value;

    for (var i = 1; i <= nbQuestion; i++) {
        var btnChoix = document.getElementById('btnAddChoix' + i);
        lesBtnChoix.push(btnChoix);
    }

    lesBtnChoix.forEach(function(btnChoix) {
        btnChoix.addEventListener('click', function() {
            addChoix(btnChoix, 2);
        });
    });
    
    for (var i = 1; i <= nbQuestion; i++) {
        lesComboBox.push(document.getElementById('typeQuestion' + i));
    }

    // On ajoute un eventListener sur les comboBox
    lesComboBox.forEach(function(comboBox) {
        changeTypeQuestions(comboBox);
    });


    btnQuestion.addEventListener('click', function() {
        var htmlReponses = document.getElementById('questions');
        nbQuestion++;
        document.getElementById('nbQuestion').value = nbQuestion;
        // on ajoute une question dans htmlReponses

        var buttonChoix = document.createElement('button');
        buttonChoix.setAttribute('type', 'button');
        buttonChoix.setAttribute('class', 'btn btn-choix');
        buttonChoix.setAttribute('id', 'btnAddChoix' + nbQuestion);
        buttonChoix.innerHTML = 'Ajouter un choix';
        buttonChoix.addEventListener('click', function() {
            addChoix(buttonChoix, 2);
        });

        var divChoix = document.createElement('div');
        divChoix.setAttribute('class', 'btn-add-choix');
        divChoix.appendChild(buttonChoix);

        var inputCheckbox = document.createElement('input');
        inputCheckbox.setAttribute('type', 'radio');
        inputCheckbox.setAttribute('name', 'choixQuestions' + nbQuestion + '[]');
        inputCheckbox.setAttribute('value', '1');
        inputCheckbox.setAttribute('id', 'radio');
        inputCheckbox.setAttribute('class', 'form-check-input');

        var inputText = document.createElement('input');
        inputText.setAttribute('type', 'text');
        inputText.setAttribute('name', 'labelChoix1Questions' + nbQuestion);
        inputText.setAttribute('id', 'reponse');
        inputText.setAttribute('class', 'input-crea-choix');
        inputText.setAttribute('placeholder', 'Votre choix');

        var divReponse = document.createElement('div');
        divReponse.setAttribute('id', 'divReponse' + nbQuestion);
        divReponse.setAttribute('class', 'form-check');
        divReponse.appendChild(inputCheckbox);
        divReponse.appendChild(inputText);

        var inputCheckbox2 = document.createElement('input');
        inputCheckbox2.setAttribute('type', 'radio');
        inputCheckbox2.setAttribute('name', 'choixQuestions' + nbQuestion + '[]');
        inputCheckbox2.setAttribute('value', '2');
        inputCheckbox2.setAttribute('id', 'radio');
        inputCheckbox2.setAttribute('class', 'form-check-input');

        var inputText2 = document.createElement('input');
        inputText2.setAttribute('type', 'text');
        inputText2.setAttribute('name', 'labelChoix2Questions' + nbQuestion);
        inputText2.setAttribute('id', 'reponse');
        inputText2.setAttribute('class', 'input-crea-choix');
        inputText2.setAttribute('placeholder', 'Votre choix');

        var divReponse2 = document.createElement('div');
        divReponse2.setAttribute('class', 'form-check');
        divReponse2.appendChild(inputCheckbox2);
        divReponse2.appendChild(inputText2);

        var lesChoix = document.createElement('p');
        lesChoix.setAttribute('class', 'nb-question p-divv2');
        lesChoix.innerHTML = 'Les choix :';

        var divRep = document.createElement('div');
        divRep.setAttribute('class', 'reponses');
        divRep.setAttribute('id', 'reponses' + nbQuestion);
        divRep.appendChild(lesChoix);
        divRep.appendChild(divReponse);
        divRep.appendChild(divReponse2);

        var inputTextQuestion = document.createElement('input');
        inputTextQuestion.setAttribute('type', 'text');
        inputTextQuestion.setAttribute('name', 'labelQuestion' + nbQuestion);
        inputTextQuestion.setAttribute('id', 'titre');
        inputTextQuestion.setAttribute('placeholder', 'Votre question');
        inputTextQuestion.setAttribute('class', 'input-crea');

        var pQuestion = document.createElement('p');
        pQuestion.setAttribute('class', 'nb-question p-divv');
        pQuestion.innerHTML = 'Votre question :';

        var divQuestion2 = document.createElement('div');
        divQuestion2.setAttribute('class', 'divv');
        divQuestion2.appendChild(pQuestion);
        divQuestion2.appendChild(inputTextQuestion);

        var option1 = document.createElement('option');
        option1.setAttribute('value', '1');
        option1.innerHTML = 'QCM';

        var option2 = document.createElement('option');
        option2.setAttribute('value', '2');
        option2.innerHTML = 'QCS';

        var option3 = document.createElement('option');
        option3.setAttribute('value', '3');
        option3.innerHTML = 'Réponse ouverte';

        var selectType = document.createElement('select');
        selectType.setAttribute('name', 'typeQuestion' + nbQuestion);
        selectType.setAttribute('id', 'typeQuestion' + nbQuestion);
        selectType.setAttribute('class', 'input-crea-combo');
        selectType.appendChild(option1);
        selectType.appendChild(option2);
        selectType.appendChild(option3);
        changeTypeQuestions(selectType);

        var pType = document.createElement('p');
        pType.setAttribute('class', 'nb-question p-divv');
        pType.innerHTML = 'Type de question :';

        var divType = document.createElement('div');
        divType.setAttribute('class', 'divv');
        divType.appendChild(pType);
        divType.appendChild(selectType);

        var divQuestion = document.createElement('div');
        divQuestion.setAttribute('class', 'question');
        divQuestion.appendChild(divType);
        divQuestion.appendChild(divQuestion2);
        divQuestion.appendChild(divRep);
        divRep.appendChild(divChoix);

        htmlReponses.appendChild(divQuestion);
    });
});

function addChoix(btnChoix, typeQuestion) {
    var numBtn = btnChoix.id;
    var numQuestion = numBtn.substr(11);
    var divReponses = document.getElementById('reponses' + numQuestion);

    var inputCheckbox = document.createElement('input');
    if (typeQuestion == 1) {
        inputCheckbox.setAttribute('type', 'checkbox');
        inputCheckbox.setAttribute('name', 'choixQuestions' + numQuestion + '[]');
        inputCheckbox.setAttribute('value', divReponses.childNodes.length - 1);
        inputCheckbox.setAttribute('id', 'checkbox');
    }
    else if (typeQuestion == 2) {
        inputCheckbox.setAttribute('type', 'radio');
        inputCheckbox.setAttribute('name', 'choixQuestions' + numQuestion + '[]');
        inputCheckbox.setAttribute('value', divReponses.childNodes.length - 1);
        inputCheckbox.setAttribute('id', 'radio');
    }
    inputCheckbox.setAttribute('class', 'form-check-input');

    var inputText = document.createElement('input');
    inputText.setAttribute('type', 'text');
    inputText.setAttribute('name', 'labelChoix' + (divReponses.childNodes.length - 1) + 'Questions' + numQuestion);
    inputText.setAttribute('id', 'reponse');
    inputText.setAttribute('class', 'input-crea-choix');
    inputText.setAttribute('placeholder', 'Votre choix');

    var divReponse = document.createElement('div');
    divReponse.setAttribute('class', 'form-check');
    divReponse.appendChild(inputCheckbox);
    divReponse.appendChild(inputText);

    // Ajoute en avant dernier
    divReponses.insertBefore(divReponse, divReponses.childNodes[divReponses.childNodes.length - 1]);
}

function changeTypeQuestions(comboBox){
    var numComboBox = comboBox.id;
        var nbQuestion = numComboBox.substr(12);
        comboBox.addEventListener('change', function() {
        if (comboBox.value == 2) {
            var divReponses = document.getElementById('reponses' + nbQuestion);
            divReponses.innerHTML = '';

            var buttonChoix = document.createElement('button');
            buttonChoix.setAttribute('type', 'button');
            buttonChoix.setAttribute('class', 'btn btn-choix');
            buttonChoix.setAttribute('id', 'btnAddChoix' + nbQuestion);
            buttonChoix.innerHTML = 'Ajouter un choix';
            buttonChoix.addEventListener('click', function() {
                addChoix(buttonChoix, 1);
            });

            var divChoix = document.createElement('div');
            divChoix.setAttribute('class', 'btn-add-choix');
            divChoix.appendChild(buttonChoix);

            var inputCheckbox = document.createElement('input');
            inputCheckbox.setAttribute('type', 'checkbox');
            inputCheckbox.setAttribute('id', 'checkbox');
            inputCheckbox.setAttribute('value', '1');
            inputCheckbox.setAttribute('name', 'choixQuestions' + nbQuestion + '[]');
            inputCheckbox.setAttribute('class', 'form-check-input');

            var inputText = document.createElement('input');
            inputText.setAttribute('type', 'text');
            inputText.setAttribute('name', 'labelChoix1Questions' + nbQuestion);
            inputText.setAttribute('id', 'reponse');
            inputText.setAttribute('class', 'input-crea-choix');
            inputText.setAttribute('placeholder', 'Votre choix');

            var divReponse = document.createElement('div');
            divReponse.setAttribute('class', 'form-check');
            divReponse.appendChild(inputCheckbox);
            divReponse.appendChild(inputText);

            var inputCheckbox2 = document.createElement('input');
            inputCheckbox2.setAttribute('type', 'checkbox');
            inputCheckbox2.setAttribute('name', 'choixQuestions' + nbQuestion + '[]');
            inputCheckbox2.setAttribute('id', 'checkbox');
            inputCheckbox2.setAttribute('value', '2');
            inputCheckbox2.setAttribute('class', 'form-check-input');

            var inputText2 = document.createElement('input');
            inputText2.setAttribute('type', 'text');
            inputText2.setAttribute('name', 'labelChoix2Questions' + nbQuestion);
            inputText2.setAttribute('id', 'reponse');
            inputText2.setAttribute('class', 'input-crea-choix');
            inputText2.setAttribute('placeholder', 'Votre choix');

            var divReponse2 = document.createElement('div');
            divReponse2.setAttribute('class', 'form-check');
            divReponse2.appendChild(inputCheckbox2);
            divReponse2.appendChild(inputText2);

            var lesChoix = document.createElement('p');
            lesChoix.setAttribute('class', 'nb-question p-divv2');
            lesChoix.innerHTML = 'Les choix :';

            divReponses.appendChild(lesChoix);
            divReponses.appendChild(divReponse);
            divReponses.appendChild(divReponse2);
            divReponses.appendChild(divChoix);


        }
        else if (comboBox.value == 1) {
            var divReponses = document.getElementById('reponses' + nbQuestion);
            divReponses.innerHTML = '';

            var buttonChoix = document.createElement('button');
            buttonChoix.setAttribute('type', 'button');
            buttonChoix.setAttribute('class', 'btn btn-choix');
            buttonChoix.setAttribute('id', 'btnAddChoix' + nbQuestion);
            buttonChoix.innerHTML = 'Ajouter un choix';
            buttonChoix.addEventListener('click', function() {
                addChoix(buttonChoix, 2);
            });

            var divChoix = document.createElement('div');
            divChoix.setAttribute('class', 'btn-add-choix');
            divChoix.appendChild(buttonChoix);

            var inputCheckbox = document.createElement('input');
            inputCheckbox.setAttribute('type', 'radio');
            inputCheckbox.setAttribute('name', 'choixQuestions' + nbQuestion + '[]');
            inputCheckbox.setAttribute('value', '1');
            inputCheckbox.setAttribute('id', 'checkbox');
            inputCheckbox.setAttribute('class', 'form-check-input');

            var inputText = document.createElement('input');
            inputText.setAttribute('type', 'text');
            inputText.setAttribute('name', 'labelChoix1Questions' + nbQuestion);
            inputText.setAttribute('id', 'reponse');
            inputText.setAttribute('class', 'input-crea-choix');
            inputText.setAttribute('placeholder', 'Votre choix');

            var divReponse = document.createElement('div');
            divReponse.setAttribute('class', 'form-check');
            divReponse.appendChild(inputCheckbox);
            divReponse.appendChild(inputText);

            var inputCheckbox2 = document.createElement('input');
            inputCheckbox2.setAttribute('type', 'radio');
            inputCheckbox2.setAttribute('name', 'choixQuestions' + nbQuestion + '[]');
            inputCheckbox2.setAttribute('value', '2');
            inputCheckbox2.setAttribute('id', 'radio');
            inputCheckbox2.setAttribute('class', 'form-check-input');

            var inputText2 = document.createElement('input');
            inputText2.setAttribute('type', 'text');
            inputText2.setAttribute('name', 'labelChoix2Questions' + nbQuestion);
            inputText2.setAttribute('id', 'reponse');
            inputText2.setAttribute('class', 'input-crea-choix');
            inputText2.setAttribute('placeholder', 'Votre choix');

            var divReponse2 = document.createElement('div');
            divReponse2.setAttribute('class', 'form-check');
            divReponse2.appendChild(inputCheckbox2);
            divReponse2.appendChild(inputText2);

            var lesChoix = document.createElement('p');
            lesChoix.setAttribute('class', 'nb-question p-divv2');
            lesChoix.innerHTML = 'Les choix :';

            divReponses.appendChild(lesChoix);
            divReponses.appendChild(divReponse);
            divReponses.appendChild(divReponse2);
            divReponses.appendChild(divChoix);
        }

        else if (comboBox.value == 3) {
            var divReponses = document.getElementById('reponses' + nbQuestion);
            divReponses.innerHTML = '';

            var inputText = document.createElement('input');
            inputText.setAttribute('type', 'text');
            inputText.setAttribute('name', 'choixQuestions' + nbQuestion + '');
            inputText.setAttribute('id', 'reponse');
            inputText.setAttribute('class', 'input-crea');
            inputText.setAttribute('placeholder', 'Votre réponse');

            var divReponse = document.createElement('div');
            divReponse.setAttribute('class', 'form-check');
            divReponse.appendChild(inputText);

            var lesChoix = document.createElement('p');
            lesChoix.setAttribute('class', 'nb-question p-divv2');
            lesChoix.innerHTML = 'Les choix :';

            divReponses.appendChild(lesChoix);
            divReponses.appendChild(divReponse);
        }
    });
}
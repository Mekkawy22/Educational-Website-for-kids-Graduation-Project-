<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditional Loop Game</title>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .input-group {
            margin-bottom: 20px;
            position: relative;
            width: 400px;
            height: 100px;
            margin: 20px auto;
        }
        .input-group img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            opacity: 0.8;
        }
        .input-group label {
            position: absolute;
            top: 20%; /* تعديل هذه القيمة لتغيير الموضع العمودي */
            left: 50%; /* تعديل هذه القيمة لتغيير الموضع الأفقي */
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.8);
            padding: 5px;
            border-radius: 5px;
            z-index: 1;
            width: 150px; /* تعديل هذه القيمة لتغيير عرض الـ label */
            height: 30px; /* تعديل هذه القيمة لتغيير ارتفاع الـ label */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .input-group input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            position: absolute;
            top: 70%; /* تعديل هذه القيمة لتغيير الموضع العمودي */
            left: 50%; /* تعديل هذه القيمة لتغيير الموضع الأفقي */
            transform: translate(-50%, -50%);
            z-index: 2;
            background: rgba(255, 255, 255, 0.8);
        }
        .input-group input#variableName {
    /* أضف الأنماط المطلوبة هنا للـ input الخاص بـ variableName */
    /* مثال: */
    width: 50px;
    left: 53%;
    top: 40%; /* تغيير الموضع العمودي */
}

.input-group input#variableValue {
    /* أضف الأنماط المطلوبة هنا للـ input الخاص بـ variableValue */
    /* مثال: */
    width: 50px;
    left: 53%;
    top: 40%;
}

.input-group input#numLoops {
    /* أضف الأنماط المطلوبة هنا للـ input الخاص بـ numLoops */
    /* مثال: */
    width: 50px;
    left: 50%;
    top: 40%;
}

.input-group input#condition {
    /* أضف الأنماط المطلوبة هنا للـ input الخاص بـ condition */
    /* مثال: */
    width: 100px;
    left: 48%;
    top: 40%;
}

.input-group input#trueCondition {
    /* أضف الأنماط المطلوبة هنا للـ input الخاص بـ trueCondition */
    /* مثال: */
    width: 200px;
    left: 47%;
    top: 40%;
}

.input-group input#falseCondition {
    /* أضف الأنماط المطلوبة هنا للـ input الخاص بـ falseCondition */
    /* مثال: */
    width: 200px;
    left: 52%;
    top: 40%;
}
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
        pre {
            text-align: left;
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            white-space: pre-wrap; /* يجعل الأسطر تلتف ولا تمتد خارج العنصر */
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    <header>
        <img src="img/logo.png" alt="Logo">
    </header>
        <h1>Conditional Loop Game</h1>
        <div class="input-group">
            <img src="img/for con game/Variable Name.jpg" alt="Variable Name Background">
            <input type="text" id="variableName" placeholder="Enter variable name">
        </div>
        <div class="input-group">
            <img src="img/for con game/Variable Value.jpg" alt="Variable Value Background">
            <input type="text" id="variableValue" placeholder="Enter variable value">
        </div>
        <div class="input-group">
            <img src="img/for con game/Number of Loops.jpg" alt="Number of Loops Background">
            <input type="number" id="numLoops" placeholder="Enter number of loops">
        </div>
        <div class="input-group">
            <img src="img/for con game/Condition (using the variable).jpg" alt="Condition Background">
            <input type="text" id="condition" value="i" oninput="preventDeletion()">
    <script>
        function preventDeletion() {
            const inputField = document.getElementById('condition');
            if (!inputField.value.startsWith('i')) {
                inputField.value = 'i' + inputField.value.slice(1);
            }
        }

        // Ensure the input always starts with "i" when the page loads
        window.onload = function() {
            const inputField = document.getElementById('condition');
            if (!inputField.value.startsWith('i')) {
                inputField.value = 'i' + inputField.value;
            }
        }
    </script>
        </div>
        <div class="input-group">
            <img src="img/for con game/Message if Condition is true.jpg" alt="True Condition Background">
            <input type="text" id="trueCondition" placeholder="Enter message for true condition">
        </div>
        <div class="input-group">
            <img src="img/for con game/Message if Condition is false.jpg" alt="False Condition Background">
            <input type="text" id="falseCondition" placeholder="Enter message for false condition">
        </div>
        <button onclick="runGame()">Run Game</button>
        <pre id="trueResult" class="result"></pre>
        <pre id="falseResult" class="result"></pre>
    </div>

    <script>
        function runGame() {
            var variableName = document.getElementById('variableName').value;
            var variableValue = document.getElementById('variableValue').value;
            var numLoops = document.getElementById('numLoops').value;
            var condition = document.getElementById('condition').value;
            var trueMessage = document.getElementById('trueCondition').value;
            var falseMessage = document.getElementById('falseCondition').value;

            var result = '';
            try {
                eval(variableName + ' = ' + variableValue); // Set the variable value
                var trueResult = document.getElementById('trueResult');
                var falseResult = document.getElementById('falseResult');
                trueResult.textContent = '';
                falseResult.textContent = '';
                for (var i = 0; i < numLoops; i++) {
                    if (eval(condition)) {
                        trueResult.textContent += 'Loop ' + (i + 1) + ': ' + trueMessage + '\n';
                    } else {
                        falseResult.textContent += 'Loop ' + (i + 1) + ': ' + falseMessage + '\n';
                    }
                }
            } catch (error) {
                result = 'Error: ' + error.message;
                document.getElementById('result').textContent = result;
            }
        }
    </script>
</body>
</html>

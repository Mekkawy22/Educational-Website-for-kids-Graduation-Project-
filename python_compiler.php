<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python Code Executor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1, h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: vertical;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .output {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Python Code Executor</h1>
        <form method="post" action="">
            <label for="python_code">أدخل الشفرة البرمجية بلغة Python:</label><br>
            <textarea id="python_code" name="python_code" rows="10" required><?php if(isset($_POST['python_code'])) echo htmlspecialchars($_POST['python_code']); else echo "print(&quot;i love EDUBIN website&quot;)"; ?></textarea><br>

            <input type="submit" value="تنفيذ">
        </form>
        <div class="output">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // استقبال الشفرة البرمجية من النموذج
                $python_code = $_POST['python_code'];

                // تنفيذ الشفرة البرمجية بواسطة API المطلوب
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://python-3-code-compiler.p.rapidapi.com/",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                        'code' => $python_code,
                        'version' => 'latest',
                        'input' => null
                    ]),
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: python-3-code-compiler.p.rapidapi.com",
                        "X-RapidAPI-Key: fcb35f7044msh1fb2364bddd68f9p1f01a7jsnd7fe573b9db3",
                        "content-type: application/json"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "حدث خطأ في الاتصال: " . $err;
                } else {
                    // عرض النتائج
                    $result = json_decode($response, true);
                    if (isset($result['output'])) {
                        echo "<h2>النتائج:</h2>";
                        echo "<pre>" . htmlspecialchars($result['output']) . "</pre>";
                    } elseif (isset($result['errors'])) {
                        echo "<h2>حدث خطأ في تنفيذ الشفرة:</h2>";
                        echo "<pre>" . htmlspecialchars($result['errors'][0]['message']) . "</pre>";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #ff0000;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

    <form id="registrationForm" method="POST" action="{{ route('auth.store') }}">
        @csrf

        <div id="errorMessages" class="error-message">
            <!-- Display error messages here -->
        </div>

        <label for="name">Nome:</label>
        <input type="text" name="name" required minlength="3" maxlength="50" value="{{ data_get($data, 'name') }}">

        <label for="email">E-mail:</label>
        <input type="email" name="email" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" required minlength="6" maxlength="20">

        <label for="password_confirmation">Confirmação de Senha:</label>
        <input type="password" name="password_confirmation" required>

        <button type="button" onclick="register()">Registrar</button>
    </form>

    <script>
        function register() {
            var form = document.getElementById('registrationForm');
            var errorMessages = document.getElementById('errorMessages');

            // Clear previous error messages
            errorMessages.innerHTML = '';

            // Send form data using AJAX
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    // Display error messages
                    for (var key in data.errors) {
                        if (data.errors.hasOwnProperty(key)) {
                            errorMessages.innerHTML += '<p>' + data.errors[key][0] + '</p>';
                        }
                    }
                } else {
                    alert('Usuário registrado com sucesso!');
                    form.reset();
                }
            })
            .catch(error => console.error('Error submitting form:', error));
        }
    </script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

    <form action="" method="post">
        @csrf
        <p>
            <label for="firstname"> {{ $firstname }} </label>
            <input type="text" name="firstname" id="firstname" required>
        </p>

        <p>
            <label for="lastname"> {{ $lastname }} </label>
            <input type="text" name="lastname" id="lastname" required>
        </p>

        <p>
            <label for="description"> {{ $description }} </label>
            <textarea id="description" name="description"></textarea>
        </p>

        <button type="submit">Отправить</button>
    </form>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red;">
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">
            <p style="color: green;">
                {{ Session::get('success') }}
            </p>
        </div>
    @endif

</body>
</html>
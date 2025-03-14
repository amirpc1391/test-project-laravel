<html>
<head>

    <style>
        /* استایل برای فرم */
        form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        /* استایل برای برچسب‌ها */
        label {
            font-size: 14px;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        /* استایل برای ورودی‌ها */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* استایل برای دکمه ارسال */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        /* تغییر رنگ دکمه در هنگام hover */
        button:hover {
            background-color: #45a049;
        }

        /* فاصله بین فرم و محتوای صفحه */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 50px 0;
        }
    </style>
</head>
<body>
<form action="/users/{{ $user->id }}" method="POST">
    @csrf
    <label>Email:</label>
    <input type="text" name="email" value="{{ $user->email }}"/>
    <br/>
    <label>Name:</label>
    <input type="text" name="name" value="{{ $user->name }}"/>
    <button type="submit">Save</button>
</form>
</body>
</html>

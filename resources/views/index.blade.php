<html>
<head>

    <style>
        /* استایل جدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }

        /* استایل برای سطرهای جدول */
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9e9e9;
        }

        /* استایل برای لینک‌ها */
        a {
            text-decoration: none;
            color: #007bff;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #e7f3ff;
        }

        /* استایل برای فرم‌ها */
        form {
            display: inline-block;
        }

        /* استایل برای دکمه‌ها */
        .action-buttons a {
            margin-right: 10px;
        }

        /* استایل برای لینک حذف */
        .delete-link {
            color: #ff4d4d;
        }

        .delete-link:hover {
            background-color: #ffe6e6;
        }

        #create {
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

        /* استایل برای پیغام خطا یا موفقیت */
        .error-message {
            color: #ff4d4d;
            font-size: 14px;
            margin-top: 10px;
        }

        .success-message {
            color: #4CAF50;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Action</td>
    </tr>
    </thead>
    {{--    <tbody>--}}
    {{--        <?php foreach ($users as $user){ ?>--}}
    {{--        <tr>--}}
    {{--            <td><?= $user->name ?></td>--}}
    {{--            <td><?= $user->email ?></td>--}}
    {{--            <td><a href="<?= route('users.edit', [$user->id]) ?>">Edit</a>--}}
    {{--            <form id="<?="delete-".$user->id?>" action="<?= route('users.destroy', [$user->id]) ?>"  method="POST">--}}
    {{--                @csrf--}}
    {{--                @method("DELETE")--}}
    {{--            </form>--}}
    {{--                <a href="javascript:void(0);" onclick="document.getElementById('delete-<?= $user->id ?>').submit();">Delete</a>--}}
    {{--        </td>--}}

    {{--        </tr>--}}
    {{--    <?php } ?>--}}
    {{--    </tbody>--}}

    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', [$user->id]) }}">Edit</a>
                <form id="delete-{{ $user->id }}" action="{{ route('users.destroy', [$user->id]) }}" method="POST"
                      style="display:inline;">
                    @csrf
                    @method("DELETE")
                </form>
                <a href="javascript:void(0);" onclick="document.getElementById('delete-{{ $user->id }}').submit();">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<br/><br/><br/><br/><br/>
<form action="/users" method="POST" id="create">
    @csrf
    <label>Email:</label>
    <input type="text" name="email"/>
    <br/>
    <label>Name:</label>
    <input type="text" name="name"/>
    <br/>
    <label>Password:</label>
    <input type="text" name="password"/>
    <button type="submit">Save</button>
</form>
</body>
</html>

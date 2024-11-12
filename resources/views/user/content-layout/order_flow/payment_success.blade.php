<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <style>
        body {
            /* background-color: white; */
            background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1s90dbOcAeI1B61C_sjFLxlT0bYrZL5ez2w&s");
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            padding: 20px;
            /* border: 2px solid black; */
            border-radius: 10px;
            background-color: lightgray;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: black;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            margin: 5px;
        }

        .btn:hover {
            background-color: grey;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thanh toán thành công!</h1>
        <p>Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đã được xử lý thành công.</p>
        <a href="/" class="btn">Quay lại trang chủ</a>
        <a href="{{route('user.account_orders')}}" class="btn">Lịch sử đơn hàng</a>
    </div>
</body>

</html>

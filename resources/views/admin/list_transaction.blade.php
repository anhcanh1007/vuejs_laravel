<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="title">
                <h1>Xin chào đến với trang quản trị Admin</h1>
            </div>
            <div>
                <table class="table">
                    <h1>Danh sách yêu cầu nạp tiền</h1>
                    <thead>
                        <th>Tên người nạp</th>
                        <th>Số tiền nạp</th>
                        <th>Thời gian nạp</th>
                        <th>Trạng thái</th>
                        <th colspan="2">Thao tác</th>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                            <tr>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ number_format($item->deposit_amount) }}</td>
                                <td>{{ $item->created_at }}</td>
                                @if ($item->status == 1)
                                    <td>Đang chờ xử lí</td>
                                @elseif ($item->status == 2)
                                    <td>Đã xử lí</td>
                                @endif
                                <td><button type="button" class="btn btn-primary">Duyệt</button></td>
                                <td><button type="button" class="btn btn-primary">Hủy</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>

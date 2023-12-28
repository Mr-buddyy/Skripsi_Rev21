</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat</div>
                    <div class="card-body">
                        <div id="chat">
                            <!-- Pesan akan muncul di sini -->
                        </div>
                        <div class="form-group">
                            <input type="text" id="message-input" class="form-control" placeholder="Ketik pesan...">
                            <button class="btn btn-primary" onclick="sendMessage()">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>

</body>

</html>
@extends('layouts.app')
@section('title', 'Author')

@section('content')
    <div class="card w-50 m-auto">
        <div class="card-header">
            <h1>Chatbot</h1>
            <div id="chat-box"></div>
        </div>
        <div class="card-body">
            <input type="text" class="form-control" id="user-input" placeholder="Ask a question..." />
            <button onclick="sendMessage()" class="btn btn-primary px-4 mt-3">Send</button>
        </div>
    </div>

    <script>
        function sendMessage() {
            const input = document.getElementById('user-input').value;
            fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ message: input })
            })
            .then(response => response.json())
            .then(data => {
                const box = document.getElementById('chat-box');
                box.innerHTML += "<p><strong>You:</strong> " + input + "</p>";
                box.innerHTML += "<p><strong>Bot:</strong> " + data.response + "</p>";
                document.getElementById('user-input').value = '';
            });
        }
    </script>
@endsection

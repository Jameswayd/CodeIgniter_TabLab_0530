<!DOCTYPE html>
<html>

<head>
    <title>Todo List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Todo List(顯示在CMD)</h1>
    <button onclick="todoComponent.index()">顯示所有</button>
    <button onclick="todoComponent.show(1)">顯示單一</button>
    <button onclick="todoComponent.create()">新增</button>
    <script type="text/javascript">
        $(document).ready(function() {
            todoComponent.delete(7);
        });
        let todoComponent = {
            index: function() {
                axios.get('http://localhost:8080/todo')
                    .then((response) => console.log(response))
                    .catch((error) => console.log(error.response.data.messages.error));
            },
            show: function(key) {
                axios.get('http://localhost:8080/todo/' + key)
                    .then((response) => console.log(response))
                    .catch((error) => console.log(error.response.data.messages.error));
            },
            create: function() {
                let data = {
                    "title": "pass_in_title_6",
                    "content": "pass_in_content_6"
                };
                axios.post("http://localhost:8080/todo", JSON.stringify(data))
                    .then((response) => console.log(response))
                    .catch((error) => console.log(error.response.data.messages.error));
            }
        };
    </script>
</body>

</html>

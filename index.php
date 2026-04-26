<?php
$tasks = file("tasks.txt", FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .container {
            width: 500px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 75%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 12px 18px;
            font-size: 16px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #5a67d8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #667eea;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        a {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .complete {
            background: #28a745;
            color: white;
        }

        .delete {
            background: #dc3545;
            color: white;
        }

        .completed-task {
            text-decoration: line-through;
            color: gray;
        }
    </style>

</head>

<body>

<div class="container">

    <h2>📝 Task Manager</h2>

    <form method="POST" action="add.php">
        <input type="text" name="task" placeholder="Enter your task..." required>
        <input type="submit" value="Add Task">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        if ($tasks) {
            foreach ($tasks as $index => $line) {
                list($task, $status) = explode("|", $line);

                $class = ($status == "Completed") ? "completed-task" : "";

                echo "<tr>
                    <td>$index</td>
                    <td class='$class'>$task</td>
                    <td>$status</td>
                    <td>
                        <a class='complete' href='complete.php?id=$index'>✔</a>
                        <a class='delete' href='delete.php?id=$index'>✖</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No tasks yet</td></tr>";
        }
        ?>

    </table>

</div>

</body>
</html>
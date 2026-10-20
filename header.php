<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetaFest</title>
    <style>
        :root {
            --bg-color: #0f172a;
            --card-bg: #1e293b;
            --text-color: #f8fafc;
            --accent-color: #6366f1;
            --border-radius: 12px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            gap: 30px;
            max-width: 900px;
            width: 100%;
            flex-wrap: wrap;
            justify-content: center;
        }

        .profile-card {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            flex: 1;
            min-width: 300px;
        }

        h1, h2, h3 {
            margin-top: 0;
            color: var(--text-color);
            text-align: center;
        }

        hr {
            border: 0;
            height: 1px;
            background: #334155;
            margin: 20px 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #334155;
            background-color: var(--bg-color);
            color: white;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 80px;
        }

        input[type="file"] {
            margin-top: 5px;
            color: #f8fafc;
            width: 100%;
        }

        input[type="checkbox"], input[type="radio"] {
            accent-color: var(--accent-color);
            margin-right: 5px;
        }

        /* Estilos para poner los días al lado */
        .dias-container {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .dia-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        button[type="submit"],
        .btn {
            width: 100%;
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            display: block;
            box-sizing: border-box;
        }

        button[type="submit"]:hover,
        .btn:hover {
            filter: brightness(1.2);
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 15px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #334155;
        }

        th {
            background-color: var(--bg-color);
            color: #cbd5e1;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="profile-card">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz Broj Automobila Po Godinama Proizvodnje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead th {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #0056b3;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        td, th {
            padding: 10px;
            border: 1px solid #ddd;
        }

        tbody td {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Prikaz Broj Automobila Po Godinama Proizvodnje</h1>
    <form action="/processCarsYear" method="post">
        <label for="firstYear">Unesite prvu godinu:</label>
        <input type="text" id="firstYear" name="firstYear" value="2002">

        <label for="lastYear">Unesite poslednju godinu:</label>
        <input type="text" id="lastYear" name="lastYear" value="2025">

        <button type="submit">Pretraži</button>
    </form>

    <?php if($params !== null): ?>
        <table>
            <thead>
            <tr>
                <th>Godina proizvodnje</th>
                <th>Broj vozila</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($params as $car): ?>
                <tr>
                    <td><?= htmlspecialchars($car["year"]); ?></td>
                    <td><?= htmlspecialchars($car["broj_automobila"]); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profilo</title>
</head>
<body>
    <h1>dimmi chi sei</h1>
    <form method = "post" action="risposte.php" >
        <label>nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label>cognome:</label>
        <input type="text" name="cognome" required>
        <br>
        <label>email:</label>
        <input type="text" name="email" required>
        <br>
        <label>data di nascita:</label>
        <input type="text" name="sata di nascita" required>
        <br>
        <label>hobbies:</label>
        <input type="checkbox" name="hobbies[]" value="sport"> sport
        <input type="checkbox" name="hobbies[]" value="cucinare"> cucinare
        <input type="checkbox" name="hobbies[]" value="ballare"> ballare
        <input type="checkbox" name="hobbies[]" value="mangiare"> mangiare
        <input type="checkbox" name="hobbies[]" value="musica"> musica
        <br>
        <label>presentati:</label>
        <br>
        <textarea name= "presentazione" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit">invia</button>
</body>
</html>

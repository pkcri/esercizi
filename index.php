<?php
//Inizializzazione variabili
$nome = $_POST["nome"] ?? "";
$cognome = $_POST["cognome"] ?? "";
$professione = $_POST["professione"] ?? "";
$hobbies = $_POST["hobbies"] ?? [];
$data_nascita = $_POST["data_nascita"] ?? "";
$email = $_POST["email"] ?? "";
$telefono = $_POST["telefono"] ?? "";
$profilo = $_POST["profilo"] ?? "";
$sposato = $_POST["sposato"] ?? "";
$errore_nome = $errore_cognome = "";
$campi_validi = true;
 
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Controllo campo Nome obbligatorio
    if (trim($nome) === "") {
        $errore_nome = "Il campo Nome è obbligatorio.";
        $campi_validi = false;
    } else {
        $nome = htmlspecialchars($nome);
    }
    //Controllo campo Cognome obbligatorio
    if (trim($cognome) === "") {
        $errore_cognome = "Il campo Cognome è obbligatorio.";
        $campi_validi = false;
    } else {
        $cognome = htmlspecialchars($cognome);
    }
    //Campi facoltativi
    $professione = htmlspecialchars($professione);
    $email = htmlspecialchars($email);
    $telefono = htmlspecialchars($telefono);
    $profilo = htmlspecialchars($profilo);
    $sposato = htmlspecialchars($sposato);
    $data_nascita = htmlspecialchars($data_nascita);
    //Hobbies
    foreach ($hobbies as $i => $hobby) {
        $hobbies[$i] = htmlspecialchars($hobby);
    }
}
?>
 
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<title>CV Generato</title>
<style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .cv { border: 1px solid #ccc; padding: 15px; margin-top: 20px; }
    .error { color: red; }
</style>
</head>
<body>
 
<h1>Risultato CV</h1>
 
 
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <p>
        <label>Nome</label>
 
        <input type="text" name="nome" value="<?php echo $nome; ?>">
        <?php if($errore_nome) echo "<p style='color:red'>{$errore_nome}</p>"; ?>
    </p>
    <p>
        <label>Cognome</label>
 
        <input type="text" name="cognome" value="<?php echo $cognome; ?>">
        <?php if($errore_cognome) echo "<p style='color:red'>{$errore_cognome}</p>"; ?>
    </p>
    <p>
        <label>Professione</label>
 
        <input type="text" name="professione" value="<?php echo $professione; ?>">
    </p>
    <p>
        <label>Hobbies</label>
 
        <input type="checkbox" name="hobbies[]" value="calcio" <?php echo in_array("sport",$hobbies)?"checked":""; ?>> Sport
        <input type="checkbox" name="hobbies[]" value="cucina" <?php echo in_array("mangiare",$hobbies)?"checked":""; ?>> Mangiare
        <input type="checkbox" name="hobbies[]" value="lettura" <?php echo in_array("giocare alla play",$hobbies)?"checked":""; ?>> Giocare alla play
    </p>
    <p>
        <label>Data di Nascita</label>
 
        <input type="date" name="data_nascita" value="<?php echo $data_nascita; ?>">
    </p>
    <p>
        <label>Email</label>
 
        <input type="email" name="email" value="<?php echo $email; ?>">
    </p>
    <p>
        <label>Telefono</label>
 
        <input type="text" name="telefono" value="<?php echo $telefono; ?>">
    </p>
    <button type="submit">Genera CV</button>
</form>
 
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && !$campi_validi) {
    echo '<div class="error"><ul>';
    if ($errore_nome) echo "<li>$errore_nome</li>";
    if ($errore_cognome) echo "<li>$errore_cognome</li>";
    echo '</ul></div>';
}
 
if ($_SERVER["REQUEST_METHOD"] === "POST" && $campi_validi) {
    echo '<div class="cv">';
    echo '<h2>Curriculum Vitae</h2>';
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Cognome:</strong> $cognome</p>";
    if ($email) echo "<p><strong>Email:</strong> $email</p>";
    if ($telefono) echo "<p><strong>Telefono:</strong> $telefono</p>";
    if ($professione) echo "<p><strong>Professione:</strong> $professione</p>";
    if (!empty($hobbies)) echo "<p><strong>Hobby:</strong> " . implode(", ", $hobbies) . "</p>";
    if ($sposato) echo "<p><strong>Sposato:</strong> $coniugato</p>";
    if ($profilo) echo "<p><strong>Profilo:</strong>
" . nl2br($profilo) . "</p>";
    echo '</div>';
}
?>
 
</body>
</html>

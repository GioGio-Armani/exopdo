<?php require_once '../utils/header.php';


if (isset($_POST['titre']) && !empty($_POST['titre'])) {
    $titre = $_POST['titre'];
    $dure = $_POST['dure'];
    $genre = $_POST['genre'];
    $resume = $_POST['resume'];
    $jaquette = $_POST['jaquette'];

    $query = $bdd->prepare('INSERT INTO film (titre, durée, genre, resume, jaquette) VALUES (:titre, :dure, :genre, :resume, :jaquette)');

    $query->bindValue(':titre', $titre, PDO::PARAM_STR);

    if (!empty($dure)) {
        $query->bindValue(':dure', $dure, PDO::PARAM_INT);
    } else {
        $query->bindValue(':dure', null, PDO::PARAM_NULL);
    }

    if (!empty($genre)) {
        $query->bindValue(':genre', $genre, PDO::PARAM_STR);
    } else {
        $query->bindValue(':genre', null, PDO::PARAM_NULL);
    }

    if (!empty($resume)) {
        $query->bindValue(':resume', $resume, PDO::PARAM_STR);
    } else {
        $query->bindValue(':resume', null, PDO::PARAM_NULL);
    }

    if (!empty($jaquette)) {
        $query->bindValue(':jaquette', $jaquette, PDO::PARAM_STR);
    } else {
        $query->bindValue(':jaquette', null, PDO::PARAM_NULL);
    }

    $query->execute();

    header('Location: /');
}
?>
<section>
    <h2>Ajouter un film</h2>
    <form action="#" method="post">
        <input type="text" name="titre" id="titre" placeholder="Titre du film">
        <input type="number" name="dure" id="dure" placeholder="Durée (en min)">
        <input type="text" name="genre" id="genre" placeholder="Genre">
        <textarea name="resume" id="resume" cols="30" rows="10" placeholder="Résumer du film"></textarea>
        <input type="file" name="jaquette" id="jaquette">
        <input type="submit" value="Ajouter">
    </form>
</section>

<?php require_once '../utils/footer.php'; ?>
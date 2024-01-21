<p>Répondez aux questions</p>
<form action="index.php?action=correction" method="post">
    <?php foreach ($questions as $question) : ?>
        <div><?php echo $question->render(); ?></div>
    <?php endforeach; ?>
    <input type="submit" value="Valider">
</form>
<?php require('partials/head.php') ;?>
<?php require('partials/nav.php') ;?>
<?php require('partials/banner.php') ;?>


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <h1 class="font-medium mb-3">Notes</h1>

    <?php foreach ($notes as $note) : ?>
    <li>
      <a href="/note?id=<?= $note['id']?>"
        class="text-blue-500 hover:underline font-medium">
        <?=$note['body'] ?>
      </a>
    </li>
    <?php endforeach ;?>
  </div>


</main>


<?php require('partials/footer.php') ;?>
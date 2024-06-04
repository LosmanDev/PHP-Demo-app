<?php require base_path('views/partials/head.php') ;?>
<?php require base_path('views/partials/nav.php') ;?>
<?php require base_path('views/partials/banner.php') ;?>


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <h1 class="font-medium mb-3">Notes</h1>
    <ul>
      <?php foreach ($notes as $note) : ?>
      <li>
        <a href="/note?id=<?= $note['id']?>"
          class="text-blue-500 hover:underline font-medium">
          <?=htmlspecialchars($note['body']) ?>
        </a>
      </li>
      <?php endforeach ;?>
    </ul>

    <p class="mt-6">
      <a href="/notes/create" class="text-blue-500 hover:underline font-medium">Create Note</a>
    </p>
  </div>


</main>


<?php require base_path('views/partials/footer.php') ;?>
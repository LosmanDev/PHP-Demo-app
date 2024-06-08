<?php require base_path('views/partials/head.php') ;?>
<?php require base_path('views/partials/nav.php') ;?>
<?php require base_path('views/partials/banner.php') ;?>


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p class="mb-2 text-blue-500 underline">
      <a href="/notes">Go back...</a>
    </p>


    <p><?=htmlspecialchars($note['body'])?></p>

    <footer class="mt-6">
      <a class="inline-flex justify-center rounded-md border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        href="/note/edit?id=<?= $note['id']; ?>">Edit</a>
    </footer>
  </div>


</main>


<?php require base_path('views/partials/footer.php') ;?>
<?php require('partials/head.php') ;?>
<?php require('partials/nav.php') ;?>
<?php require('partials/banner.php') ;?>


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <h1 class="font-medium mb-6">Notes</h1>

    <p class="mb-2 text-blue-500 underline">
      <a href="/notes">Go back...</a>
    </p>


    <p><?= $note['body']?> </p>

  </div>


</main>


<?php require('partials/footer.php') ;?>
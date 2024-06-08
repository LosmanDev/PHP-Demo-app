<?php require base_path('views/partials/head.php') ;?>
<?php require base_path('views/partials/nav.php') ;?>
<?php require base_path('views/partials/banner.php') ;?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value='PATCH'>
            <input type="hidden" name="id"
                value='<?= $note['id'] ?>'>

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">

                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">What are you
                                thinking about...?</label>
                            <div class="mt-1">
                                <textarea id="body" name="body" rows="3"
                                    class="mt-1 px-5 pt-3 block w-full rounded-md text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Here's an idea for a note..."><?= $note['body'] ?> </textarea>

                                <?php if (isset($errors['body'])) : ?>

                                <p class="text-red-500 text-xs mt-2">
                                    <?= $errors['body'];?>
                                </p>

                                <?php endif ;?>
                            </div>

                        </div>

                    </div>
                    <div class=" px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end">

                        <a href='/notes'
                            class="inline-flex justify-center rounded-md border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Cancel</a>

                        <button type="submit"
                            class="inline-flex justify-center rounded-md border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Update</button>

                    </div>
                </div>
        </form>
    </div>


</main>


<?php require base_path('views/partials/footer.php');?>